<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
               'name'=>'abcari user1',
               'email'=>'user1@abcari.com',
               'language_id'=>1,
               'refresh_token'=>"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoxLCJ1c2VyX2dyb3VwX2lkIjo0LCJsYW5ndWFnZV9pZCI6MSwiaWF0IjoxNjYxMjM1NTIwLCJleHAiOjE2NjE4NDAzMjB9.TMd8hIrbD-DPdUbRHEsEe485DCHPkRur3p6fqkITTpU",
               'otp'=>1234,
               'status'=>'1',
               'online_status'=>'online',
               'mobile_number'=>'9789122033',
               'device'=>'asus',
               'fcm_token'=>'jkshdfkjdhgkj',
               'app_version'=>'1.0',
               'app_os_format'=>'ANDROID',
               'isbooked'=>'0',
               'reward_point_spent'=>0,
               'reward_point_earning'=>0,
               'reward_point_remaining'=>0,
               'registration_date'=>date("Y-m-d H:i:s"),
               'first_otp_verified_at'=>date("Y-m-d H:i:s"),
               'last_otp_verified_at'=>date("Y-m-d H:i:s"),
               'user_group_id'=>4,
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table("users")->insert([
            'name'=>'abcari user2',
            'email'=>'user2@abcari.com',
            'language_id'=>1,
            'refresh_token'=>"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjEsInVzZXJfZ3JvdXBfaWQiOjQsImlhdCI6MTY1OTYyMzY3MSwiZXhwIjoxNjU5NjIzNjgxfQ.nJsA2QV0aq2YfClbimeqqi4lgF5L-9XKP8LjyIfRbJ4",
            'otp'=>1234,
            'status'=>'1',
            'online_status'=>'online',
            'mobile_number'=>'9789122333',
            'device'=>'asus',
            'fcm_token'=>'jkshdfkjdhgkj',
            'app_version'=>'1.0',
            'app_os_format'=>'ANDROID',
            'isbooked'=>'0',
            'reward_point_spent'=>0,
            'reward_point_earning'=>0,
            'reward_point_remaining'=>0,
            'registration_date'=>date("Y-m-d H:i:s"),
            'first_otp_verified_at'=>date("Y-m-d H:i:s"),
            'last_otp_verified_at'=>date("Y-m-d H:i:s"),
            'user_group_id'=>4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
     ]);

     DB::table("users")->insert([
        'name'=>'abcari user3',
        'email'=>'use3r@abcari.com',
        'language_id'=>1,
        'refresh_token'=>"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjEsInVzZXJfZ3JvdXBfaWQiOjQsImlhdCI6MTY1OTYyMzY3MSwiZXhwIjoxNjU5NjIzNjgxfQ.nJsA2QV0aq2YfClbimeqqi4lgF5L-9XKP8LjyIfRbJ4",
        'otp'=>1234,
        'status'=>'1',
        'online_status'=>'online',
        'mobile_number'=>'9780122333',
        'device'=>'asus',
        'fcm_token'=>'jkshdfkjdhgkj',
        'app_version'=>'1.0',
        'app_os_format'=>'ANDROID',
        'isbooked'=>'0',
        'reward_point_spent'=>0,
        'reward_point_earning'=>0,
        'reward_point_remaining'=>0,
        'registration_date'=>date("Y-m-d H:i:s"),
        'first_otp_verified_at'=>date("Y-m-d H:i:s"),
        'last_otp_verified_at'=>date("Y-m-d H:i:s"),
        'user_group_id'=>4,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
 ]);

 DB::table("users")->insert([
    'name'=>'abcari user4',
    'email'=>'user@abcari.com4',
    'language_id'=>1,
    'refresh_token'=>"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjEsInVzZXJfZ3JvdXBfaWQiOjQsImlhdCI6MTY1OTYyMzY3MSwiZXhwIjoxNjU5NjIzNjgxfQ.nJsA2QV0aq2YfClbimeqqi4lgF5L-9XKP8LjyIfRbJ4",
    'otp'=>1234,
    'status'=>'1',
    'online_status'=>'online',
    'mobile_number'=>'9700122333',
    'device'=>'asus',
    'fcm_token'=>'jkshdfkjdhgkj',
    'app_version'=>'1.0',
    'app_os_format'=>'ANDROID',
    'isbooked'=>'0',
    'reward_point_spent'=>0,
    'reward_point_earning'=>0,
    'reward_point_remaining'=>0,
    'registration_date'=>date("Y-m-d H:i:s"),
    'first_otp_verified_at'=>date("Y-m-d H:i:s"),
    'last_otp_verified_at'=>date("Y-m-d H:i:s"),
    'user_group_id'=>4,
    'created_at' => date("Y-m-d H:i:s"),
    'updated_at' => date("Y-m-d H:i:s"),
]);

