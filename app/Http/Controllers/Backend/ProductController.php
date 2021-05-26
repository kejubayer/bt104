<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        return view('backend.products.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'desc' => 'required',
                'photo' => 'required',
            ]);

            $photo = $request->file('photo');
            $newName = 'product' . time() . '.' . $photo->getClientOriginalExtension();
            $request->photo->move('upload/products', $newName);

            $data = [
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'desc' => $request->input('desc'),
                'photo' => $newName,
            ];

            Product::create($data);

            return redirect()->route('admin.product');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('backend.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'desc' => 'required',
            ]);
            $product = Product::find($id);
            $photo = $request->file('photo');
            if ($photo) {
                if (file_exists('upload/products/' . $product->photo)) {
                    unlink('upload/products/' . $product->photo);
                }
                $newName = 'product' . time() . '.' . $photo->getClientOriginalExtension();
                $request->photo->move('upload/products', $newName);
                $product->update(['photo' => $newName]);
            }
            $data = [
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'desc' => $request->input('desc'),
            ];
            $product->update($data);
            return redirect()->route('admin.product');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function delete($id)
    {
        $product = Product::find($id);
        if (file_exists('upload/products/' . $product->photo)) {
            unlink('upload/products/' . $product->photo);
        }
        $product->delete();

        return redirect()->back();
    }
}
