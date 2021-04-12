@extends('layouts.backend')

@section('main')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h3 class="text-center mt-3">Edit Customer</h3>
            <form action="{{route('admin.customer.edit',$customer->id)}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Customer Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$customer->name}}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Customer Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{$customer->email}}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Customer Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{$customer->phone}}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Customer Address</label>
                    <textarea name="address" class="form-control" id="address" cols="30" rows="5">{{$customer->address}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
