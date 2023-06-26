<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShoppingCartTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    use RefreshDatabase;

    public function testAddToCart(){
        $product = [
            'id' => 1,
            'name' => 'Lakers T-Shirt',
            'price' => 55.99,
        ];

        $response = $this->postJson('/api/cart/add', [
            'product_id' => $product['id'],
            'quantity' => 2,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Added to Cart',
            ]);
    }
//
//    public function testUpdateCart(){
//        $product = Product::factory()->create();
//        $this->postJson('/api/cart/add', [
//            'product_id' => $product->id,
//            'quantity' => 1,
//        ]);
//
//        $response = $this->putJson("/api/cart/update/{$product->id}", [
//            'quantity' => 3,
//        ]);
//
//        $response->assertStatus(200)
//            ->assertJson([
//                'message' => 'Product Updated',
//            ]);
//    }
//
//    public function testRemoveFromCart(){
//        $product = Product::factory()->create();
//        $this->postJson('/api/cart/add', [
//            'product_id' => $product->id,
//            'quantity' => 1,
//        ]);
//
//        $response = $this->deleteJson("/api/cart/remove/{$product->id}");
//
//        $response->assertStatus(200)
//            ->assertJson([
//                'message' => 'Product Removed',
//            ]);
//    }
//
//    public function testGetTotalItems(){
//        $product1 = Product::factory()->create();
//        $product2 = Product::factory()->create();
//        $this->postJson('/api/cart/add', [
//            'product_id' => $product1->id,
//            'quantity' => 2,
//        ]);
//        $this->postJson('/api/cart/add', [
//            'product_id' => $product2->id,
//            'quantity' => 3,
//        ]);
//
//        $response = $this->getJson('/api/cart/total-items');
//
//        $response->assertStatus(200)
//            ->assertJson([
//                'total_items' => 5,
//            ]);
//    }
//
//    public function testConfirmPurchase()
//    {
//        $product = Product::factory()->create();
//        $this->postJson('/api/cart/add', [
//            'product_id' => $product->id,
//            'quantity' => 1,
//        ]);
//
//        $response = $this->postJson('/api/cart/confirm-purchase');
//
//        $response->assertStatus(200)
//            ->assertJson([
//                'message' => 'Compra confirmada',
//            ]);
//    }
}
