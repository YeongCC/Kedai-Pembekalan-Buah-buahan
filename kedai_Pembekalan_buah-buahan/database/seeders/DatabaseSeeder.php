<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123123123'),
            'position' => '1'
        ]);
        DB::table('products')->insert([
            'Product_Name' => 'SOUTH AFRICA GRANNY SMITH GREEN APPLE (S)',
            'Product_Picture' => 'greenapple.jpg',
            'Product_Price' => '1.2',
            'Product_Status' => '1'
        ]);
        DB::table('products')->insert([
            'Product_Name' => 'NEW ZEALAND QUEEN RED APPLE (M)',
            'Product_Picture' => 'apple.jpg',
            'Product_Price' => '2',
            'Product_Status' => '1'
        ]);
        DB::table('products')->insert([
            'Product_Name' => 'STRAWBERRY [125G/PACK]',
            'Product_Picture' => 'strawberry.jpg',
            'Product_Price' => '14.22',
            'Product_Status' => '1'
        ]);
        DB::table('products')->insert([
            'Product_Name' => 'VIETNAM WHITE DRAGON FRUIT (M) 2KG',
            'Product_Picture' => 'dragonfruitwhite.jpg',
            'Product_Price' => '18',
            'Product_Status' => '1'
        ]);
        DB::table('products')->insert([
            'Product_Name' => 'SUNKIST BIG ORANGE (SWEET)',
            'Product_Picture' => 'orange.jpg',
            'Product_Price' => '2.2',
            'Product_Status' => '1'
        ]);
        DB::table('products')->insert([
            'Product_Name' => 'MALAYSIA RED DRAGON FRUIT (M) 2KG',
            'Product_Picture' => 'dragonfruitred.jpg',
            'Product_Price' => '21.9',
            'Product_Status' => '1'
        ]);
        DB::table('products')->insert([
            'Product_Name' => 'GREECE BLUEBERRY [125G/PACK]',
            'Product_Picture' => 'blueberry.jpg',
            'Product_Price' => '13.9',
            'Product_Status' => '1'
        ]);
        DB::table('products')->insert([
            'Product_Name' => 'NEW ZEALAND ZESPRI GREEN KIWI [5PCS/PACK]',
            'Product_Picture' => 'kiwi.jpg',
            'Product_Price' => '21.9',
            'Product_Status' => '1'
        ]);
        DB::table('products')->insert([
            'Product_Name' => 'SOUTH AFRICA LEMON (M)',
            'Product_Picture' => 'lemon.jpg',
            'Product_Price' => '0.8',
            'Product_Status' => '1'
        ]);
    }
}
