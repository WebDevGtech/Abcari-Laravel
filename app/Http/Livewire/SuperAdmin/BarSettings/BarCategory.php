<?php

namespace App\Http\Livewire\SuperAdmin\BarSettings;

use App\Models\AdminUser;
use App\Models\BarCategory as BarCategoryModel;
use App\Models\BarRestaurant;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BarCategory extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name, $image, $arabic_name, $search;

    public $edit_name, $edit_image, $edit_arabic_name;

    public $editId, $delete;

    protected $listeners = ['deleteconfirmed' => 'delete'];

    public function edit($id)
    {
        $edit = BarCategoryModel::where('id', $id)->first();
        $this->editId = $id;
        $this->edit_name = $edit->name;
        $this->edit_arabic_name = $edit->arabic_name;
        //   $this->edit_image=$edit->image;
    }
    public function submit()
    {

        $this->validate([
            'edit_name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
            // 'edit_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'edit_arabic_name' =>'max:50',
        ], ['edit_name.required' => trans('barcategory.name_required'),
            'edit_name.regex' => trans('barcategory.name_regex'),
            'edit_name.max' => trans('barcategory.name_max'),
            //    'edit_arabic_name.required'=>trans('barcategory.arabic_name_required'),
            //    'edit_arabic_name.max'=>trans('barcategory.arabic_name_max'),
            //    'edit_image.required'=>trans('barcategory.image_required'),
            //    'edit_image.mimes'=>trans('barcategory.image_mimes'),
            //    'edit_image.max'=>trans('barcategory.image_max'),
        ]);

        $adminuser = AdminUser::where('id', Auth::id())->first();
        $editcategory = BarCategoryModel::where('id', $this->editId)->first();

        $editcategory->name = $this->edit_name;
        $editcategory->arabic_name = $this->edit_arabic_name;
        if ($this->edit_image != null) {
            $extension = $this->edit_image->getClientOriginalExtension();

            $image = $this->edit_image->storeAs('images/' . $adminuser->name . '_' . $adminuser->id . '/bar-category', $editcategory->name . '_' . $editcategory->id . '.' . $extension, 'public');
            $editcategory->image = $image;
        }
        $editcategory->update();

        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Updated Successfully',
        ]);

    }

    public function reseted()
    {
        $this->reset(['name', 'image']);

    }

//  public function updated($feild){
//         $this->validateOnly($feild,[
//           'image'=>'required',
//         ]);
//  }

    public function save()
    {
        $this->validate([
            'name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u',
            //   'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //   'arabic_name' =>'required|max:50',
        ], ['name.required' => trans('barcategory.name_required'),
            'name.regex' => trans('barcategory.name_regex'),
            'name.max' => trans('barcategory.name_max'),
            //  'arabic_name.required'=>trans('barcategory.arabic_name_required'),
            //  'arabic_name.max'=>trans('barcategory.arabic_name_max'),
            //  'image.required'=>trans('barbucket.image_required'),
            //  'image.mimes'=>trans('barbucket.image_mimes'),
            //  'image.max'=>trans('barbucket.image_max'),
        ]);
        $adminuser = AdminUser::where('id', Auth::id())->first();

        $content = new BarCategoryModel;
        $content->name = $this->name;
        $content->arabic_name = $this->arabic_name;
        $content->save();

        if ($this->image != null) {
            $savecategory = BarCategoryModel::where('id', $content->id)->first();
            $extension = $this->image->getClientOriginalExtension();

            $image = $this->image->storeAs('images/' . $adminuser->name . '_' . $adminuser->id . '/bar-category', $savecategory->name . '_' . $savecategory->id . '.' . $extension, 'public');
            $savecategory->image = $image;
            $savecategory->save();
        }

        $this->reset('name', 'image', 'arabic_name');
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Saved Successfully',
        ]);

    }

    public function updateStatus($value, $id)
    {

        $orders = BarCategoryModel::where('id', $id)->first();

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
        if ($edit = BarRestaurant::where('bar_category_id', $this->delete)->first()) {
            $this->dispatchBrowserEvent('error');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'info',
                'message' => 'selected in ' . $edit->name,
            ]);
        } else {
            $content = BarCategoryModel::where('id', $this->delete)->first();
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
        $category = BarCategoryModel::where('name', 'LIKE', $search)->paginate(10);
        return view('livewire.super-admin.bar-settings.bar-category', ['category' => $category]);
    }
}
