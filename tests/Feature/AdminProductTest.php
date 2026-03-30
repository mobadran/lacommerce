<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_product_index_loads(): void
    {
        $response = $this->get('/admin/products');
        $response->assertStatus(200);
    }

    public function test_admin_product_create_loads(): void
    {
        $response = $this->get('/admin/products/create');
        $response->assertStatus(200);
    }

    public function test_admin_product_store_works(): void
    {
        $data = [
            'title' => 'Test Product',
            'description' => 'Test description',
            'price' => 19.99,
            'stock' => 10,
            'image' => 'https://example.com/test.jpg',
        ];

        $response = $this->post('/admin/products', $data);
        $response->assertRedirect('/admin/products');
        
        $this->assertDatabaseHas('products', ['title' => 'Test Product']);
    }

    public function test_admin_product_delete_works(): void
    {
        $product = \App\Models\Product::create([
            'title' => 'Delete Me',
            'description' => 'Test desc',
            'price' => 10.00,
            'stock' => 5,
        ]);

        $response = $this->delete('/admin/products/' . $product->id);
        $response->assertRedirect('/admin/products');

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
