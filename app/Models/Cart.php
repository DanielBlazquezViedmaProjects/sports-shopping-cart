<?php

namespace App\Models;

use http\Message;

class Cart{

    private $items;

    public function __construct(){
        $this->items = [];
    }

    public function addItem($productId, $quantity){
        if (isset($this->items[$productId])){
            $this->items[$productId]+= $quantity;
        }
        $this->items[$productId] = $quantity;
    }

    public function updateItem($productId, $quantity){
        if (isset($this->items[$productId])){
            $this->items[$productId] = $quantity;
        }
    }

    public function removeItem($productId){
        if (isset($this->items[$productId])){
           unset( $this->items[$productId]);
        }
    }

    public function getTotalItems(){
        return count($this->items);
    }

    public function confirmPurchase(){
        $this->items = [];

        echo "item purchased";
    }

    /**
     * @return array
     */
    public function getItems(): array{
        return $this->items;
    }
}
