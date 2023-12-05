<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $countries = array(
      array('id'=>1,
      'code' => 'IN',
      'name' => "India",
      'phonecode' => 91,
      'status'=>'1',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s")),
        
      );

     DB::table('countries')->insert($countries);
         }
}