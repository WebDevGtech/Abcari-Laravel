<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavouriteTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

   
        DB::table('favourite_types')->insert([
          'id'=>1,
          'name'=>'Bar',
          'status'=>'1',
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s"),
           
      ]);
      DB::table('favourite_types')->insert([
        'id'=>2,
        'name'=>'Product',
        'status'=>'1',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
         
    ]);
    DB::table('favourite_types')->insert([
        'id'=>3,
        'name'=>'Brand',
        'status'=>'1',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
         
    ]);


         
    

         
    }
}
