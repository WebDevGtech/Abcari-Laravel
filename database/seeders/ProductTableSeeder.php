<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationStock;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
           for($i=0;$i<7;$i++)
           {
            $top_picks=1;
            $recommendeds=1;
            $preferred=1;
            $happy_hour=1;
            $create=
        [
            'admin_id'=>1,
            'bar_restaurant_id'=>1,
            'category_id'=>$i+1,
            'category_id'=>1,
            'brand_id'=>1,
            'variation_type_id'=>1,
            'name' => "Product".$i,
            'slug' => "Product".$i,
            'sku'=> "Product".$i,
            'description' => "This is description",
            'image' =>  "Product".$i,
            'thumbnail_image' =>  "Product".$i,
            'top_picks'=>$top_picks,
            'is_addon'=>1,
            'recommendeds'=>$recommendeds,
            'preferred'=>$preferred,
            'happy_hour'=>$happy_hour,
            'price'=>50,
            'weight'=>100,
            'tax_id'=>1,
            'status'=>1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];   
        $products=Product::create($create);
    }
        for($i=0;$i<7;$i++)
           {
           
                    $variation=[
                        'product_id'=>$i+1,
                        'variation_type_id'=>$i+1,
                        'value' => 50,
                        'price' => 200,
                        'is_happyhour_price'=>100,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ];
                    $productVariations=ProductVariation::create($variation);
           }
          
           for($i=0;$i<7;$i++)
           {
           
                    $stocks=['quantity'=>100,
                    'product_variation_id' => $i+1,
                    'bar_restaurant_id'=>1,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),];
                    $products=ProductVariationStock::create($stocks);

           }
          
           }

                
}
