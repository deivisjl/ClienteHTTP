@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">        
        <div class="col">
            <div class="row">
                <div class="col">
                    <h1>{{ $product->titulo }} {{ $product->disponibles }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="#" class="btn btn-success btn-lg">Purchase</a>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <img src="{{ $product->imagen }}" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->titulo }}</h5>
                            <p class="card-text">{{ $product->detalles }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
