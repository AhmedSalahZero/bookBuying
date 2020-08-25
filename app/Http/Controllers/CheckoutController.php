<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use Stripe\Stripe;
class CheckoutController extends Controller
{
    public function index(){
        return view('checkout')->with('items' , \Cart::session(Auth()->user()->id)->getContent());
    }
    public function pay(){
        Stripe::setApiKey('sk_test_dGDDfMkr1NAeJSvxj6PaHE3N002SLkEutM');
        $token = Request()->stripeToken;
        $charge = Charge::create([
           "amount"=>(\Cart::session(Auth()->user()->id)->getTotal())*100 ,
            'currency'=>'usd' ,
            'source'=>$token ,
            'description'=> 'The description is optional ' // the description is optional field

        ]);
        session()->flash('success','Purchase successful. wait for our email');
        //delete all items in the cart
        \Cart::session(Auth()->user()->id)->clear();
        Mail::to(Request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful());
        return redirect(Route('index'));


    }
}
