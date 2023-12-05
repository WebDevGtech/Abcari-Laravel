<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarServiceRestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        DB::table('bar_restaurant_services')->insert(
        [
            'bar_restaurant_id'=>1,
            'bar_service_id' => 1,
            'status' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]
    );
    DB::table('bar_restaurant_services')->insert(
        [
            'bar_restaurant_id'=>1,
            'bar_service_id' => 2,
            'status' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]
    );
    DB::table('bar_restaurant_services')->insert(
        [
            'bar_restaurant_id'=>2,
            'bar_service_id' => 1,
            'status' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]
    );
   
    }
}
