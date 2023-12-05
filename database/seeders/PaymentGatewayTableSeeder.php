<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentGatewayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    
       
        DB::table('payment_gateways')->insert([
            'gatewayname' => 'Razorpay',
            'displayname' => 'razorpay',
            'status' => '1',  

        ]);
        DB::table('payment_gateways')->insert([
            'gatewayname' => 'UPI',
            'displayname' => 'upi',
            'status' => '1',  

        ]);
        DB::table('payment_gateways')->insert([
            'gatewayname' => 'Cash on Delivery',
            'displayname' => 'cashondelivery',
            'status' => '1',  

        ]);
       
    }
}
