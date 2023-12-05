<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuddyRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buddy_request')->insert(
            [
              
                'sender_id' =>1,
                'receiver_id' =>2,
                'comments'=>'0',
                'mobile_number'=>999999999,
                'request_status'=>'accepted',
                'request_count'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('buddy_request')->insert(
            [
              
                'sender_id' =>1,
                'receiver_id' =>3,
                'comments'=>'0',
                'mobile_number'=>999999999,
                'request_status'=>'accepted',
                'request_count'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('buddy_request')->insert(
            [
              
                'sender_id' =>1,
                'receiver_id' =>4,
                'comments'=>'0',
                'mobile_number'=>999999999,
                'request_status'=>'accepted',
                'request_count'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('buddy_request')->insert(
            [
              
                'sender_id' =>1,
                'receiver_id' =>5,
                'comments'=>'0',
                'mobile_number'=>999999999,
                'request_status'=>'accepted',
                'request_count'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('buddy_request')->insert(
            [
              
                'sender_id' =>1,
                'receiver_id' =>6,
                'comments'=>'0',
                'mobile_number'=>999999999,
                'request_status'=>'accepted',
                'request_count'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('buddy_request')->insert(
            [
              
                'sender_id' =>1,
                'receiver_id' =>7,
                'comments'=>'0',
                'mobile_number'=>999999999,
                'request_status'=>'accepted',
                'request_count'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('buddy_request')->insert(
            [
              
                'sender_id' =>1,
                'receiver_id' =>8,
                'comments'=>'0',
                'mobile_number'=>999999999,
                'request_status'=>'cancelled',
                'request_count'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );

    }
}
