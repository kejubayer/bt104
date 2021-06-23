@extends('layouts.backend')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-center mt-3">Edit Order</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('admin.order.edit',$order->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="name" value="{{$order->user->name}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="order_no" class="form-label">Order No</label>
                        <input type="text" class="form-control" id="order_no" value="{{$order->order_no}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Total Price</label>
                        <input type="text" class="form-control" id="price" value="{{$order->price}} BDT" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="qty" class="form-label">Product Quantity</label>
                        <input type="text" class="form-control" id="qty" value="{{$order->qty}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <input type="text" class="form-control" id="payment_method" value="{{$order->payment_method}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="txn_id" class="form-label">Payment Txn ID</label>
                        <input type="text" class="form-control" id="txn_id" value="{{$order->txn_id}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label"> Order Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" @if($order->status == 'pending') selected @endif>Pending</option>
                            <option value="confirm" @if($order->status == 'confirm') selected @endif>Confirm</option>
                            <option value="reject" @if($order->status == 'reject') selected @endif>Reject</option>
                            <option value="delivery" @if($order->status == 'delivery') selected @endif>Delivery</option>
                            <option value="complete" @if($order->status == 'complete') selected @endif>Complete</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <h3 class="text-center">Product list</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->order_details as $key=>$item)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$item->product->name}}</td>
                            <td>{{$item->price}} BDT</td>
                            <td>{{$item->qty}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
