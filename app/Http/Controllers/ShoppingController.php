<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;


class ShoppingController extends Controller
{
    public function add_to_cart(product $product){
        (Request()->quantity? $qty = Request()->quantity :$qty = 1);
//        if(Request()->quantity)
//        {
//            $qty = Request()->quantity ;
//        }
//        else
//        {
//            $qty = 1 ;
//        }

 \Cart::session(Auth()->user()->id)->add([
          'quantity'=> $qty ,
          'id'=> $product->id ,
          'name'=>$product->name ,
          'price'=>$product->price
        ])->associate('App\Product');
 Session()->flash('success' , 'Product Added To Your Cart Successfully ');
        return redirect()->route('cart');
    }
    public function cart(){
        $items = \Cart::session(Auth()->user()->id)->getContent();
        return view('cart')->with('items',$items);

    }
    public function delete(Product $product){

        \Cart::session(Auth()->user()->id)->remove($product->id);
        return redirect( Route('cart'));
    }


}
