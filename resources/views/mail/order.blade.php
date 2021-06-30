<!doctype html>
<html lang="en">
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<p><strong>Order no:</strong> {{$data->order_no}}</p>
<h2>Order Details</h2>
<table style="width:100%">
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    @foreach($data->order_details as $item)
        <tr>
            <td>{{$item->product->name}}</td>
            <td>{{number_format($item->price)}} BDT</td>
            <td>{{$item->qty}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
