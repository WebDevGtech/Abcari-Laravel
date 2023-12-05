<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuddyGroupMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buddy_group_members')->insert(
            [
                'buddy_group_id' =>1,
                'buddy_id' =>2,
                'user_id'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('buddy_group_members')->insert(
            [
                'buddy_group_id' =>1,
                'buddy_id' =>3,
                'user_id'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('buddy_group_members')->insert(
            [
                'buddy_group_id' =>1,
                'buddy_id' =>6,
                'user_id'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('buddy_group_members')->insert(
            [
                'buddy_group_id' =>2,
                'buddy_id' =>4,
                'user_id'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        DB::table('buddy_group_members')->insert(
            [
                'buddy_group_id' =>2,
                'buddy_id' =>5,
                'user_id'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
    }
}
