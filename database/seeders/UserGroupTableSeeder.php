<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("user_groups")->insert([
            'id'=>1,
            'name'=>'Super Admin',
            'status'=>1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
         ]);

         DB::table('user_groups')->insert([
            'id'=>2,
            'name'=>'Country Admin',
            'status'=>1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
         ]);
 
         DB::table('user_groups')->insert([
            'id'=>3,
            'name'=>'Bar Admin',
            'status'=>1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
         ]);
         DB::table('user_groups')->insert([
            'id'=>4,
            'name'=>'Users',
            'status'=>1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
         ]);
    }
}
