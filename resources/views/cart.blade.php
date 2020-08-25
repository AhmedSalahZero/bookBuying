@extends("layouts.front");
@section('page')
@if($items->count()>0)
    <div class="container-fluid">
        <div class="row bg-border-color medium-padding120">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">

                        <div class="cart">

                            <h1 class="cart-title">In Your Shopping Cart: <span class="c-primary">
                                    {{$items->count()}} Items
                                    </span></h1>

                        </div>

                        <form action="#" method="post" class="cart-main">

                            <table class="shop_table cart">
                                <thead class="cart-product-wrap-title-main">
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach($items as $item)

{{--
                                   @dd($item->model)
    give you object of this element model then you can access his properity
 by compering the id in the $item with the id in
        the model that you writted in add_to_card() using associate ()
        --}}


                                   <tr class="cart_item">

                                       <td class="product-remove">

                                           <a href="{{Route('cart.remove',$item->id)}}" class="product-del remove" title="Remove this item">
                                               <i class="seoicon-delete-bold"></i>
                                           </a>

                                       </td>

                                       <td class="product-thumbnail">

                                           <div class="cart-product__item">
                                               <a href="#">
                                                   <img src="{{$item->model->image}}" alt="product" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                               </a>
                                               <div class="cart-product-content">
                                                   <p class="cart-author">Callum Bailey</p>
                                                   <h5 class="cart-product-title">{{$item->model->name}}</h5>
                                               </div>
                                           </div>
                                       </td>

                                       <td class="product-price">
                                           <h5 class="price amount">
                                               ${{number_format($item->price)}}
                                           </h5>
                                       </td>

                                       <td class="product-quantity">

                                           <div class="quantity">

                                               <a href="{{Route('cart.decrease' , ['id'=>$item->id ,'qty'=>$item->quantity]  )}}" class="quantity-minus-y">-</a>
                                               <input title="Qty" class="email input-text qty text" type="text" placeholder="1" readonly
                                               value="{{$item->quantity}}"
                                               >
                                               <a href="{{Route('cart.increase',['id'=>$item->id,'qty'=>$item->quantity])}}" class="quantity-plus-y">+</a>
                                           </div>

                                       </td>

                                       <td class="product-subtotal">
                                           <h5 class="total amount">${{number_format($item->price * $item->quantity)}}</h5>
                                       </td>

                                   </tr>
                                   @endforeach
                                <tr>
                                    <td colspan="5" class="actions">

                                        <div class="coupon">
                                            <input name="coupon_code" class="email input-standard-grey" value="" placeholder="Coupon code" type="text">
                                            <div class="btn btn-medium btn--breez btn-hover-shadow">
                                                <span class="text">Apply Coupon</span>
                                                <span class="semicircle--right"></span>
                                            </div>
                                        </div>

                                        <div class="btn btn-medium btn--dark btn-hover-shadow">
                                            <span class="text">Apply Coupon</span>
                                            <span class="semicircle"></span>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>


                        </form>

                        <div class="cart-total">
                            <h3 class="cart-total-title">Cart Totals</h3>
                            <h5 class="cart-total-total">Total: <span class="price">$
<!-- Count total price of the cart for the user -->
                                {{number_format(\Cart::session(Auth()->user()->id)->getTotal())}}
                                </span></h5>
                            <a href="{{Route('cart.checkout')}}" class="btn btn-medium btn--light-green btn-hover-shadow">
                                <span class="text">Checkout</span>
                                <span class="semicircle"></span>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @else

    <h3 class="align-center"> No Items In Your Cart Yet </h3>

    @endif
    @endsection
