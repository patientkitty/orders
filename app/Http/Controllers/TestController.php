<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class TestController extends Controller
{
    //
    public function inputview(){
        return view('input');
    }
    public function testview(){
        Cart::add('192ao12', 'Sam 1', 1, 9.99);
        Cart::add('1239ad0', 'Product 2', 2, 5.95, ['size' => 'large']);
        //dd (Cart::content());
        return view('test');
    }

    public function getProductList(){
        $products = Product::all();
        $results = [];
//        foreach($products as $product){
//            //foreach ($product as $key => $value)
//            $results = $product;
//        }

        //dd($products);
        return view('test',['inputs'=>$products]);
    }

}
