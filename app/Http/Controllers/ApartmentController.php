<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Apartment;


class ApartmentController extends Controller
{
    //
  public function apartment(){
      $apartments = Apartment::with('city')->get();
      $states=State::all();
      $city=City::all();
      $apartment=Apartment::all();
     return view('pages.apartment',compact('states','city','apartment'));
    }
    public function CityData()
    {
        return $this->belongsTo(City::class, 'id');
    }

    public function apartmentadd()
    {
    $states=State::all();
    $city=City::all();
    
     return view('pages.apartmentadd',compact('states','city'));
    }
    
}
