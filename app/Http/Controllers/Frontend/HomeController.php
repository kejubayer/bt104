<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Test;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(9);
        return view('frontend.home',compact('products'));
    }

    public function productShow($id)
    {
        $product = Product::find($id);
        $products= Product::orderBy('id','desc')->where('id','!=',$id)->take(3)->get();
        return view('frontend.product',compact('product','products'));
    }

    public function mail()
    {
        Mail::to('jubayerk7@gmail.com')->send(new Test());
    }
}
