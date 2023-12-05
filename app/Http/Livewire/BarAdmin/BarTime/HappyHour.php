<?php

namespace App\Http\Livewire\BarAdmin\BarTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\HappyHour as HappyHourModel;
use App\Models\BarRestaurant;
use Livewire\WithPagination;
class HappyHour extends Component
{
    use WithPagination;
public $start_time,$end_time,$extended_hour,$available_days,$search;
public $edit_start_time,$edit_end_time,$edit_extended_hour,$edit_available_days,$editId;
public $delete_start_time,$delete_end_time,$deleteId,$allday,$edit_allday;
private $happyhour,$barrestaurant,$pluckhappyhours;
public function alldaycheck($value)
{
  if($value)
  {
$this->available_days[0]='Sunday';
$this->available_days[1]='Monday';
$this->available_days[2]='Tuesday';
$this->available_days[3]='Wednesday';
$this->available_days[4]='Thursday';
$this->available_days[5]='Friday';
$this->available_days[6]='Saturday';
  }
  else
  {
    $this->available_days[0]='';
    $this->available_days[1]='';
    $this->available_days[2]='';
    $this->available_days[3]='';
    $this->available_days[4]='';
    $this->available_days[5]='';
    $this->available_days[6]=''; 
  }
}
public function editalldaycheck($value)
{
  if($value)
  {
$this->edit_available_days[0]='Sunday';
$this->edit_available_days[1]='Monday';
$this->edit_available_days[2]='Tuesday';
$this->edit_available_days[3]='Wednesday';
$this->edit_available_days[4]='Thursday';
$this->edit_available_days[5]='Friday';
$this->edit_available_days[6]='Saturday';
  }
  else
  {
    $this->edit_available_days[0]='';
    $this->edit_available_days[1]='';
    $this->edit_available_days[2]='';
    $this->edit_available_days[3]='';
    $this->edit_available_days[4]='';
    $this->edit_available_days[5]='';
    $this->edit_available_days[6]=''; 
  }
}

public function updateStatus($value, $id)
{
 
  $addhappy = HappyHourModel::where('id', $id)->first();
  
  if ($value == true) {
    
    $addhappy->status ='1';
    $this->dispatchBrowserEvent('alert',[
      'type'=>'success',
      'message'=>'Updated Successfully'
    ]);
  } else { 
    $addhappy->status ='0';
    $this->dispatchBrowserEvent('alert',[
      'type'=>'success',
      'message'=>'Updated Successfully'
    ]);
  }
  $addhappy->update();
}
public function submitForm()
{
  //dd($this->available_days);
  $this->validate(['start_time'=>'required','end_time'=>'required','extended_hour'=>'required','available_days'=>'required'],['start_time.required'=>trans('peakhour.start_time_required'),'end_time.required'=>trans('peakhour.end_time_required'),'extended_hour.required'=>trans('peakhour.extended_hour_required'),'available_days.required'=>trans('peakhour.available_days_required')]);
$addbar=BarRestaurant::where('user_id',Auth::id())->first();
foreach($this->available_days as $key =>$value )
{
$addhappy=new HappyHourModel;
$addhappy->bar_restaurant_id =$addbar->id;
$addhappy->stating_time =$this->start_time;
$addhappy->end_time =$this->end_time;
$addhappy->extended_minutes =$this->extended_hour;
//$this->available_days=implode(',',$this->available_days);

$addhappy->available_days=$this->available_days[$key];
//dd($addpeak->available_days);
$addhappy->save();
}
$this->reset('start_time','end_time','extended_hour','available_days');
$this->dispatchBrowserEvent('modalClose');
$this->dispatchBrowserEvent('alert', [
'type' => 'success',
'message' => "Added Successfully"
]);
}
public function editId($id)
{
  $edithappy=HappyHourModel::where('id',$id)->first();
  $this->editId=$id;
$this->edit_start_time=$edithappy->stating_time;
$this->edit_end_time=$edithappy->end_time;
$this->edit_extended_hour=$edithappy->extended_minutes;

if($edithappy->available_days == null){


$this->edit_available_days=$edithappy->available_days;
}
}
public function editForm()
{



  $edit=HappyHourModel::where('id',$this->editId)->first();
  $edit->stating_time =$this->edit_start_time;
$edit->end_time =$this->edit_end_time;
$edit->extended_minutes =$this->edit_extended_hour;
 //$this->edit_available_days=implode(',',$this->edit_available_days);
 if($this->edit_available_days)
 {
 foreach($this->edit_available_days as $key =>$value )
 {
$edit->available_days=$this->edit_available_days[$key];
}
 }

$edit->update();

$this->dispatchBrowserEvent('modalClose');
$this->dispatchBrowserEvent('alert', [
'type' => 'success',
'message' => "Updated Successfully"
]);
}


    public function render()
    {
      $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
    
        $search = $this->search.'%';
        $this->happyhour=HappyHourModel::where([['bar_restaurant_id',$barrestaurant->id],['available_days','LIKE',$search]])->paginate(15);

    
       
        $this->pluckhappyhours=HappyHourModel::where('bar_restaurant_id',$barrestaurant->id)->pluck('available_days')->toarray();
       // $this->happyhour=HappyHourModel::whereIn('id',$pluckhappyhourid)->get();
        return view('livewire.bar-admin.bar-time.happy-hour',['happyhours'=>$this->happyhour,'pluckhappyhours'=> $this->pluckhappyhours]);
    }
}
