<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('backend.products.index',compact('products'));
    }

    public function create()
    {
        return view('backend.products.create');
    }

    public function store(Request $request)
    {
        Product::create([
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'desc'=>$request->input('desc'),
        ]);

        return redirect()->route('admin.product');


    }
}
