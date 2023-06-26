<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addToCart(Request $request){
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = $request->session()->get('cart');

        if (!$cart){
            $cart = new Cart();
        }
        $cart->addItem($productId,$quantity);

        $request->session()->put('cart', $cart);

        return response()->json(['message' => 'Product Added to the Cart']);

    }

    public function updateCart(Request $request, $productId){
        $quantity = $request->input('quantity');
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }
        $cart = $request->session()->get('cart');

        if ($cart){
            $cart->updateItem($productId, $quantity);
            $request->session()->get('cart');

            return response()->json(['message'=>'Quantity Updated to '.$quantity]);
        }
        return response()->json(['message' => 'Product Not Found in Cart'], 404);

    }

    public function removeFromCart(Request $request, $productId){
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        $cart = $request->session()->get('cart');
        if ($cart) {
            $cart->removeItem($productId);
            $request->session()->put('cart', $cart);

            return response()->json(['message' => 'Product Removed']);
        }

        return response()->json(['message' => 'Product Not Found'], 404);
    }

    public function getTotalItems(Request $request){
        $cart = $request->session()->get('cart');
        if ($cart) {
            return response()->json(['total_items' => $cart->getTotalItems()]);
        }

        return response()->json(['total_items' => 0]);
    }

    public function confirmPurchase(Request $request){
        $cart = $request->session()->get('cart');
        if ($cart) {
            $cart->confirmPurchase();
            $request->session()->forget('cart');

            return response()->json(['message' => 'Purchased is confirmed']);
        }
        return response()->json(['message' => 'Cart is Empty'], 404);
    }

    public function showCart(){
        $items = Product::all();
        return view('cart', compact('items'));
    }
}
