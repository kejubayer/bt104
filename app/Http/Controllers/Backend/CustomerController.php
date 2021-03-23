<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
       $customers = User::where('role','customer')->orderBy('id','desc')->paginate(5);
        return view('backend.customers.index',compact('customers'));
    }
}
