<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        return view('index')->with('products',Product::paginate(3));
    }
    public function singleProduct(Product $product){
        return view('singleProduct')->with('product' , $product);
    }
    public function increase($id, $qty){

        \Cart::session(Auth()->user()->id)->update($id,[
            'quantity' => $qty+1 ,

        ]);
        return redirect(Route('cart'));
    }
    public function decrease($id , $qty){
        \Cart::update($id,[
            'quantity' => $qty-1
        ]);
        return redirect()->back();
    }

}
