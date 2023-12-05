<?php

namespace App\Http\Livewire\CountryAdmin\Product;

use App\Models\AdminUser;
use App\Models\Brand as BrandModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Brand extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $name, $image, $arabic_name;
    public $edit_image, $edit_name, $edit_arabic_name;
    public $editId, $search, $service, $brand;

    public function edit($id)
    {
        $edit = BrandModel::where('id', $id)->first();
        $this->editId = $id;
        $this->edit_name = $edit->name;

    }
    public function submit()
    {

        $this->validate([
            'edit_name' => 'required',
            // 'edit_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'edit_arabic_name' =>'max:50',
        ], ['edit_name.required' => trans('barcategory.name_required'),
            'edit_name.regex' => trans('barcategory.name_regex'),
            'edit_name.max' => trans('barcategory.name_max'),
            // 'edit_arabic_name.required'=>trans('barcategory.arabic_name_required'),
            // 'edit_arabic_name.max'=>trans('barcategory.arabic_name_max'),
            // 'edit_image.required' => trans('barcategory.image_required'),
            // 'edit_image.mimes' => trans('barcategory.image_mimes'),
            // 'edit_image.max' => trans('barcategory.image_max')
        ]);

        $adminuser = AdminUser::where('id', Auth::id())->first();
        $editservice = BrandModel::where('id', $this->editId)->first();

        $editservice->name = $this->edit_name;
        if($this->edit_image != NULL){
            $extension = $this->edit_image->getClientOriginalExtension();
            $image = $this->edit_image->storeAs('images/' . $adminuser->name . '_' . $adminuser->id . '/brand', $editservice->name . '_' . $editservice->id . '.' . $extension, 'public');
            $editservice->image = $image;
            $editservice->save();
        }

        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Updated Successfully',
        ]);

    }

    public function save()
    {

        $this->validate([
            'name' => 'required|max:50',
            // 'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'arabic_name' =>'required|max:50',
        ], ['name.required' => trans('barservice.name_required'),
           // 'name.regex' => trans('barservice.name_regex'),
            'name.max' => trans('barservice.name_max'),
            //'arabic_name.required'=>trans('barservice.arabic_name_required'),
            // 'arabic_name.max'=>trans('barservice.arabic_name_max'),
            // 'image.required' => trans('barservice.image_required'),
            // 'image.mimes' => trans('barservice.image_mimes'),
            // 'image.max' => trans('barservice.image_max')
        ]);
        $adminuser = AdminUser::where('id', Auth::id())->first();
        $content = new BrandModel;
        $content->name = $this->name;
        $content->save();
        if($this->image != NULL){
            $saveservice = BrandModel::where('id', $content->id)->first();
            $extension = $this->image->getClientOriginalExtension();
            $image = $this->image->storeAs('images/' . $adminuser->name . '_' . $adminuser->id . '/brand', $saveservice->name . '_' . $saveservice->id . '.' . $extension, 'public');
            $saveservice->image = $image;
            $saveservice->save();
        }
        $this->reset(['name', 'image']);

        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Saved Successfully',
        ]);

    }
    public function updateStatus($value, $id)
    {

        $orders = BrandModel::where('id', $id)->first();

        if ($value == true) {

            $orders->status = '1';
           // $this->dispatchBrowserEvent('onstatus');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        } else {
            $orders->status = '0';
           // $this->dispatchBrowserEvent('offstatus');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        $orders->save();
    }
    public function recommend($value, $id)
    {

        $recommend = BrandModel::where('id', $id)->first();

        if ($value == true) {

            $recommend->recommendeds = '1';
          //  $this->dispatchBrowserEvent('onstatus');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        } else {
            $recommend->recommendeds = '0';
          //  $this->dispatchBrowserEvent('offstatus');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        $recommend->save();
    }
    public function prefered($value, $id)
    {

        $prefer = BrandModel::where('id', $id)->first();

        if ($value == true) {

            $prefer->preferred = '1';
          //  $this->dispatchBrowserEvent('onstatus');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        } else {
            $prefer->preferred = '0';
         //   $this->dispatchBrowserEvent('offstatus');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        $prefer->save();
    }

    public function render()
    {
        // $brand = BrandModel::all();

        $search = '%' . $this->search . '%';
        $service = BrandModel::where('name', 'LIKE', $search)->Paginate(10);
        // dd($service);
        return view('livewire.country-admin.product.brand', ['brands' => $service]);

    }
}
