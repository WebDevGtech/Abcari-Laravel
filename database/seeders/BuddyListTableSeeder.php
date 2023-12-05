<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuddyListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buddy_list')->insert(
            [
              
                'user_id' =>1,
                'friend_id' =>2,
                'isblocked'=>'0',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('buddy_list')->insert(
            [
              
                'user_id' =>1,
                'friend_id' =>3,
                'isblocked'=>'0',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );

        DB::table('buddy_list')->insert(
            [
              
                'user_id' =>1,
                'friend_id' =>4,
                'isblocked'=>'0',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );

        DB::table('buddy_list')->insert(
            [
              
                'user_id' =>1,
                'friend_id' =>5,
                'isblocked'=>'0',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('buddy_list')->insert(
            [
              
                'user_id' =>1,
                'friend_id' =>6,
                'isblocked'=>'0',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('buddy_list')->insert(
            [
              
                'user_id' =>1,
                'friend_id' =>7,
                'isblocked'=>'1',
                'blocked_by'=>'1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );



    }
}
