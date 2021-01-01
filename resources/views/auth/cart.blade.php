@extends('layouts.app')

@section('content')
    @if($orders->isNotEmpty())
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
                    <th scope="col"></th>
                    <th scope="col"></th>
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
                    <td>
                        <form method="POST" action="{{ route('orders.destroy', ['order' => $order]) }}">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-primary text-uppercase">Remove</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('orders.update', ['order' => $order]) }}">
                            @csrf
                            @method('put')

                            <button type="submit" class="btn btn-secondary text-uppercase">Buy</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <h5 class="mx-auto">Total Price: {{ $total }} $</h5>
        </div>
        <div class="row">
            <form method="POST" action="{{ route('orders.update', ['order' => $order]) }}" class="mx-auto">
                @csrf
                @method('put')

                <input type="hidden" name="all" value="1">
                <button type="submit" class="btn btn-secondary text-uppercase">Buy all</button>
            </form>
        </div>
    @else
        <h2 class="text-center py-5 my-5 border rounded">Your cart is empty!</h2>
    @endempty

@endsection
