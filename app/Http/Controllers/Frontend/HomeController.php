<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

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
}
