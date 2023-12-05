<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarRestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bar_restaurants")->insert([

            'id'=>1,
               'user_id'=>3,
               'bar_bucket_id'=>1,
               'bar_tie_up_id'=>1,
              
               'post_code_id'=>1,
               'name'=>'The Aviary',
               'image'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'banner_image_1'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'banner_image_2'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'banner_image_3'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'top_picks'=>"1",
               'recommendeds'=>"0",
               'preferred'=>"0",
               'opening_hour'=>date("H:i:s"),
               'closing_hour'=>date("H:i:s"),
               'peak_hour'=>date("H:i:s"),
               'status'=>"1",
               'description'=> 'welcome to Aviary',
               'latitude' => '11.332354866',
               'longitude' => '77.72231443',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table("bar_restaurants")->insert([
            'id'=>2,
               'user_id'=>4,
               'bar_bucket_id'=>2,
               'bar_tie_up_id'=>1,
               'post_code_id'=>1,
              
               'name'=>'The Night Club',
               'image'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'banner_image_1'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'banner_image_2'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'banner_image_3'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'top_picks'=>"0",
               'recommendeds'=>"1",
               'preferred'=>"0",
               'opening_hour'=>date("H:i:s"),
               'closing_hour'=>date("H:i:s"),
               'peak_hour'=>date("H:i:s"),
               'status'=>"1",
               'description'=> 'welcome to NightClub',
               'latitude' => '11.332354866',
               'longitude' => '73.72231443',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table("bar_restaurants")->insert([
            'id'=>3,
               'user_id'=>5,
               'bar_bucket_id'=>2,
               'bar_tie_up_id'=>1,
               'post_code_id'=>1,
              
               'name'=>'The Night Ride',
               'image'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'banner_image_1'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'banner_image_2'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'banner_image_3'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'top_picks'=>"0",
               'recommendeds'=>"0",
               'preferred'=>"1",
               'opening_hour'=>date("H:i:s"),
               'closing_hour'=>date("H:i:s"),
               'peak_hour'=>date("H:i:s"),
               'status'=>1,
               'description'=> 'welcome to NightClub',
               'latitude' => '11.332354866',
               'longitude' => '73.72231443',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table("bar_restaurants")->insert([
            'id'=>4,
            'user_id'=>3,
            'bar_bucket_id'=>2,
            'bar_tie_up_id'=>2,
            'post_code_id'=>1,
           
            'name'=>'The Night Ride',
            'image'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
            'banner_image_1'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
            'banner_image_2'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
            'banner_image_3'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
            'top_picks'=>"0",
            'recommendeds'=>"0",
            'preferred'=>"0",
            'opening_hour'=>date("H:i:s"),
            'closing_hour'=>date("H:i:s"),
            'peak_hour'=>date("H:i:s"),
            'status'=>"1",
            'description'=> 'welcome to NightClub',
            'latitude' => '11.332354866',
            'longitude' => '73.72231443',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
     ]);
        DB::table("bar_restaurants")->insert([
               'id'=>5,
               'user_id'=>4,
               'bar_bucket_id'=>2,
               'bar_tie_up_id'=>2,
               'post_code_id'=>1,
             
               'name'=>'The Night Ride',
               'image'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'banner_image_1'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'banner_image_2'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'banner_image_3'=>'https://b.zmtcdn.com/data/pictures/2/19836572/083cdbd6e9cf88d2b03caca5674e3a9c.jpg',
               'top_picks'=>"0",
               'recommendeds'=>"0",
               'preferred'=>"0",
               'opening_hour'=>date("H:i:s"),
               'closing_hour'=>date("H:i:s"),
               'peak_hour'=>date("H:i:s"),
               'status'=>"0",
               'description'=> 'welcome to NightClub',
               'latitude' => '11.332354866',
               'longitude' => '73.72231443',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s"),
        ]);

    }
}
