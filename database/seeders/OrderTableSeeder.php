<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('orders')->insert(
        [
        	'order_no'=>'OR#001',
        	'user_id' =>1,
            'bar_waiter_detail_id'=>1,
            'bar_restaurant_id'=>1,
            'bar_booking_id'=>1,
            'coupon_id'=>1,
            'payment_method_id'=>1,
            'coupon_code'=>'hi',
            'status'=>4,
            'sub_total'=>3400,
            'payment_method_id'=>1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);//
    }
}
