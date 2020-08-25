@extends('layouts.app')
@section('content')
<div class="container">
 @include('partials.validate-errors')
        <div class="card card-default">
            <div class="card-header text-center">
                {!!  isset($product) ? "Edit <strong>$product->name </strong> Product "  : 'Create A New Product'!!}
            </div>
            <div class="card-body">
                <form action="{{isset($product) ? Route('products.update',$product->id):Route('products.store')}}"
                      method="POSt" enctype="multipart/form-data">
                    @csrf
                    @if(isset($product))
                        @method('PUT')
                        @endif
                    <div class="form-group">
                        <label for="Name" >Name</label>
                        <input type="text" id="Name" name="name" class="form-control" value="{{isset($product) ? $product->name : old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="price" >Price</label>
                        <input type="number" id="price" name="price" class="form-control" value="{{isset($product) ? $product->price : old('price')}}">
                    </div>
                    @if(isset($product))
                        <div class="form-group">
                            <img src="{{asset($product->image)}}" alt="" style="width: 100%">

                        </div>
                    @endif
                    <div class="form-group">
                        <label for="image" >Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description" >Description</label>
                        <textarea cols="20" rows="5" id="description" name="description" class="form-control">{{isset($product) ? $product->description : old('description')}}</textarea>
                    </div>
                    <button class="btn btn-success btn-sm form-control" type="submit" >
                        {{isset($product) ? 'Update Product ': 'Save Product'}}
                       </button>
                </form>
            </div>
        </div>
</div>
    @endsection
