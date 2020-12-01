@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="post" action="{{ route('products.update', $product) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name"
                       name="name" placeholder="Your article title" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                <input class="form-control" name="size" id="size" value="{{ $product->size }}">
            </div>
            <div class="form-group">
                <label for="price">Price EUR</label>
                <input class="form-control" name="price" id="price" value="{{ $product->price/100 }}">
            </div>
            <div class="form-group">
                <label for="weight">Weight KG</label>
                <input class="form-control" name="weight" id="weight" value="{{ $product->weight/1000}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
