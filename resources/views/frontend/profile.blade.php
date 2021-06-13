@extends('layouts.frontend')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2 class="text-center mt-3">Profile</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('profile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control" id="name" placeholder="Enter Your Name...">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" value="{{auth()->user()->phone}}" class="form-control" id="phone" placeholder="Enter Your Phone Number...">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" class="form-control" id="address" placeholder="Enter Your Address...">{{auth()->user()->address}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}" id="email" aria-describedby="emailHelp" placeholder="Enter Your Email...">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Profile Picture</label>
                        <input type="file" name="photo" class="form-control" id="photo">
                        <img src="{{asset('upload/users/'.auth()->user()->photo)}}" class="mt-3" alt="" style="height: 200px;">
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>


@endsection
