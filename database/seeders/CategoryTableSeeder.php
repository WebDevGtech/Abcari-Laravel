<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                'service_id' => 1,
                'name' => "Brandi",
                'image' => "image 1",
                'is_liquor' => "1",
                "is_preferred" => "1",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 1,
                'name' => "Rum",
                'image' => "image 2",
                'is_liquor' => "1",
                "is_preferred" => "1",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 1,
                'name' => "Whisky",
                'image' => "image 3",
                'is_liquor' => "1",
                "is_preferred" => "1",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 1,
                'name' => "Cocktail",
                'is_liquor' => "1",
                "is_preferred" => "1",
                'image' => "image 1",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 1,
                'name' => "Vodka",
                'image' => "image 2",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 1,
                'name' => "Jin",
                'is_liquor' => "1",
                "is_preferred" => "0",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 1,
                'name' => "Beer",
                'is_liquor' => "1",
                "is_preferred" => "1",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 1,
                'name' => "Mini Beer",
                'image' => "image 3",
                'is_liquor' => "1",
                "is_preferred" => "0",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 1,
                'name' => "Tequila",
                'image' => "image 3",
                'is_liquor' => "1",
                "is_preferred" => "0",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 1,
                'name' => "Wine",
                'image' => "image 3",
                'is_liquor' => "1",
                "is_preferred" => "0",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 2,
                'name' => "Pizza",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 2,
                'name' => "Burger",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );DB::table('categories')->insert(
            [
                'service_id' => 2,
                'name' => "French Fries",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );DB::table('categories')->insert(
            [
                'service_id' => 2,
                'name' => "Grill",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );DB::table('categories')->insert(
            [
                'service_id' => 2,
                'name' => "Fried Rice",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 3,
                'name' => "Pepsi",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 3,
                'name' => "Coke",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );DB::table('categories')->insert(
            [
                'service_id' => 3,
                'name' => "Sprite",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );DB::table('categories')->insert(
            [
                'service_id' => 4,
                'name' => "Mango",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );DB::table('categories')->insert(
            [
                'service_id' => 4,
                'name' => "Apple",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 4,
                'name' => "Orange",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 4,
                'name' => "Banana",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 5,
                'name' => "Tomato Ketchup",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 5,
                'name' => "Garlic Ketchup",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 6,
                'name' => "Lemon",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 6,
                'name' => "Soda",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('categories')->insert(
            [
                'service_id' => 6,
                'name' => "Juice",
                'image' => "image 3",
                'status' => "1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
       
}
}