<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index')->with('products' , Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductsRequest $request)
    {
        $product = $request->only(['name' , 'description' , 'price' , 'image' ]);
        $image = $product['image'] ;
        $imageName = $image->getClientOriginalName();
        $imageNewName = time().$imageName ;
        $image->move('uploads/images',$imageNewName);
        $product['image']= 'uploads/images/'.$imageNewName;
      Product::create($product);
      session()->flash('success' , 'Product Created Successfully');
     return redirect(Route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.create')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $request, Product $product)
    {
        if(!$request->file('image'))
        {

            $picPath = $product->image ;
        }
else{
    // if the user upload new pic .. then we will delete the old one from our public folder
    $oldPath = $product->image;
    unlink($oldPath);
    // then store the new one
    $image = $request->image;
    $imageName = $image->getClientOriginalName() ;
    $imageNewName = time().$imageName ;
    $image->move('uploads/images',$imageNewName);
    //path of the new one
   $picPath = 'uploads/images/'.$imageNewName;
}


        $product->update([
            $product->name = $request->name  ,
            $product->description=$request->description ,
            $product->price = $request->price ,
            $product->image = $picPath
        ]);
        session()->flash('success' , 'Product Update Successfully' );
        return redirect(Route('products.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(file_exists($product->image)){
            unlink($product->image);
        }
        $product->delete();
        session()->flash('success' , 'Product Deleted Successfully' );
        return redirect(Route('products.index'));
    }
}
