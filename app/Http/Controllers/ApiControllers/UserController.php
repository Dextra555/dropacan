<?php
namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Area;
use App\Models\Apartment;
use App\Models\Customer;
use App\Models\Products;
use App\Models\OtpVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\Ratings;
use App\Models\Order;


class UserController extends Controller
{
    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'apartment' => 'required',
            'area' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        try {
            $customer = new Customer;
            $customer->username = $request->username;
            $customer->password = Hash::make($request->password);
            $customer->email = $request->email;
            $customer->apartment = $request->apartment;
            $customer->area = $request->area;
            $customer->city = $request->city;
            $customer->state = $request->state;
            $customer->country = $request->country;
            $customer->privacy_policy=$request->privacy_policy;
            $customer->save();

            return response()->json([
                'success' => true,
                'message' => 'Customer created successfully',
                'data' => $customer,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the customer',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function login(Request $request)
    {
        if ($request->username != '' && $request->password != '') {
            $user = Customer::where('email', $request->username)->get();
            if ($user->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User Not Exits',
                ], 404);
            } else {
                if (Hash::check($request->password, $user[0]->password)) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Login successfully',
                        'data' => $user,

                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'User Not Exits',

                    ]);
                }
            }

        } else if (empty($request->username)) {
            return response()->json([
                'success' => false,
                'message' => 'Username is required',
            ], 404);
        } else if (empty($request->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Password is required',
            ], 404);
        } else if (($request->username) == '' && $request->password) {
            return response()->json([
                'success' => false,
                'message' => 'username & Password is required',
            ], 404);
        }


    }
    public function adminlogin(Request $request)
    {
        print_r("hi");die();
    }
    public function get_countries()
    {
        try {
            $countries = Country::select('id', 'name')->get();
            return response()->json([
                'success' => true,
                'message' => 'Countries retrieved successfully',
                'data' => $countries,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving countries',
            ], 500);
        }
    }
    public function get_states(Request $request)
    {
        if ($request->country_id) {
            $states = State::select('id', 'name')
                ->where('country', $request->country_id)
                ->get();
            if ($states->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'State not found',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'State retrieved successfully',
                'data' => $states,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or missing ID parameter',
            ], 400);
        }


    }
    public function get_cities(Request $request)
    {
        if ($request->state_id) {
            $cities = City::select('id', 'name')
                ->where('state', $request->state_id)
                ->get();

            if ($cities->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cities not found',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Cities retrieved successfully',
                'data' => $cities,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or missing ID parameter',
            ], 400);
        }
    }
    public function get_areas(Request $request)
    {
        if ($request->area_id) {
            $areas = Area::select('id', 'name')
                ->where('city', $request->area_id)
                ->get();

            if ($areas->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Areas not found',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Areas retrieved successfully',
                'data' => $areas,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or missing ID parameter',
            ], 400);
        }
    }

    public function get_apartments_insert(Request $request)
    {

        $validatedData = $request->validate([
            'city' => 'required',
            'apartmentname' => 'required',
        ]);
        $Apartmentment = new Apartment;
        $Apartmentment->area = $request->city;
        $Apartmentment->name = $request->apartmentname;
        $Apartmentment->save();
        return redirect('apartment')->with('success', 'Apartment Added Successfully');
        // return redirect()->back()->with('message', 'Apartment Added Successfully!');

    }
    public function get_apartments(Request $request)
    {
        if ($request->apartment_id) {
            $apartments = Apartment::select('id', 'name')
                ->where('area', $request->apartment_id)
                ->get();

            if ($apartments->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Apartmentments not found',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Apartmentments retrieved successfully',
                'data' => $apartments,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or missing ID parameter',
            ], 400);
        }


    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'apartment' => 'required',
            'area' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        try {
            $customer = new Customer;
            $customer->username = $request->username;
            $customer->password = Hash::make($request->password);
            $customer->apartment = $request->apartment;
            $customer->area = $request->area;
            $customer->city = $request->city;
            $customer->state = $request->state;
            $customer->country = $request->country;
            $customer->save();

            return response()->json([
                'success' => true,
                'message' => 'Customer created successfully',
                'data' => $customer,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the customer',
                'error' => $e->getMessage(),
            ], 500);
        }


    }
    public function search(Request $request)
    {
        if ($request->search) {
            $keyword = $request->search;
            $ProductsData = Products::where('name', 'like', "%$keyword%")
                ->get();
            if ($ProductsData->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Products not found',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Products retrieved successfully',
                'data' => $ProductsData,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or missing ID parameter',
            ], 400);
        }
    }
    public function uploadprofileimg(Request $request)
    {
        if ($request->hasFile('profileimg')) {
            $profileimg = $request->file('profileimg');
            $imagePath = $profileimg->store('images', 'public');
           
        }

    }
    public function otpOperation(Request $request)
    {

        //   $otpCode=1234;
        //  $user="nanthini7596@gmail.com";
         $user=$request->email;
         $otpCode=$request->otp;
         
        if(isset($user) && empty($otpCode))
        {
        $otpCode = rand(1000, 9999);
        $expirationTime = Carbon::now()->addMinutes(10);    
        Mail::to($user)->send(new \App\Mail\OtpMail($otpCode));
        $otpverify = OtpVerification::where('user', $user)->get();
        if ($otpverify->count()  > 0) {
        foreach ($otpverify as $record) {
            
            $user = $record->user;
            $affectedRows = OtpVerification::where('user', $user)->update(['otp_code' => $otpCode]);
            return response()->json(['message' => 'OTP Send Suceessfully']);
        }
        }
        else
        {
        $otpVerification = new OtpVerification;
        $otpVerification->otp_code = $otpCode;
        $otpVerification->otp_expires_at = $expirationTime;
        $otpVerification->user = $user;
        $otpVerification->save();
        return response()->json(['message' => 'OTP Send Suceessfully']);
        }
        
        }
         
     else if(isset($user) && isset($otpCode))
     {
          $otpverify = OtpVerification::where('user', $user)->get();
          $expirationTime = now()->addMinutes(15);
          foreach ($otpverify as $record) {
            $otpCodenum = $record->otp_code;
            $user = $record->user; 
            $expiresAt=$record->otp_expires_at;
            if ($user != '') {
            if($otpCode==$otpCodenum)
            {
                return response()->json(['message' => 'OTP Verified Sucessfully']);
            }
            else
            {
                return response()->json(['message' => 'OTP Mismatch']);
            }
            
            
            }
            else
            {
                return response()->json(['message' => 'User not found']);
            }
        }
     }

        
    }
    public function forgotpassword(Request $request)
    {
        $userEmail = $request->email;
        $customer = Customer::where('email', $userEmail)->latest()->value('email');
        if (isset($customer)) {
            if(isset($request->password))
            {
            $password = Hash::make($request->password);
            $affectedRows = Customer::where('email', $userEmail)->update(['password' => $password]);
            return response()->json(['message' => 'Password updated successfully']);
            }
            else
            {
                return response()->json(['message' => 'Password Empty']);  
            }
            
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
    public function productsDetails(Request $request)
    {
    try {
    $ProductsList = Products::select('name','price','quantity','brands')->get();
    return response()->json([
        'success' => true,
        'message' => 'Products retrieved successfully',
        'data' => $ProductsList,
    ]);
    } catch (\Exception $e) {
    return response()->json([
        'success' => false,
        'message' => 'An error occurred while retrieving countries',
    ], 500);
    }


    }

    public function reviewData(Request $request)
    {
        $userEmail = $request->email;
        $ratingsValue=$request->ratings;
        $customer = Customer::where('email', $userEmail)->latest()->value('email');
        if (isset($customer) & (isset($ratingsValue))) {
            try {
                $ratings = new Ratings;
                $ratings->username = $userEmail;
                $ratings->ratings = $ratingsValue;
                $ratings->save();
                $ratingData = Ratings::select('username', 'ratings')
                ->where('username', $userEmail)
                ->get();
                return response()->json([
                    'success' => true,
                    'message' => 'Ratings created successfully',
                    'data' => $ratingData,
                ]);
            } 
            catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred while creating the ratings',
                    'error' => $e->getMessage(),
                ], 500);
            }

        }
        else{
            return response()->json(['message' => 'Data not found'], 404);
        }
    }





