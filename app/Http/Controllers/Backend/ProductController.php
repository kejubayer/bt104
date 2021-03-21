<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(5);
        return view('backend.products.index',compact('products'));
    }

    public function create()
    {
        return view('backend.products.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'desc'=>$request->input('desc'),
        ];

        Product::create($data);

        return redirect()->route('admin.product');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('backend.products.edit',compact('product'));
    }

    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $data = [
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'desc'=>$request->input('desc'),
        ];
        $product->update($data);
        return redirect()->route('admin.product');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back();
    }
}
