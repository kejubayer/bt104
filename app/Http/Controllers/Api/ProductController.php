<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();
            return response()->json([
               'data'=>$products,
               'success'=>true,
               'message'=>'Product list successful!!'
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'success'=>false,
                'message'=>$exception->getMessage(),
            ]);
        }
    }

    public function show($id)
    {
        try {
            $product = Product::find($id);
            return response()->json([
                'data'=>$product,
                'success'=>true,
                'message'=>'Product show successful!!'
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'success'=>false,
                'message'=>$exception->getMessage(),
            ]);
        }
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

            $product = Product::create($data);

            return response()->json([
                'data'=>$product,
                'success'=>true,
                'message'=>'Product Created successfully!!'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success'=>false,
                'message'=>$exception->getMessage(),
            ]);
        }
    }

    public function update(Request $request,$id)
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

            $item = Product::find($id);

            return response()->json([
                'data'=>$item,
                'success'=>true,
                'message'=>'Product Updated successfully!!'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success'=>false,
                'message'=>$exception->getMessage(),
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $product = Product::find($id);
            if (file_exists('upload/products/' . $product->photo)) {
                unlink('upload/products/' . $product->photo);
            }
            $product->delete();
            
            return response()->json([
                'success'=>true,
                'message'=>'Product Deleted successful!!'
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'success'=>false,
                'message'=>$exception->getMessage(),
            ]);
        }
    }

}
