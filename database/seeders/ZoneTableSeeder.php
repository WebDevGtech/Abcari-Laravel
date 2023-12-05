<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
//
 // DB::table('zones')->delete();
  $zones = array(

    array('name' => "Tamil Nadu",
    'country_id' => 1,'status'=>1),
 
    );
    DB::table('zones')->insert($zones);
}
}
