@extends('layouts.backend')

@section('main')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h3 class="text-center mt-3">Create New Product</h3>
            <form action="{{route('admin.product.create')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Product Price</label>
                    <input type="number" name="price" class="form-control" id="price">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea name="desc" class="form-control" id="desc" cols="30" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
