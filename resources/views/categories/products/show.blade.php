@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col">
                    <h1>Products</h1>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-4">
                        <a href="{{ route('products.show',['title'=>$product->titulo, 'id'=>$product->identificador]) }}">
                            <div class="card">
                                <img src="{{ $product->imagen }}" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->titulo }}</h5>
                                    <p class="card-text">{{ $product->detalles }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
