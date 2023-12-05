<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarBucketPointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bar_bucket_points")->insert([
           
            'bar_bucket_id'=>1,
            'point'=>1,
            'amount'=>5,
            'bucket_point_type'=>'reward',
            'status'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table("bar_bucket_points")->insert([
           
            'bar_bucket_id'=>2,
            'point'=>1,
            'bucket_point_type'=>'redeem',
            'amount'=>10,
            'status'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
       
    }
}
