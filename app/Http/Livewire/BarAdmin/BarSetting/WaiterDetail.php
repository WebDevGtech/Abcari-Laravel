<?php

namespace App\Http\Livewire\BarAdmin\BarSetting;
use App\Models\BarRestaurant;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\BarWaiterDetail;
class WaiterDetail extends Component
{
    use WithPagination;
public $name,$phone_number,$search;
public $edit_name,$edit_phone_number;
public $editId,$deleteId;

public function submitForm()
{
    $this->validate(['name'=>'required|regex:/^[a-z A-Z]+$/u|max:50','phone_number'=>'required|min:10'],
    ['name.required'=>trans('waiter-detail.name_required'),
    'name.regex'=>trans('waiter-detail.name_regex'),
    'name.max'=>trans('waiter-detail.name_max'),
    'phone_number.required'=>trans('waiter-detail.phonenumber_required'),
    'phone_number.min'=>trans('Phone number must be 10 digit'),
   ]);
    $barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
    $addwaiter=new BarWaiterDetail;
    $addwaiter->bar_restaurant_id=$barrestaurant->id; 
    $addwaiter->name=$this->name;
    $addwaiter->phone_number=$this->phone_number;
    $addwaiter->save();
    $this->reset('name','phone_number');
    $this->dispatchBrowserEvent('modalClose');
$this->dispatchBrowserEvent('alert', [
'type' => 'success',
'message' => "Waiter Details Added"
]);

}
public function editId($id)
{
 $edit=BarWaiterDetail::where('id',$id)->first();
 $this->editId=$id;
 $this->edit_name=$edit->name;
 $this->edit_phone_number=$edit->phone_number;
}

 public function editForm()
 {
    $this->validate(['edit_name'=>'required|regex:/^[a-z A-Z]+$/u|max:50'],
   // 'edit_phone_number'=>'required|min:10'],
    ['edit_name.required'=>trans('waiter-detail.name_required'),
    'edit_name.regex'=>trans('waiter-detail.name_regex'),
    'edit_name.max'=>trans('waiter-detail.name_max'),
   // 'edit_phone_number.required'=>trans('waiter-detail.phonenumber_required'),
   // 'edit_phone_number.min'=>trans('waiter-detail.phonenumber_max'),
 ]);
    $editwaiter=BarWaiterDetail::where('id',$this->editId)->first();

    $editwaiter->name=$this->edit_name;
    $editwaiter->phone_number=$this->edit_phone_number;
    $editwaiter->update();
    $this->reset('edit_name','edit_phone_number');
    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert', [
    'type' => 'success',
    'message' => "Waiter Details Updated"
    ]);
}
public function deleteId($id)
{
    $edit=BarWaiterDetail::where('id',$id)->first();
    $this->deleteId=$id;  
}
public function deleteForm()
{
    $edit=BarWaiterDetail::where('id',$this->deleteId)->delete();
    $this->dispatchBrowserEvent('modalClose');
    $this->dispatchBrowserEvent('alert', [
    'type' => 'success',
    'message' => "Waiter Detail Deleted"
    ]);
}






    public function render()
    {
        $search='%'.$this->search.'%';
        $waiter=BarWaiterDetail::where('name','LIKE',$search)->paginate(15);
        return view('livewire.bar-admin.bar-setting.waiter-detail',['waiters'=>$waiter]);
    }
}
