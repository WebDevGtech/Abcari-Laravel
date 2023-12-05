<?php

namespace App\Http\Livewire\BarAdmin\BarSetting;
use Illuminate\Support\Facades\Auth;
use App\Models\BarRestaurantRule;
use App\Models\BarRestaurant;
use App\Models\Rule as RuleModel;
use Livewire\Component;
use Livewire\WithPagination;
class Rule extends Component
{
    use WithPagination;
public $selectrule,$deleteId,$search;
public $inputs=[];
public $i=0;
public function sumbitForm()
{

//$id=Auth::id();
//dd($id);
//dd($barrestaurant);
    //dd($this->selectrule);
   // dd(Auth::id());
 $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
    //dd($barrestaurant->id);
foreach($this->selectrule as $key =>$value)
{
    $addrule=new BarRestaurantRule;
    
    $addrule->rule_id=$this->selectrule[$key];
    //dd($addrule->rule_id);

    $addrule->bar_restaurant_id =$barrestaurant->id;
   // dd($addrule->bar_restaurant_id);
    $addrule->save();
} 
    $this->reset('selectrule');
    $this->dispatchBrowserEvent('modalClose');
$this->dispatchBrowserEvent('alert', [
'type' => 'success',
'message' => "Saved Successfully"
]);
}




// }
public function deleteId($id)
{
  $deleterule=BarRestaurantRule::where('id',$id)->first();
  $this->deleteId=$id;

  $this->delete_rule=$deleterule->rule_id;

}
public function deleteForm()
{
  $deleterule=BarRestaurantRule::where('id', $this->deleteId)->delete(); 
  $this->dispatchBrowserEvent('modalClose');
$this->dispatchBrowserEvent('alert', [
    'type' => 'success',
    'message' => "Rules Deleted"
]);
}
    public function updateStatus($value, $id)
    {
     
      $addtax = BarRestaurantRule::where('id', $id)->first();
      
      if ($value == true) {
        
        $addtax->status ='1';
        $this->dispatchBrowserEvent('alert', [
          'type' => 'success',
          'message' => "Updated Successfully"
          ]);
        
      } 
      else
       {
          
        $addtax->status ='0';
        $this->dispatchBrowserEvent('alert', [
          'type' => 'success',
          'message' => "Updated Successfully"
          ]);
      }
      $addtax->update(); 
    
    }


    public function render()
    {
      $search='%'.$this->search.'%';
      $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
        $BarRule=BarRestaurantRule::with('rule')->where([['bar_restaurant_id',$barrestaurant->id],['id','LIKE',$search]])->paginate(15);
        $pluckruleid=BarRestaurantRule::with('paymentgateway')->where('bar_restaurant_id',$barrestaurant->id)->pluck('rule_id');
        $rule=RuleModel::whereNotIn('id',$pluckruleid)->get();
       // dd($rule);
        return view('livewire.bar-admin.bar-setting.rule',['barrules'=>$BarRule,'rules'=>$rule]);
    }
} 
