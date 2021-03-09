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
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key=>$product)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$product->name}}</td>
            <td>{{number_format($product->price)}} BDT</td>
            <td>{{$product->desc}}</td>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection
