<?php

namespace App\Http\Livewire\BarAdmin\Settings;

use Livewire\Component;
use Auth;
use Livewire\WithFileUploads;
use App\Models\BarRestaurant;
use  Livewire\WithPagination;
use App\Models\PushNotification as PushNotificationModel;
class PushNotification extends Component
{
    use  WithPagination;
    use WithFileUploads;
    private $pushnotify;
public $title,$body,$image,$type,$search;
public function submitForm()
{
    $this->validate(['title'=>'required|regex:/^[a-z A-Z]+$/u|max:50','body'=>'required|regex:/^[a-z A-Z]+$/u|max:300','type'=>'required'],['title.required'=>trans('pushnotification.title_required'),
    'title.regex'=>trans('pushnotification.title_regex'),
    'title.max'=>trans('pushnotification.title_max'),
    'body.required'=>trans('pushnotification.body_required'),
    'body.regex'=>trans('pushnotification.body_regex'),
    'body.max'=>trans('pushnotification.body_max'), 
    'type.required'=>trans('pushnotification.type_required'),
    
]);
//$image=$this->image->store('photos','public');
$barrestaurant=BarRestaurant::where('user_id',Auth::id())->first();
$addpush=new PushNotificationModel;
$addpush->title=$this->title;
$addpush->body=$this->body;

$addpush->type=$this->type;
$addpush->save();
if( $this->image)
{
$imagepush=PushNotificationModel::where('id',$addpush->id)->first();
$extension = $this->image->getClientOriginalExtension();
//dd($extension);
$image=$this->image->storeAs('images/'.$barrestaurant->name.'_'.$barrestaurant->id.'/push_notifications',$imagepush->title.'_'.$imagepush->id.'.'.$extension,'public');
$imagepush->image=$image;
$imagepush->save();
}
$this->reset('title','body','image','type');
$this->dispatchBrowserEvent('modalClose');
$this->dispatchBrowserEvent('alert', [
    'type' => 'success',
    'message' => "Saved Successfully"
]);
}
    public function render()
    {
        $search = $this->search .'%';
$this->pushnotify=PushNotificationModel::where('title','LIKE',$search)->paginate(15);
        return view('livewire.bar-admin.settings.push-notification',['pushnotifications'=>$this->pushnotify]);
    }
}
