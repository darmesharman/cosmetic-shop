<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status', 'ordered')->get();

        return view('orders.index', [
            'orders' => $orders,
            'cnt' => 1
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order($this->validateOrder());
        $order->user_id = auth()->user()->id;
        $order->product_id = request('product_id');

        $size = (request('size') == '9ml') ? 1.4 : 1;
        $order->total_price = request('price') * request('amount') * $size;

        if (request('action') === 'add to cart') {
            $order->status = 'carted';
        } else {
            $order->status = 'ordered';
        }

        $order->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if (!request('all')) {
            $order->status = 'ordered';

            $order->save();
        } else {
            foreach($order->user->orders as $order) {
                $order->status = 'ordered';

                $order->save();
            }
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return back();
    }

    public function cart()
    {
        $orders = Order::where('user_id', auth()->user()->id)->where('status', 'carted')->get();
        $total = Order::where('user_id', auth()->user()->id)->where('status', 'carted')->sum('total_price');

        return view('auth.cart', [
            'orders' => $orders,
            'cnt' => 1,
            'total' => $total
        ]);
    }

    protected function validateOrder() {
        return request()->validate([
            'color' => 'required',
            'size' => 'required',
            'amount' => 'required|min:1|max:5'
        ]);
    }
}
