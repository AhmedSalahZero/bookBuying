<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class , 30)->create() ;

//       \App\Product::create([
//           'name'=>'Learn To Build An Application Using laravel ' ,
//           'price'=>200 ,
//           'description'=>'A new Course For Versions 6.2 of laravel for Developing Web-site Applications ',
//           'image'=>'default.png'
//       ]);
//        \App\Product::create([
//            'name'=>'Learn To Build An Application Using Php ' ,
//            'price'=>250 ,
//            'description'=>'A new Course For Versions 7 of laravel for Developing Web-site Applications ',
//            'image'=>'default1.png'
//        ]);
//        \App\Product::create([
//            'name'=>'New Generation of Developing' ,
//            'price'=>120 ,
//            'description'=>' Some Of intel about newer ways for coding ',
//            'image'=>'default2.png'
//        ]);
//        \App\Product::create([
//            'name'=>'Uses of BootStrap' ,
//            'price'=>210 ,
//            'description'=>' Bootstrap And its new Features',
//            'image'=>'default3.png'
//        ]);
    }


}
