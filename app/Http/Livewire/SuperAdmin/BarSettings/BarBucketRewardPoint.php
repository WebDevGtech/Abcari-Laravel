<?php

namespace App\Http\Livewire\SuperAdmin\BarSettings;

use App\Models\BarBucket;
use App\Models\BarBucketPoint as BarBucketPointModel;
use Livewire\Component;
use Livewire\WithPagination;

class BarBucketRewardPoint extends Component
{
    use WithPagination;
    public $name, $barbucket, $rewardpoint, $rewardamount, $editId, $search, $bucket_point_type, $redeempoint, $redeemamount, $arabicname;
    public $edit_name, $edit_rewardpoint, $edit_rewardamount, $edit_redeempoint, $edit_redeemamount, $edit_arabicname;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteconfirmed' => 'delete'];

    public function save()
    {

        $this->validate([

            'name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
            'arabicname' => 'max:50',
            'rewardpoint' => 'required|numeric|min:1',
            'rewardamount' => 'required|numeric',
            'redeempoint' => 'required|numeric|min:1',
            'redeemamount' => 'required|numeric',
        ], [
            'name.required' => trans('barbucketreward.name_required'),
            'name.regex' => trans('barbucketreward.name_regex'),
            'name.max' => trans('barbucketreward.name_max'),
            'arabicname.required' => trans('barbucketreward.arabic_name_required'),
            'arabicname.max' => trans('barbucketreward.arabic_name_max'),

            'rewardpoint.required' => trans('barbucketreward.rewardpoint_required'),
            'rewardpoint.numeric' => trans('barbucketreward.rewardpoint_numeric'),
            'rewardamount.required' => trans('barbucketreward.rewardamount_required'),
            'rewardamount.numeric' => trans('barbucketreward.rewardamount_numeric'),
            'redeempoint.required' => trans('barbucketreward.redeempoint_required'),
            'redeempoint.numeric' => trans('barbucketreward.redeempoint_numeric'),
            'redeemamount.required' => trans('barbucketreward.redeemamount_required'),
            'redeemamount.numeric' => trans('barbucketreward.redeemamount_numeric'),
        ]);

        $barbucket = new BarBucket;
        $barbucket->name = $this->name;
        $barbucket->arabic_name = $this->arabicname;
        $barbucket->save();
// dd('ad');
        for ($i = 0; $i < 2; $i++) {

            if ($i == 0) {
                $content = new BarBucketPointModel;

                $content->bar_bucket_id = $barbucket->id;
                $content->bucket_point_type = 'reward';
                $content->point = $this->rewardpoint;
                $content->amount = $this->rewardamount;
                $content->save();
                // dd('a');
            } else {
                $content = new BarBucketPointModel();

                $content->bar_bucket_id = $barbucket->id;
                $content->bucket_point_type = 'redeem';
                $content->point = $this->redeempoint;
                $content->amount = $this->redeemamount;
                $content->save();

            }

        }
        $this->reset(['name','arabicname','rewardpoint','rewardamount','redeempoint','redeemamount']);

        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Saved Successfully',
        ]);

    }

    public function updateStatus($value, $id)
    {

        $orders = BarBucketPointModel::where('id', $id)->first();

        if ($value == true) {

            $orders->status = '1';
            $this->dispatchBrowserEvent('onstatus');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        } else {
            $orders->status = '0';
            $this->dispatchBrowserEvent('offstatus');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        $orders->save();
    }

    public function deleteId($id)
    {

        $this->delete = $id;
        $this->dispatchBrowserEvent('some-confirmation');

    }
    public function delete()
    {

        $content = BarBucket::with('point')->where('id', $this->delete)->first();
        $countpoint = count($content->point);
        if ($countpoint > 0) {
            $bucketpoint = BarBucketPointModel::where('bar_bucket_id', $content->id)->delete();
        }

        $content->delete();
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Deleted Successfully',
        ]);

    }

    public function reseted()
    {
        $this->reset(['name', 'barbucket']);

    }

    public function edit($id)
    {

        $edit = BarBucket::with('pointreward', 'pointredeem')->where('id', $id)->first();
        //dd($edit);
        $this->editId = $id;
        $this->edit_name = $edit->name;
        $this->edit_arabicname = $edit->arabic_name;
        $this->edit_rewardpoint = $edit->pointreward->point;
        $this->edit_rewardamount = $edit->pointreward->amount;

        $this->edit_redeempoint = $edit->pointredeem->point;
        $this->edit_redeemamount = $edit->pointredeem->amount;

    }

    public function submit()
    {
        $this->validate([

            'edit_name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
            'edit_arabicname' => 'required|max:50',
            'edit_rewardpoint' => 'required|numeric',
            'edit_rewardamount' => 'required|numeric',
            'edit_redeempoint' => 'required|numeric',
            'edit_redeemamount' => 'required|numeric',
        ], [
            'edit_name.required' => trans('barbucketreward.name_required'),
            'edit_name.regex' => trans('barbucketreward.name_regex'),
            'edit_name.max' => trans('barbucketreward.name_max'),
            'edit_arabicname.required' => trans('barbucketreward.arabic_name_required'),
            'edit_arabicname.max' => trans('barbucketreward.arabic_name_max'),

            'edit_rewardpoint.required' => trans('barbucketreward.rewardpoint_required'),
            'edit_ewardpoint.numeric' => trans('barbucketreward.rewardpoint_numeric'),
            'edit_rewardamount.required' => trans('barbucketreward.rewardamount_required'),
            'edit_rewardamount.numeric' => trans('barbucketreward.rewardamount_numeric'),
            'edit_redeempoint.required' => trans('barbucketreward.redeempoint_required'),
            'edit_redeempoint.numeric' => trans('barbucketreward.redeempoint_numeric'),
            'edit_redeemamount.required' => trans('barbucketreward.redeemamount_required'),
            'edit_redeemamount.numeric' => trans('barbucketreward.redeemamount_numeric'),
        ]);
        $barbucket = BarBucket::where('id', $this->editId)->first();
        $barbucket->name = $this->edit_name;
        $barbucket->arabic_name = $this->edit_arabicname;
        $barbucket->save();

        for ($i = 0; $i < 2; $i++) {

            if ($i == 0) {

                $content = BarBucketPointModel::where([['bar_bucket_id', $this->editId], ['bucket_point_type', 'reward']])->first();
                $content->point = $this->edit_rewardpoint;
                $content->amount = $this->edit_rewardamount;
                $content->save();
                // dd('a');
            } else {
                $content = BarBucketPointModel::where([['bar_bucket_id', $this->editId], ['bucket_point_type', 'redeem']])->first();

                $content->point = $this->edit_redeempoint;
                $content->amount = $this->edit_redeemamount;
                $content->save();

            }

        }
       
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Updated Successfully',
        ]);

    }

    public function render()
    { //dd('a');
        $search = $this->search . '%';
        // dd('b');
        $bucketpoint = BarBucket::with('pointreward', 'pointredeem')->where('name', 'LIKE', $search)->paginate(10);
        //dd($bucketpoint);
        return view('livewire.super-admin.bar-settings.bar-bucket-reward-point', ['bucketpoints' => $bucketpoint]);
    }
}
