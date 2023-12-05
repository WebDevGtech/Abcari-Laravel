<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppVersionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_versions')->insert(
            [
                'number'=>'1.0',
                'message' => "Initial",
                'type' => "android",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);  
            DB::table('app_versions')->insert(
                [
                    'number'=>'1.0',
                    'message' => "Initial",
                    'type' => "ios",
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);  
            DB::table('app_versions')->insert(
                [
                    'number'=>'1.1',
                    'message' => "Updated",
                    'type' => "android",
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);  
                DB::table('app_versions')->insert(
                    [
                        'number'=>'1.1',
                        'message' => "Updated",
                        'type' => "ios",
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]);  
    }
}
