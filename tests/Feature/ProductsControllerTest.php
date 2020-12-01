<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexFunction()
    {
        $product = Product::factory()->create();

        $response = $this->get('/products');

        $response->assertStatus(200);

        $response->assertSee($product->name);
    }

    public function testShowFunction()
    {
        $product = Product::factory()->create();

        $response = $this->get('/products/'. $product->id);

        $response->assertSee($product->name);
    }

    public function testCreateView()
    {
        $response = $this->get('/products/create');

        $response->assertStatus(200);
    }

    public function testStoreFunction()
    {
        $product =Product::factory()->create();

        $this->followingRedirects();

        $response = $this->post(route('products.store'), [
            'name' => $product->name,
            'size' => $product->size,
            'price' => $product->price,
            'weight' => $product->weight,

        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('products', [
            'name' => $product->name,
            'size' => $product->size,
            'price' => $product->price,
            'weight' => $product->weight,
        ]);
    }

    public function testEditView()
    {
        $product = Product::factory()->create();

        $response = $this->get('/products/'.$product->id.'edit');

        $response->assertStatus(200);
    }

    public function testUpdateFunction()
    {

        $product = Product::factory()->create();

        $this->followingRedirects();

        $response = $this->put(route('products.update', $product->id), [
            'id' => $product->id,
            'name' => 'new name',
            'size' => 'new size',
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('products',[
            'id' => $product->id,
            'name' => 'new name',
            'size' => 'new size',

        ]);

    }

    public function testDeleteFunction()
    {
        $product = Product::factory()->create();

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => $product->name,
            'size' => $product->size
        ]);

        $response = $this->delete(route('products.destroy', $product->id));

        $this->assertDeleted('products',[
            'id' => $product->id,
            'name' => $product->name,
            'size' => $product->size
        ]);

    }
}
