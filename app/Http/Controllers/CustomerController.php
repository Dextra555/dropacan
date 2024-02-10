<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    //
    public function index()
    {
        return view('customers.customersList');
    }
   
}
