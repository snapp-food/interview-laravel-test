<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Events\OrderSubmitted;

class OrderController extends Controller
{
    public function store(StrorOrderRequest $request) {
        $product = Product::find([$request->product_id]);
        $item = Order::create([
            
        ]);
        
        \Event::fire(new OrderSubmitted($item));
    }
}