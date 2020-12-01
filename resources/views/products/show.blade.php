@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <h3>{{ $product->name }}</h3>
            Price: <p>{{ $product->getPrice() }}</p>
            Size: <p>{{ $product->getSize() }}</p>
            Weight: <p>{{ $product->getWeight() }}</p>
            <h3>Choose delivery</h3>

            @foreach($product->deliveries as $delivery)
                <p>
                    <input type="radio"
                           name="company_name"
                           id="company_name ">
                    {{ $delivery->company_name }}  {{ $delivery->getPrice() }}
                </p>
                @endforeach

        </div>
    </div>
@endsection
