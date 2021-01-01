@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center border border-1 rounded bg-light p-0 my-2">
        <h1 class="mb-0 pb-0 text-capitalize">{{ $product->name }}<h1>
        <p class="text-muted pt-0 mt-0">{{ $product->description }}</p>
    </div>

    <div class="raw w-70 mr-auto ml-auto row">
        <section class="col-md-8">
            <div id="myCarousel" class="carousel slide bg-inverse" data-ride="carousel" >
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block w-100 h-100" src="{{ asset($product->avatar_photo) }}" alt="Первый слайд">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h-100" src="{{ asset($product->product_photo) }}" alt="Второй слайд">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Prev</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>

        <section class="float-right w-40 col-md-4">
            <form action="{{ route('orders.store') }}" method="post">
                @csrf

                <table class="table table-hover" summary style="margin-top: 15px">
                    <tbody>
                        <tr>
                            <td><span style="font-size: 12px; color: 969696">Price</span></td>
                            <td><span style="font-size: 12px; color: 969696"> {{ $product->price }} $ <span class="text-muted">(for one)</span></span></td>
                            <input type="hidden" name="price" value="{{ $product->price }}">
                        </tr>
                        <tr>
                            <td><span style="font-size: 12px; color: 969696">Code</span></td>
                            <td><span style="font-size: 12px; color: 969696">{{ $product->id }}</span></td>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </tr>
                        <tr>
                            <td><span style="font-size: 12px; color: 969696"> Color</span></td>
                            <td>
                                <select class="form-control" id="exampleFormControlSelect1" name="color" required>
                                    <option style="text-transform: uppercase;" value="better_timing"> better timing</option>
                                    <option style="text-transform: uppercase;" value="certainty"> certainty</option>
                                    <option style="text-transform: uppercase;" value="common place"> common place</option>
                                    <option style="text-transform: uppercase;" value="pink ground">pink ground</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><span style="font-size: 12px; color: 969696"> Size</span></td>
                            <td><select class="form-control" id="exampleFormControlSelect1" name="size" required>
                                    <option style="text-transform: uppercase;" value="5ml">5ml</option>
                                    <option style="text-transform: uppercase;" value="9ml">9ml</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><span style="font-size: 12px; color: 969696">Amount</span></td>
                            <td>
                                <input type="number" class="form-control" style="font-size: 12px; color: 969696" placeholder="amount"
                                name="amount" value="1" min="1" max="5" required>
                            </td>
                        </tr>
                    </tbody>
                </table>

                    <input type="submit" class="btn btn-outline-dark" name="action"
                        style="text-transform: uppercase; background-color: #fbcbe3; "
                        value="add to cart"
                    >

                    <input type="submit" class="btn btn-outline-dark" name="action" style="text-transform: uppercase;" value="buy now">
            </form>
        </section>
    </div>
</div>

@endsection
