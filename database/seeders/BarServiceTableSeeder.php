<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  DB::table('bar_services')->insert(
        [
            'name' => 'Liquor',
            'image' => '',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]
    );
    DB::table('bar_services')->insert(
        [
            'id'=>2,
            'name' => 'Food',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
  
    DB::table('bar_services')->insert(
        [
            'id'=>3,
            'name' => 'Soft Drinks',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]
    );
    DB::table('bar_services')->insert(
        [
            'id'=>4,
            'name' => 'Fresh Juice',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]
    );
    DB::table('bar_services')->insert(
        [
            'id'=>5,
            'name' => 'Food Addons',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]
    );
    DB::table('bar_services')->insert(
        [
            'id'=>6,
            'name' => 'Liquor Mixings',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]
    );

}
}
