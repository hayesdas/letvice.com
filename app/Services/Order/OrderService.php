<?php

namespace App\Services\Order;

use App\Events\OrderCreated;
use App\Models\Order;

class OrderService{

    public function create($request){

        session_start();

        $sum = 0;
        $products_id = [];
        foreach($_SESSION['products'] as $a => $product){
            if(empty($product['sale'])){
                $sum+= $product['price'] * $product['count'];
                $products_id[$product['id']] = [
                    'id' => $product['id'],
                    'size' => $product['size'],
                    'count' => $product['count'],
                ];
            } else {
                $sum+= $product['price'] - ($product['price'] * ($product['sale'] / 100)) * $product['count'];
                $products_id[$product['id']] = [
                    'id' => $product['id'],
                    'size' => $product['size'],
                    'count' => $product['count'],
                ];
            }
        }
        
        $i = 0;
        foreach ($products_id as $b) {
            $i++;
            $a = $products['products'][$i] = $b;
        }
        $data = [
            'key' => $request->key,
            'email' => auth()->user()['email'],
            'address' => $request->address,
            'total_price' => $sum,
            'products' => json_encode($products),
        ];

        $order = Order::create($data);
        event(new OrderCreated($order, $request->key));

        session_destroy();

    }

}