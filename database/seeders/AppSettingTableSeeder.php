<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_settings')->insert(
            [
                'name'=>'Top pick',
                'key'=>'top_picks',
                'value'=>10,
                'status'=>'0',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);  
            DB::table('app_settings')->insert(
                [
                    'name'=>'FCM',
                    'key'=>'fcm_key',
                    'value'=>7,
                   
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);  
                DB::table('app_settings')->insert(
                    [
                        'name'=>'Cipher',
                        'key'=>'cipher_key',
                        'value'=>7,
                     
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]);  
                    DB::table('app_settings')->insert(
                        [
                            'name'=>'Bar distance',
                            'key'=>'bar_distance',
                            'value'=>7,
                           
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s"),
                        ]);  
                        DB::table('app_settings')->insert(
                            [
                                'name'=>'Buddy distance',
                                'key'=>'buddy_distance',
                                'value'=>7,
                                'status'=>'1',
                                'created_at' => date("Y-m-d H:i:s"),
                                'updated_at' => date("Y-m-d H:i:s"),
                            ]);  
                            DB::table('app_settings')->insert(
                                [
                                    'name'=>'Top brands',
                                    'key'=>'top_brands',
                                    'value'=>16,
                                    'status'=>'1',
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s"),
                                ]);  
                                DB::table('app_settings')->insert(
                                    [
                                        'name'=>'Recommendeds',
                                        'key'=>'recommendeds',
                                        'value'=>7,
                                        'status'=>'1',
                                        'created_at' => date("Y-m-d H:i:s"),
                                        'updated_at' => date("Y-m-d H:i:s"),
                                    ]);  
        }
}
