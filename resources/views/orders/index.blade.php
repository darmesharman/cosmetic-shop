@extends('layouts.app')

@section('content')
<h4 class="text-center">Orders history</h4>
<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Order code</th>
            <th scope="col">Product code</th>
            <th scope="col">Name</th>
            <th scope="col">Color</th>
            <th scope="col">Size</th>
            <th scope="col">Amount</th>
            <th scope="col">Price</th>
            <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <th scope="row">{{ $cnt++ }}</th>
            <td>{{ $order->id }}</td>
            <td>{{ $order->product->id }}</td>
            <td>{{ $order->product->name }}</td>
            <td>{{ $order->color }}</td>
            <td>{{ $order->size }}</td>
            <td>{{ $order->amount }}</td>
            <td>{{ $order->total_price }} $</td>
            <td>{{ $order->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
