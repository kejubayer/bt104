@extends('layouts.frontend')

@section('main')

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{config('app.name')}}</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the
                    creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it
                    entirely.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="{{route('cart')}}" class="btn btn-secondary my-2">Show Cart</a>
                </p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($products as $product)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{asset('upload/products/'.$product->photo)}}" alt="photo" height="300px">
                            <div class="card-body">
                                <h2>{{$product->name}}</h2>
                                <p class="card-text">{{$product->desc}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary" href="{{route('product.show',[$product->id,\Illuminate\Support\Str::slug($product->name)])}}">View</a>
                                        <a class="btn btn-sm btn-outline-secondary" href="{{route('add.to.cart',$product->id)}}">Add To Cart</a>
                                    </div>
                                    <small class="text-muted">{{number_format($product->price)}} BDT</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$products->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>

@endsection
