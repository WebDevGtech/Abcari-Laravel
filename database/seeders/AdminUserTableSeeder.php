<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("admin_users")->insert([
            'user_group_id' => 1,
            'name' => 'superadmin',
            'status'=>'1',
            'email' => 'superadmin@abcari.com',
            'password' => bcrypt('superadmin'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        // DB::table("admin_users")->insert([
        //     'user_group_id' => 2,
        //     'name' => 'countryadmin',
        //     'status'=>'1',
        //     'email' => 'countryadmin@abcari.com',
        //     'password' => bcrypt('countryadmin'),
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s"),
        // ]);
        // DB::table("admin_users")->insert([
        //     'user_group_id' => 3,
        //     'name' => 'baradmin',
        //     'status'=>'1',
        //     'email' => 'baradmin@abcari.com',
        //     'password' => bcrypt('baradmin'),
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s"),
        // ]);
        // DB::table("admin_users")->insert([
        //     'user_group_id' => 3,
        //     'name' => 'baradmin',
        //     'status'=>'1',
        //     'email' => 'baradmin1@abcari.com',
        //     'password' => bcrypt('baradmin'),
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s"),
        // ]);
        // DB::table("admin_users")->insert([
        //     'user_group_id' => 3,
        //     'name' => 'baradmin',
        //     'status'=>'1',
        //     'email' => 'baradmin2@abcari.com',
        //     'password' => bcrypt('baradmin'),
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s"),
        // ]);
        // DB::table("admin_users")->insert([
        //     'user_group_id' => 3,
        //     'name' => 'baradmin',
        //     'status'=>'1',
        //     'email' => 'baradmin3@abcari.com',
        //     'password' => bcrypt('baradmin'),
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s"),
        // ]);
        
    }
}
