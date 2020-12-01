
@extends('layouts.app')
@section('content')
    <body style="background-color: #f5f5f5">
    <div class="container text-center">
        <table class="table w-50" align="center">
            <thead>
            <tr style="background-color: #dbdbdb" >
                <th scope="col" >Product name</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody style="background-color: #f8fafc">
            @foreach($products as $product)
                <tr>
                    <td>
                        <h4>
                        <a style="color: black" href="{{ route('products.show', $product) }}" >
                            {{ $product->name }}
                        </a>
                        </h4>
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">
                            Edit
                        </a>
                        <form method="post" action="{{ route('products.destroy', $product) }}" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </body>
@endsection