////////////////////////////// Order API/////////////////////////////////

public function orders(Request $request)
{
    $email = $request->email;
    $brand = $request->brands;
    $quantity = $request->quantity;
    $price = $request->price;

    // Check if all required fields are present
    if(isset($email) && isset($brand) && isset($quantity) && isset($price)) {
        // Retrieve the customer by email
        $customer = Customer::where('email', $email)->first();

        // Check if customer exists
        if($customer) {
            // Fetch location details
            $country = Country::find($customer->country);
            $state = State::find($customer->state);
            $city = City::find($customer->city);
            $area = Area::find($customer->area);

            // Construct location data
            $locationData = [
                'country' => $country->name,
                'state' => $state->name,
                'city' => $city->name,
                'area' => $area->name,
            ];

            $location = json_encode($locationData);

            // Create order
            $order = new Order();
            $order->email = $email;
            $order->brands = $brand;
            $order->quantity = $quantity;
            $order->price = $price;
            $order->location = $location;
            $order->userid = $customer->id; 
            $order->save();

            return response()->json([
                'success' => true,
                'message' => 'Order Created Successfully',
            ]);
        } else {
            // Customer not found
            return response()->json(['message' => 'Customer not found'], 404);
        }
    } else {
        // Missing required parameters
        return response()->json([
            'success' => false,
            'message' => 'Invalid or missing parameters',
        ], 400);
    }
}

    

  
} 