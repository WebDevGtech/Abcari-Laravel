<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert(
            [
                'display_name' => "Cancelled",
                'string_value' => 'cancelled',
                'int_value' => 0,
                'color' => '#FF0000',
                'status' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('order_status')->insert(
            [
                'display_name' => "Hold",
                'string_value' => 'hold',
                'int_value' => 1,
                'color' => '#FFFF00                ',
                'status' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
     
        DB::table('order_status')->insert(
            [
                'display_name' => "accepted",
                'string_value' => 'Accepted',
                'int_value'=>3,
                'color' => '#87CEEB                ',
                'status' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
     
        DB::table('order_status')->insert(
            [
                'display_name' => "Preparing",
                'string_value' => 'preparing',
                'int_value' => 4,
                'color' => '#90ee90',
                'status' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('order_status')->insert(
            [
                'display_name' => "Ready to Serve",
                'string_value' => 'ready_to_serve',
                'int_value' => 5,
                'color' => '#90ee90',
                'status' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
    
        DB::table('order_status')->insert(
            [
                'display_name' => "Served",
                'string_value' => 'served',
                'int_value' => 6,
                'color' => '#00FF00',
                'status' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
    }
}
