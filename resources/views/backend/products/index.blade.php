@extends('layouts.backend')

@section('main')
    <h3 class="text-center">Product list</h3>
    <a href="{{route('admin.product.create')}}" class="btn btn-success">Add New Product</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key=>$product)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$product->name}}</td>
            <td>{{number_format($product->price)}} BDT</td>
            <td>{{$product->desc}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('admin.product.edit',$product->id)}}">Edit</a>
                <a class="btn btn-warning" href="{{route('admin.product.delete',$product->id)}}">Delete</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    {{ $products->links('pagination::bootstrap-4') }}
@endsection
