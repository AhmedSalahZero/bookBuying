@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card card-default">
        <div class="card-header text-center">Products</div>
        <div class="card-body">

           @if($products->count()>0)
               <table class="table">
                   <thead>
                   <th>Image</th>
                   <th>Name</th>
                   <th>Price</th>
                   <th>Edit</th>
                   <th>Delete</th>
                   </thead>
                   <tbody>
                   @foreach($products as $product)
                       <tr>
                           <td>
                               <img src="{{asset($product->image)}}" alt="{{$product->name}}" width="80px" height="80px">
                           </td>
                       <td>{{$product->name}}</td>
                           <td>{{$product->price}}</td>
                           <td>
                               <form action="{{Route('products.edit' , $product->id)}}" method="GET">
                                   @csrf
                               <button type="submit" class="btn btn-sm btn-success"> Edit </button>
                               </form>
                           </td>
                           <td>
                               <form action="{{Route('products.destroy' , $product->id)}}" method="POST">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
                               </form>
                           </td>
                       </tr>
                       @endforeach

                   </tbody>


               </table>
               @else
                <h3 class="text-center">
                    No Products Yet
                </h3>

               @endif


        </div>
    </div>
</div>
    @endsection
