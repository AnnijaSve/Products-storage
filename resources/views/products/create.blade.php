@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">
            Back
        </a>
        <form method="post" action="{{ route('products.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Product name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
        <div class="form-group">
            <label for="size">Product size</label>
            <input type="text" class="form-control " id="size" name="size">
        </div>
        <div class="form-group">
            <label for="price">Product price EUR</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>
        <div class="form-group">
            <label for="weight">Product weight KG</label>
            <input type="text" class="form-control" id="weight" name="weight">
        </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
