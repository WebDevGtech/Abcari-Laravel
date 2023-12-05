<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

   
        DB::table('brands')->insert([
          'id'=>1,
          'name'=>'brand_1',
          'status'=>'1',
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('brands')->insert([
        'id'=>2,
        'name'=>'brand_2',
        'image' => '',
        'status'=>'1',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
         
    ]);

    DB::table('brands')->insert([
        'id'=>3,
        'name'=>'brand_3',
        'status'=>'1',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
         
    ]);
         
    }
}
