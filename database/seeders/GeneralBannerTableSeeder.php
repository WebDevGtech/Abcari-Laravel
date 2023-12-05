<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralBannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("general_banners")->insert([
            'banner_name' => 'Brandi',
            'image' => 'images/dubai/banners/fgds_1.png',
            'category_id'=>1,
            'position'=>'top',
            'status'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table("general_banners")->insert([
            'banner_name' => 'Vodka',
            'image' => 'images/dubai/banners/fgds_1.png',
            'category_id'=>1,
            'position'=>'bottom',
            'status'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
