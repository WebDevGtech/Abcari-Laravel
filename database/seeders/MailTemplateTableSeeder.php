<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MailTemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mail_templates')->insert([
            'name' =>'change_password',
            'subject' => 'Change Password',
            'mail_content' => 'Hi :name <br> 
                                Your Password is changed successfully. <br> 
                                Thanks & Regards <br> 
                                <p>Administration Team <br>',
            'status' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"), 
        ]);

    }
}
