<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Area;
use App\Models\Apartment;
use App\Models\Customer;
use App\Models\Products;
use Illuminate\Support\Facades\Hash;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('pages.products.productslist',compact('products'));
    }

    public function productsadd()
    {
        return view('pages.products.productsAdd');
    }
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'quantity' => 'required',
            'brands' => 'required',
            'description'=>'required|string',
        ]);


        $productsName = $request->name;
        $products = new Products();
        $products->name = $productsName;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->brands = $request->brands;
        $products->description = $request->description;
         $products->save();
         return redirect()->route('index')->with('message', 'Products Added Successfully!');

    }

    function delete($id)
    {
        Products::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully!');
    }
    function edit($id)
    {
        $product = Products::where('id', $id)->first();
        return view('pages.products.edit',compact('product'));
    }
    function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'brands' => 'required|string',
            'description' => 'required|string',
        ]);
        $validatedData['price'] = (float) $validatedData['price'];
        $validatedData['quantity'] = (int) $validatedData['quantity'];
        $product = Products::find($id);    
        $product->update([
            'name' => $validatedData['name'],
            'brands' => $validatedData['brands'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'quantity' => $validatedData['quantity'],
        ]);
    return redirect()->route('index')->with('message', 'Product updated successfully!');

    }
}
