<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        return view('products.index',[
            'products' => (new Product())->all()
        ]);
    }

   public function show(Product $product)
   {
       $product->load('deliveries');

       return view('products.show',[
           'product' => $product
       ]);
   }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {

        $product= (new Product())->fill([
            'name' => $request->name,
            'size' => $request->size,
            'price' => $request->price * 100,
            'weight' => $request->weight * 1000
        ]);
        $product->save();

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {

        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {

        $product->update([
            'name' => $request->name,
            'size' => $request->size,
            'price' => $request->price * 100,
            'weight' => $request->weight * 1000
        ]);

        return redirect()->route('products.edit', $product);
    }

    public function destroy(Product $product)
    {

        $product->delete();

        return redirect()->route('products.index');
    }


}