DB::table("users")->insert([
    'name'=>'abcari user5',
    'email'=>'user@abcari.com5',
    'language_id'=>1,
    'refresh_token'=>"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjEsInVzZXJfZ3JvdXBfaWQiOjQsImlhdCI6MTY1OTYyMzY3MSwiZXhwIjoxNjU5NjIzNjgxfQ.nJsA2QV0aq2YfClbimeqqi4lgF5L-9XKP8LjyIfRbJ4",
    'otp'=>1234,
    'status'=>'1',
    'online_status'=>'online',
    'mobile_number'=>'9000122333',
    'device'=>'asus',
    'fcm_token'=>'jkshdfkjdhgkj',
    'app_version'=>'1.0',
    'app_os_format'=>'ANDROID',
    'isbooked'=>'0',
    'reward_point_spent'=>0,
    'reward_point_earning'=>0,
    'reward_point_remaining'=>0,
    'registration_date'=>date("Y-m-d H:i:s"),
    'first_otp_verified_at'=>date("Y-m-d H:i:s"),
    'last_otp_verified_at'=>date("Y-m-d H:i:s"),
    'user_group_id'=>4,
    'created_at' => date("Y-m-d H:i:s"),
    'updated_at' => date("Y-m-d H:i:s"),
]);
      
DB::table("users")->insert([
    'name'=>'abcari user5',
    'email'=>'user@abcari.com6',
    'language_id'=>1,
    'refresh_token'=>"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjEsInVzZXJfZ3JvdXBfaWQiOjQsImlhdCI6MTY1OTYyMzY3MSwiZXhwIjoxNjU5NjIzNjgxfQ.nJsA2QV0aq2YfClbimeqqi4lgF5L-9XKP8LjyIfRbJ4",
    'otp'=>1234,
    'status'=>'1',
    'online_status'=>'online',
    'mobile_number'=>'9000022333',
    'device'=>'asus',
    'fcm_token'=>'jkshdfkjdhgkj',
    'app_version'=>'1.0',
    'app_os_format'=>'ANDROID',
    'isbooked'=>'0',
    'reward_point_spent'=>0,
    'reward_point_earning'=>0,
    'reward_point_remaining'=>0,
    'registration_date'=>date("Y-m-d H:i:s"),
    'first_otp_verified_at'=>date("Y-m-d H:i:s"),
    'last_otp_verified_at'=>date("Y-m-d H:i:s"),
    'user_group_id'=>4,
    'created_at' => date("Y-m-d H:i:s"),
    'updated_at' => date("Y-m-d H:i:s"),
]);
DB::table("users")->insert([
    'name'=>'abcari user5',
    'email'=>'user@abcari.com7',
    'language_id'=>1,
    'refresh_token'=>"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjEsInVzZXJfZ3JvdXBfaWQiOjQsImlhdCI6MTY1OTYyMzY3MSwiZXhwIjoxNjU5NjIzNjgxfQ.nJsA2QV0aq2YfClbimeqqi4lgF5L-9XKP8LjyIfRbJ4",
    'otp'=>1234,
    'status'=>'1',
    'online_status'=>'online',
    'mobile_number'=>'9000002333',
    'device'=>'asus',
    'fcm_token'=>'jkshdfkjdhgkj',
    'app_version'=>'1.0',
    'app_os_format'=>'ANDROID',
    'isbooked'=>'0',
    'reward_point_spent'=>0,
    'reward_point_earning'=>0,
    'reward_point_remaining'=>0,
    'registration_date'=>date("Y-m-d H:i:s"),
    'first_otp_verified_at'=>date("Y-m-d H:i:s"),
    'last_otp_verified_at'=>date("Y-m-d H:i:s"),
    'user_group_id'=>4,
    'created_at' => date("Y-m-d H:i:s"),
    'updated_at' => date("Y-m-d H:i:s"),
]);

DB::table("users")->insert([
    'name'=>'abcari user5',
    'email'=>'user@abcari.com8',
    'language_id'=>1,
    'refresh_token'=>"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjEsInVzZXJfZ3JvdXBfaWQiOjQsImlhdCI6MTY1OTYyMzY3MSwiZXhwIjoxNjU5NjIzNjgxfQ.nJsA2QV0aq2YfClbimeqqi4lgF5L-9XKP8LjyIfRbJ4",
    'otp'=>1234,
    'status'=>'1',
    'online_status'=>'online',
    'mobile_number'=>'9000002335',
    'device'=>'asus',
    'fcm_token'=>'jkshdfkjdhgkj',
    'app_version'=>'1.0',
    'app_os_format'=>'ANDROID',
    'isbooked'=>'0',
    'reward_point_spent'=>0,
    'reward_point_earning'=>0,
    'reward_point_remaining'=>0,
    'registration_date'=>date("Y-m-d H:i:s"),
    'first_otp_verified_at'=>date("Y-m-d H:i:s"),
    'last_otp_verified_at'=>date("Y-m-d H:i:s"),
    'user_group_id'=>4,
    'created_at' => date("Y-m-d H:i:s"),
    'updated_at' => date("Y-m-d H:i:s"),
]);
      
      
    }
}
