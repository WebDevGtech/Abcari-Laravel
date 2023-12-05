<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarBookingTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

   
        DB::table('bar_booking_types')->insert([
          'id'=>1,
          'name'=>'App',
          'status'=>'1',
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s"),
           
      ]);
      DB::table('bar_booking_types')->insert([
        'id'=>2,
        'name'=>'Offline',
        'status'=>'1',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
         
    ]);
    DB::table('bar_booking_types')->insert([
        'id'=>3,
        'name'=>'website',
        'status'=>'1',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
         
    ]);


         
    

         
    }
}
