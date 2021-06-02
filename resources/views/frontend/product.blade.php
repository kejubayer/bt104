@extends('layouts.frontend')

@section('title')
    {{$product->name}} -
@endsection

@section('main')
    <div class="col">
        <div class="card shadow-sm">
            <img src="{{asset('upload/products/'.$product->photo)}}" alt="photo" width="300">

            <div class="card-body">
                <h2>{{$product->name}}</h2>
                <p class="card-text">{{$product->desc}}</p>
                <div class=" align-items-center">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-outline-secondary"
                           href="{{route('product.show',[$product->id,\Illuminate\Support\Str::slug($product->name)])}}">View</a>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Add To Cart
                        </button>
                    </div>
                    <small class="text-muted">{{number_format($product->price)}} BDT</small>
                </div>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <h2>Recent Product</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($products as $product)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{asset('upload/products/'.$product->photo)}}" alt="photo" height="300">

                            <div class="card-body">
                                <h2>{{$product->name}}</h2>
                                <p class="card-text">{{$product->desc}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary"
                                           href="{{route('product.show',[$product->id,\Illuminate\Support\Str::slug($product->name)])}}">View</a>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Add To Cart
                                        </button>
                                    </div>
                                    <small class="text-muted">{{number_format($product->price)}} BDT</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
