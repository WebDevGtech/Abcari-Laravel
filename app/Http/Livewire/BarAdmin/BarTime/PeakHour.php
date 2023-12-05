<?php

namespace App\Http\Livewire\BarAdmin\BarTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\PeakHour as PeakHourModel;
use App\Models\BarRestaurant;
use Livewire\WithPagination;
class PeakHour extends Component
{
  use WithPagination;
public $start_time,$end_time,$extended_hour,$available_days,$search;
public $edit_start_time,$edit_end_time,$edit_extended_hour,$edit_available_days,$editId;
public $delete_start_time,$delete_end_time,$deleteId,$allday;
private $peakhour,$barrestaurant,$pluckpeakhours;
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
     
      $addpeak = PeakHourModel::where('id', $id)->first();
      
      if ($value == true) {
        
        $addpeak->status ='1';
        $this->dispatchBrowserEvent('alert', [
          'type' => 'success',
          'message' => "Updated Successfully"
          ]);
      } 
      else
       { 
        $addpeak->status ='0';
        $this->dispatchBrowserEvent('alert', [
          'type' => 'success',
          'message' => "Updated Successfully"
          ]);
      }
      $addpeak->update();
    }
    public function submitForm()
    {
      $this->validate(['start_time'=>'required','end_time'=>'required','extended_hour'=>'required','available_days'=>'required'],['start_time.required'=>trans('peakhour.start_time_required'),'end_time.required'=>trans('peakhour.end_time_required'),'extended_hour.required'=>trans('peakhour.extended_hour_required'),'available_days.required'=>trans('peakhour.available_days_required')]);
      $addbar=BarRestaurant::where('user_id',Auth::id())->first();
    foreach($this->available_days as $key =>$value )
{
$addpeak=new PeakHourModel;
$addpeak->bar_restaurant_id =$addbar->id;
$addpeak->stating_time =$this->start_time;
$addpeak->end_time =$this->end_time;
$addpeak->extended_hours =$this->extended_hour;
//$this->available_days=implode(',',$this->available_days);
$addpeak->available_days=$this->available_days[$key];
//dd($addpeak->available_days);
$addpeak->save();
}  
$this->reset('start_time','end_time','extended_hour','available_days');
$this->dispatchBrowserEvent('modalClose');
$this->dispatchBrowserEvent('alert', [
    'type' => 'success',
    'message' => "PeakHour Added"
]);
    }
    public function editId($id)
    {
      $editpeak=PeakHourModel::where('id',$id)->first();
      $this->editId=$id;
      $this->edit_start_time=$editpeak->stating_time;
      $this->edit_end_time=$editpeak->end_time;
      $this->edit_extended_hour=$editpeak->extended_hours;
      
if($editpeak->available_days == null){


  $this->edit_available_days=$editpeak->available_days;
  }
     
    }
    public function editForm()
    {
  
      $edit=PeakHourModel::where('id',$this->editId)->first();
      $edit->stating_time =$this->edit_start_time;
$edit->end_time =$this->edit_end_time;
$edit->extended_hours =$this->edit_extended_hour;
//$this->available_days=implode(',',$this->available_days);
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
    'message' => "PeakHour Updated"
]);
    }

    public function render()
    {
      $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
    
        $search =$this->search.'%';
        $this->peakhour=PeakHourModel::where([['bar_restaurant_id',$barrestaurant->id],['available_days','LIKE',$search]])->paginate(15);
     
    
    
        $this->pluckpeakhours=PeakHourModel::where('bar_restaurant_id',$barrestaurant->id)->pluck('available_days')->toarray();
      
        return view('livewire.bar-admin.bar-time.peak-hour',['peakhours'=>$this->peakhour,'pluckpeakhours'=> $this->pluckpeakhours]);
    }
}
