@extends('user.layout')

@section('content')

<div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{ asset("storage/{$product->path_image}") }}" alt="" style="width:100%; height:100%;">
                <div class="caption">
                    <h4>{{ $product->product_name }}</h4>
                    <p>{{ $product->description }}</p>
                    <p><strong>Price: </strong>RM {{ $product->product_price}}</p>
                    <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
