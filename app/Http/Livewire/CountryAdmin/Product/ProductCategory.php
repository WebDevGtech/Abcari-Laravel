<?php

namespace App\Http\Livewire\CountryAdmin\Product;

use App\Models\AdminUser;
use App\Models\BarService;
use App\Models\GeneralBanner;
use App\Models\ProductCategory as ProductCategoryModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductCategory extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $name, $image, $arabic_name, $editId, $delete, $search, $liquor, $service_id, $preferred;
    public $edit_name, $edit_image, $edit_arabic_name, $edit_service_id, $edit_preferred, $edit_liquor;
    protected $listeners = ['deleteconfirmed' => 'delete'];

    public function edit($id)
    {

        $edit = ProductCategoryModel::where('id', $id)->first();
        $this->editId = $id;
        $this->edit_name = $edit->name;
        // $this->edit_image = $edit->image;
        $this->edit_arabic_name = $edit->arabic_name;
        $this->edit_service_id = $edit->service_id;
        if ($edit->is_liquor == '1') {

            $this->edit_liquor = true;

        } else {
            $this->edit_liquor = false;

        }
        if ($edit->is_preferred == '1') {
            $this->edit_preferred = true;

        } else {
            $this->edit_preferred = false;

        }

    }

    public function saveup()
    {
        $this->validate(['name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:50',
            // 'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'service_id' => 'required',
            'arabic_name' => 'max:50'],
            ['name.required' => trans('productcategory.name_required'),
                'name.regex' => trans('productcategory.name_regex'),
                'name.max' => trans('productcategory.name_max'),
                'service_id.required' => trans('productcategory.service_id_required'),
                'arabic_name.required' => trans('productcategory.arabicname_required'),
                'arabic_name.max' => trans('productcategory.arabicname_max'),
                // 'image.required' => trans('productcategory.image_required'),
                // 'image.mimes' => trans('productcategory.image_mimes'),
                // 'image.max' => trans('productcategory.image_max')
            ]);
        $adminuser = AdminUser::where('id', Auth::id())->first();
        $content = new ProductCategoryModel;
        $content->name = $this->name;
        $content->arabic_name = $this->arabic_name;
        $content->service_id = $this->service_id;
        if ($this->liquor == true) {
            $content->is_liquor = '1';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        } else {
            $content->is_liquor = '0';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        if ($this->preferred == true) {
            $content->is_preferred = '1';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        } else {
            $content->is_preferred = '0';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        $content->save();

        if($this->image != NULL){
            $product = ProductCategoryModel::where('id', $content->id)->first();
            $extension = $this->image->getClientOriginalExtension();
            $image = $this->image->storeAs('images/' . $adminuser->name . '_' . $adminuser->id . '/product-category', $product->name . '_' . $product->id . '.' . $extension, 'public');
            $product->image = $image;
            $product->save();
        }
        $this->reset('name', 'image', 'arabic_name', 'service_id', 'liquor', 'preferred');
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Added Successfully',
        ]);

    }

    public function reseted()
    {
        $this->reset(['name', 'image', 'arabic_name']);

    }
    public function submit()
    {

        // dd($this);
        $this->validate(['edit_name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
            // 'edit_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'edit_service_id' => 'required',
            // 'edit_arabic_name' => 'max:50'
        ],
            [
                'edit_name.required' => trans('barbucket.name_required'),
                'edit_name.regex' => trans('barbucket.name_regex'),
                'edit_name.max' => trans('barbucket.name_max'),
                'edit_service_id.required' => trans('productcategory.service_id_required'),
                // 'edit_arabic_name.required' => trans('barbucket.arabicname_required'),
                // 'edit_arabic_name.max' => trans('barbucket.arabicname_max'),
                // 'edit_image.required' => trans('barbucket.image_required'),
                // 'edit_image.mimes' => trans('barbucket.image_mimes'),
                // 'edit_image.max' => trans('barbucket.image_max')
            ]);
        $adminuser = AdminUser::where('id', Auth::id())->first();
        $editcategory = ProductCategoryModel::where('id', $this->editId)->first();

        $editcategory->name = $this->edit_name;
        $editcategory->arabic_name = $this->edit_arabic_name;
        // dd($this->edit_image);
        if($this->edit_image != NULL){
            $extension = $this->edit_image->getClientOriginalExtension();
            $image = $this->edit_image->storeAs('images/' . $adminuser->name . '_' . $adminuser->id . '/product-category', $editcategory->name . '_' . $editcategory->id . '.' . $extension, 'public');
            $editcategory->image = $image;
        }
        $editcategory->service_id = $this->edit_service_id;
        if ($this->edit_liquor == true) {
            $editcategory->is_liquor = '1';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        } else {
            $editcategory->is_liquor = '0';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        if ($this->edit_preferred == true) {
            $editcategory->is_preferred = '1';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        } else {
            $editcategory->is_preferred = '0';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        $editcategory->update();

        $this->reset(['edit_name', 'edit_image', 'edit_arabic_name', 'edit_service_id', 'edit_liquor', 'edit_preferred']);

        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Updated Successfully',
        ]);

    }

    public function updateStatus($value, $id)
    {

        $orders = ProductCategoryModel::where('id', $id)->first();

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
    public function updateLiquor($value, $id)
    {

        $liquor = ProductCategoryModel::where('id', $id)->first();

        if ($value == true) {

            $liquor->is_liquor = '1';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);

        } else {
            $liquor->is_liquor = '0';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);

        }
        $liquor->save();
    }
    public function updatePreferred($value, $id)
    {

        $preferred = ProductCategoryModel::where('id', $id)->first();

        if ($value == true) {

            $preferred->is_preferred = '1';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);

        } else {
            $preferred->is_preferred = '0';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);

        }
        $preferred->save();
    }
    public function deleteId($id)
    {

        $this->delete = $id;
        $this->dispatchBrowserEvent('some-confirmation');

    }
    public function delete()
    {

        $list = ProductCategoryModel::with('banner')->where('id', $this->delete)->first();
        $categorycount = count($list->banner);
        if ($categorycount > 0) {
            $deletebanner = GeneralBanner::where('category_id', $list->id)->delete();
        }
        $list->delete();
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Deleted Successfully',
        ]);

    }
    public function render()
    {
        $search = $this->search . '%';
        $category = ProductCategoryModel::where('name', 'LIKE', $search)->paginate(10);
        $service = BarService::All();
        return view('livewire.country-admin.product.product-category', ['category' => $category, 'services' => $service]);
    }
}
