<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AppControl;
use GuzzleHttp\Promise\Create;

class AppControlLivewire extends Component
{

      public $name,$image,$address,$minimum,$maximum,$sellingproduct,$cart,$openingtime,$closingtime;
   
    
     
      public function update(){  
        $this->validate([
        'name' =>'required|regex:/^[a-zA-Z]+$/u',
        'image'=>'required|url',
        'address'=>'required|max:200',
        'minimum' =>'required|min:1|integer',  
        'maximum'=>'required|min:1|integer',
        'sellingproduct'=>'required|min:1|integer',
        'cart' =>'required|min:1|integer',
        'openingtime'=>'required',
        'closingtime'=>'required'
        ],[
          'name.required'=>'name field required',
           'name.regex'=>'name in string',
           'image.required'=>'image field required',
           'image.url'=> 'image url required',
           'address.required'=>'address field required',
           'minimum.required'=>'minimum ordering field required',
           'maximum.required'=>'maximum count field required',
           'sellingproduct.required'=>' minimum count field required',
           'cart.required'=>'minimum count for cart field required',
           'openingtime.required'=>'app opening time field required',
           'closingtime.required'=>'app closing time field required'
        ]);

        
      
        $update =Appcontrol::where('id',1)->update(['name'=>$this->name,'image'=>$this->image,'address'=>$this->address,'minimum_order'=>$this->minimum,'order_distance'=>$this->maximum,'best_selling_count'=>$this->sellingproduct,'cart_count'=>$this->cart,'app_intime'=>$this->openingtime,'app_outtime'=>$this->closingtime]);  
        
 

        
    }
    public function render()
    {
        $edit=AppControl::where('id',1)->first(); 
        
        
        $this->name=$edit->name;
        $this->image=$edit->image;
        $this->address=$edit->address;
        $this->minimum=$edit->minimum_order;
        $this->maximum=$edit->order_distance;
        $this->sellingproduct=$edit->best_selling_count;
        $this->cart=$edit->cart_count;
        $this->openingtime=$edit->app_intime;
        $this->closingtime=$edit->app_outtime;
        
        return view('livewire.app-control-livewire',['name'=>$this->name,'image'=>$this->image,'address'=>$this->address,
        'minimum_order'=>$this->minimum,'order_distance'=>$this->maximum,'best_selling_count'=>$this->sellingproduct,
   'cart_count'=>$this->cart,'app_intime'=>$this->openingtime,'app_outtime'=>$this->closingtime ]);
    }
}
