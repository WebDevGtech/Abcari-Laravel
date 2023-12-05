<?php

namespace App\Traits;

trait CurlProcessor {

//     public function makeCurlPostRequest($status,$bar_id,$type,$live_order_id,$invoice_id,$user_mobile,$heading) {
       
// dd('a');
//         $content = array(
//             "en" => $heading
//         );
 
//         $headings = array(
//             "en" => "Order Notification"
//         );

//         $img = array(
//             "id1" => ""
//         );

//         $ios_img=array(
//             "id2"=>""
//         );

//         $fields = array(
//             'app_id' => '8b529ff0-e0d1-4716-9c30-b3fa42aec344',
//             "headings" => $headings,
//             'include_external_user_ids' => array($user_mobile),
//             'contents' => $content,
//             'android_sound' =>'notification',
//             "big_picture" =>$img,
//             'large_icon' => $img,
//             'content_available' => true,
//             "ios_attachments" => $ios_img,
//             "priority" => 10,
//             "data" => array(
//                 'live_order_status'=> $status,
//                 'bar_id'=> $bar_id,
//                 'type'=> $type,
//                 'live_order_id'=> $live_order_id,
//                 'invoice_id'=>$invoice_id, 
    
//             )
           
//         );
  
//         $headers = array(
//             'Authorization: Basic YjMzYzY2MGUtMmI2MC00YzRjLWFjMmItZjljOTlmNzEyYWVh',
//             'Content-Type: application/json; charset=utf-8'
//         );
  
//         $ch = curl_init();
  
//         curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/notifications'
//   );
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
  
//         $result = curl_exec($ch);
//         curl_close($ch);
//         dd($result);
  
//     }
    public function makeCurlPostRequest($status,$bar_id,$type,$live_order_id,$invoice_id,$user_mobile,$heading) {

      
        // dd($user_id);
         $content = array(
             "en" => $heading
         );
  
         $headings = array(
             "en" => "Order Notification"
         );
         
         $img = array(
             "id1" => ""
         );
         $ios_img=array(
             "id2"=>""
         );

      

 
 
         $fields = array(
             'app_id' => '8b529ff0-e0d1-4716-9c30-b3fa42aec344',
             "headings" => $headings,
             'include_external_user_ids' => array($user_mobile),
             'contents' => $content,
             'android_sound' =>'notification',
             "big_picture" =>$img,
             'large_icon' => $img,
             'content_available' => true,
             "ios_attachments" => $ios_img,
             "priority" => 10,
             "data" => array(
                'live_order_status'=> $status,
                'bar_id'=> $bar_id,
                'type'=> $type,
                'live_order_id'=> $live_order_id,
                'invoice_id'=>$invoice_id, 
    
            )
            
          
         );
      
   
         $headers = array(
             'Authorization: Basic YjMzYzY2MGUtMmI2MC00YzRjLWFjMmItZjljOTlmNzEyYWVh',
             'Content-Type: application/json; charset=utf-8'
         );
   
         $ch = curl_init();
   
         curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/notifications'
   );
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
     
         $result = curl_exec($ch);
         curl_close($ch);
        // dd( $fields);
        // $this -> response['data'] = json_decode($data);

     }

}
