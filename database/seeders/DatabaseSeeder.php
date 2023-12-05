<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       //General Tables

          $this->call(UserGroupTableSeeder::class);
          $this->call(LanguageTableSeeder::class);
          $this->call(AdminUserTableSeeder::class);
      //  General Tables
        // $this->call(AppVersionTableSeeder::class);
   
        //$this->call(AppSettingTableSeeder::class);
        //$this->call(BarTieUpTableSeeder::class);
        
      
        //$this->call(CountryTableSeeder::class);
       // $this->call(ZoneTableSeeder::class);
       //$this->call(CityTableSeeder::class);
       // $this->call(PostCodeTableSeeder::class);
       //$this->call(PaymentGatewayTableSeeder::class);
        
       // $this->call(UserTableSeeder::class);
       //$this->call(UserProfileTableSeeder::class);
       // $this->call(BrandTableSeeder::class);
      // $this->call(TaxTypeTableSeeder::class);
       // $this->call(OrderStatusTableSeeder::class);
    
       // $this->call(BarBookingTypeTableSeeder::class);
      // $this->call(VariationTypeTableSeeder::class);
        //General Tables

      // Bar Tables
        //$this->call(BarCategoryTableSeeder::class);
       // $this->call(BarBucketTableSeeder::class);
       // $this->call(BarBucketPointTableSeeder::class);
       // $this->call(BarServiceTableSeeder::class);
        //$this->call(BarRestaurantTableSeeder::class);
       // $this->call(BarRestaurantCategoryTableSeeder::class);
       // $this->call(BarServiceRestaurantTableSeeder::class);

     //  Bar Tables

       // Product Tables
       //$this->call(CategoryTableSeeder::class);
      
        //$this->call(ProductTableSeeder::class);

       

       // $this->call(GeneralBannerTableSeeder::class);
       //Buddy Tables
     //  $this->call(BuddyRequestTableSeeder::class);
     //  $this->call(BuddyListTableSeeder::class);
      // $this->call(BuddyGroupTableSeeder::class);
       //$this->call(BuddyGroupMemberTableSeeder::class);

       
      

    }
}
