@extends('layouts.frontend')

@section('main')
    <div class="col-6" style="margin-left: 200px">
        <h2 class="text-center">Cart</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total price</th>
            </tr>
            </thead>
            <tbody>
            @php
                $key = 0;
                $total_qty = 0;
                $total_price = 0;
            @endphp
            @foreach($cart as $item)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['price']}} <span style="font-size: 20px; font-weight: bold">৳</span></td>
                    <td>{{$item['quantity']}}</td>
                    <td>{{$item['quantity'] * $item['price']}} <span style="font-size: 20px; font-weight: bold">৳</span>
                    </td>
                </tr>
                @php
                    $key += 1;
                    $total_qty += $item['quantity'];
                    $total_price += ($item['quantity'] * $item['price']);
                @endphp
            @endforeach
            <tr>
                <th scope="row"></th>
                <td></td>
                <td><span style="font-size: 20px; font-weight: bold">Total</span></td>
                <td>{{$total_qty}}</td>
                <td>{{$total_price}} <span style="font-size: 20px; font-weight: bold">৳</span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
