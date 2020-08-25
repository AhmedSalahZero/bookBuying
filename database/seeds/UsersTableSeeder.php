<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\User::create([
          'name'=>'ahmed' ,
          'email'=>'ahmedconan17@yahoo.com',
          'password' =>Hash::make('deconan2020')
       ]);
    }
}
