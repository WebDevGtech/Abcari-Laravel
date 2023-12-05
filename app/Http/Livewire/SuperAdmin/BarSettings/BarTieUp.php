<?php

namespace App\Http\Livewire\SuperAdmin\BarSettings;

use App\Models\AdminUser;
use App\Models\BarRestaurant;
use App\Models\BarTieUp as BarTieUpModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BarTieUp extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $name, $image, $details, $arabic_name, $editId, $search;
    public $edit_name, $edit_image, $edit_details, $edit_arabic_name;
    protected $listeners = ['deleteconfirmed' => 'delete'];

    public function save()
    {

        $this->validate([
            'name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
            // 'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'arabic_name' => 'max:50',
            // 'details' =>'required|regex:/^[a-z A-Z]+$/u',
        ], ['name.required' => trans('bartieup.name_required'),
            'name.regex' => trans('bartieup.name_regex'),
            'name.max' => trans('bartieup.name_max'),
            //    'details.required'=>trans('bartieup.detatil_required'),
            //    'details.regex'=>trans('bartieup.detail_regex'),
            //    'details.max'=>trans('bartieup.detail_max'),
            'arabic_name.required' => trans('bartieup.arabic_name_required'),
            'arabic_name.max' => trans('bartieup.arabic_name_max'),
            //    'image.required'=>trans('bartieup.image_required'),
            //    'image.mimes'=>trans('bartieup.image_mimes'),
            //    'image.max'=>trans('bartieup.image_max'),
        ]);
        $adminuser = AdminUser::where('id', Auth::id())->first();
        $content = new BarTieUpModel;
        $content->name = $this->name;
        $content->slug = $this->name;
        $content->details = $this->details;
        $content->arabic_name = $this->arabic_name;
        $content->save();

        //dd($extension);
        if ($this->image != null) {
            $savetieup = BarTieUpModel::where('id', $content->id)->first();
            $extension = $this->image->getClientOriginalExtension();
            $image = $this->image->storeAs('images/' . $adminuser->name . '_' . $adminuser->id . '/bar-tie-up', $savetieup->name . '_' . $savetieup->id . '.' . $extension, 'public');
            $savetieup->image = $image;
            $savetieup->save();
        }

        $this->reset(['name', 'details', 'image', 'arabic_name']);
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Saved Successfully',
        ]);
    }

    public function edit($id)
    {

        $edit = BarTieUpModel::where('id', $id)->first();
        $this->editId = $id;
        $this->edit_name = $edit->name;
        $this->edit_arabic_name = $edit->arabic_name;
        $this->edit_details = $edit->details;
        // $this->edit_image=$edit->image;
    }

    public function submit()
    {

        $this->validate([
            'edit_name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
            //   'edit_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //   'edit_arabic_name' =>'required|max:50',
            //   'edit_details' =>'required|regex:/^[a-z A-Z]+$/u',
        ], ['edit_name.required' => trans('bartieup.name_required'),
            'edit_name.regex' => trans('bartieup.name_regex'),
            'edit_name.max' => trans('bartieup.name_max'),
            //  'edit_details.required'=>trans('bartieup.detatil_required'),
            //  'edit_details.regex'=>trans('bartieup.detail_regex'),
            //  'edit_details.max'=>trans('bartieup.detail_max'),
            //  'edit_arabic_name.required'=>trans('bartieup.arabic_name_required'),
            //  'edit_arabic_name.max'=>trans('bartieup.arabic_name_max'),
            //  'edit_image.required'=>trans('bartieup.image_required'),
            //  'edit_image.mimes'=>trans('bartieup.image_mimes'),
            //  'edit_image.max'=>trans('bartieup.image_max'),
        ]);
        $adminuser = AdminUser::where('id', Auth::id())->first();
        $edittieup = BarTieUpModel::where('id', $this->editId)->first();
        $edittieup->name = $this->edit_name;
        $edittieup->slug = $this->edit_name;
        $edittieup->details = $this->edit_details;
        $edittieup->arabic_name = $this->edit_arabic_name;
        if ($this->edit_image != null) {
            $extension = $this->edit_image->getClientOriginalExtension();
            $image = $this->edit_image->storeAs('images/' . $adminuser->name . '_' . $adminuser->id . '/bar-tie-up', $edittieup->name . '_' . $edittieup->id . '.' . $extension, 'public');
            $edittieup->image = $image;
        }
        $edittieup->update();

        // $this->reset(['name','details','image','arabic_name']);
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Updated Successfully',
        ]);

    }

    public function updateStatus($value, $id)
    {

        $orders = BarTieUpModel::where('id', $id)->first();

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

        if ($edit = BarRestaurant::where('bar_tie_up_id', $this->delete)->first()) {
            $this->dispatchBrowserEvent('error');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'info',
                'message' => 'selected in  ' . $edit->name,
            ]);
        } else {

            $content = BarTieUpModel::where('id', $this->delete)->first();
            $content->delete();
            $this->dispatchBrowserEvent('modalClose');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Deleted Successfully',
            ]);

        }
    }
    public function render()
    {
        $search = $this->search . '%';
        $tieup = BarTieUpModel::where('name', 'LIKE', $search)->orWhere('details', 'LIKE', $search)->paginate(10);
        return view('livewire.super-admin.bar-settings.bar-tie-up', ['tieup' => $tieup]);
    }
}
