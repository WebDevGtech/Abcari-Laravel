<?php

namespace App\Http\Livewire\BarAdmin\Product;

use App\Models\BarRestaurant;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\TaxType;
use App\Models\VariationType;
use Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ViewProduct extends Component

{
    use WithPagination;
    use WithFileUploads;
    public $selectedEditProductId, $editId;
    public $variation_type, $variant_value, $price, $name, $show_image, $image, $category, $tax, $arabic_name, $happy_hour, $show_thumbnail_image, $is_happy_hour, $value, $thumbnail_image, $product_variation_id;

    public $view_variation_type, $view_variant_value, $view_price, $view_name, $view_image, $view_category, $view_tax, $view_arabic_name, $view_happy_hour, $view_thumbnail_image, $view_is_happy_hour, $view_value;
    public $search;
    public $inputs = [];
    public $input = [];
    public $i = 0;
    public $updateMode = false;
    public $view_variation;
    public function updateStatus($value, $id)
    {

        $viewproduct = Product::where('id', $id)->first();

        if ($value == true) {

            $viewproduct->status = '1';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        } else {
            $viewproduct->status = '0';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        $viewproduct->update();
    }
    public function updatePreferred($value, $id)
    {

        $viewproduct = Product::where('id', $id)->first();

        if ($value == true) {

            $viewproduct->preferred = '1';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        } else {
            $viewproduct->preferred = '0';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        $viewproduct->update();
    }
    public function updateRecommended($value, $id)
    {

        $viewproduct = Product::where('id', $id)->first();

        if ($value == true) {

            $viewproduct->recommendeds = '1';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        } else {
            $viewproduct->recommendeds = '0';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        $viewproduct->update();
    }
    public function addDiv($increment)
    {
        $this->i = $increment+1;
        $this->variation_type[$increment] = '';
        $this->variant_value[$increment] = '';
        $this->product_variation_id[$increment] = 0;
        $this->price[$increment] = '';
        $this->is_happy_hour[$increment] = '';
        array_push($this->inputs, $increment+1);
    }
    public function remove($decrement)
    {
        if($this->product_variation_id[$decrement] != 0){
            $test = ProductVariation::where('id',$this->product_variation_id[$decrement])->first();
            $test->delete();
        }
        $this->i = $decrement;
        unset($this->inputs[$decrement]);
        unset($this->product_variation_id[$decrement]);
        unset($this->variation_type[$decrement]);
        unset($this->value[$decrement]);
        unset($this->price[$decrement]);
        unset($this->is_happy_hour[$decrement]);
    }
    public function editForm($id)
    {
        $this->happy_hour = NULL;
        $this->selectedEditProductId = $id;

        $edit = Product::with('productvariations')->where('id', $id)->first();
        $this->editId = $id;
        // $image=$this->image->store('photos','public');
        $this->name = $edit->name;
        $this->arabic_name = $edit->arabic_name;

        $this->show_thumbnail_image = $edit->thumbnail_image;
        $this->show_image = $edit->image;
        $this->category = $edit->category_id;

        //$this->tax = $edit->tax_id;
        $this->happy_hour = $edit->happy_hour;
        if($this->happy_hour == 0){
            $this->happy_hour = NULL;
        }
        $this->i = 0;
        $this->inputs = [];
        $this->value = NULL;
        $this->variation_type = NULL;
        $this->product_variation_id = NULL;
        $this->price = NULL;
        $this->is_happy_hour = NULL;
        if (count($edit->productvariations) > 0) {
            foreach ($edit->productvariations as $key => $productvariation) {
                $this->i++;
                $this->value[$key] = $productvariation->value;
                $this->product_variation_id[$key] = $productvariation->id;
                $this->variant_value[$key] = $productvariation->value;
                $this->variation_type[$key] = $productvariation->variation_type_id;
                $this->price[$key] = $productvariation->price;
                $this->is_happy_hour[$key] = $productvariation->is_happyhour_price;
                array_push($this->inputs, $key);
            }
        }
    }
    public function viewId($id)
    {
        $edit = Product::with('productvariations', 'tax')->where('id', $id)->first();
        $this->view_name = $edit->name;
        $this->view_arabic_name = $edit->arabic_name;

        $this->view_image = $edit->image;
        $this->view_category = $edit->category->name;
        $this->view_happy_hour = $edit->happy_hour;
        $this->view_variation=$edit->productvariations;
// dd($this->view_variation);
        if (count($edit->productvariations) > 0) {

            foreach ($edit->productvariations as $key => $productvariation) {

                $this->view_is_happy_hour[$key] = $productvariation->is_happyhour_price;
                $this->view_variant_value[$key] = $productvariation->value;
                $this->view_variation_type[$key] = $productvariation->variation_type_id;
                $this->view_price[$key] = $productvariation->price;
            }
        }
    }
    public function edit()
    {
        if($this->happy_hour == false){

        }else{

        }

        $this->validate(
            [
                'name' => 'required|regex:/^[a-z A-Z]+$/u|max:50',
                // 'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // 'thumbnail_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'arabic_name' => '',
                'category' => 'required',
                // 'variation_type.0'=>'required',
                // 'price.0'=>'required|max:10',
                // 'value.0'=>'required|max:10',
                // 'variation_type.*'=>'required',
                // 'price.*'=>'required|max:10',
                // 'value.*'=>'required|max:10',
                // 'is_happy_hour.0'=>'required|max:10',
                // 'is_happy_hour.*'=>'required|max:10',
            ],
            [
                'name.required' => trans('viewproduct.name_required'),
                'name.regex' => trans('viewproduct.name_regex'),
                'name.max' => trans('viewproduct.name_max'),
                // 'image.required'=>trans('viewproduct.image_required'),
                // 'image.mimes'=>trans('viewproduct.image_mimes'),
                // 'image.max'=>trans('viewproduct.image_max'),
                // 'thumbnail_image.required'=>trans('viewproduct.thumbnail_image_required'),
                // 'thumbnail_image.mimes'=>trans('viewproduct.thumbnail_image_mimes'),
                // 'thumbnail_image.max'=>trans('viewproduct.thumbnail_image_max'),
                'arabic_name.required' => trans('viewproduct.arabic_name_required'),
                'arabic_name.max' => trans('viewproduct.arabic_name_max'),

                'category.required' => trans('viewproduct.category_required'),

                // 'variation_type.0.required'=>trans('viewproduct.variation_type_required'),
                // 'variation_type.*.required'=>trans('viewproduct.variation_type_required'),
                // 'price.0.required'=>trans('viewproduct.price_required'),
                // 'price.0.max'=>trans('viewproduct.price_max'),
                // 'price.*.required'=>trans('viewproduct.price_required'),
                // 'price.*.max'=>trans('viewproduct.price_max'),
                // 'value.0.required'=>trans('viewproduct.value_required'),
                // 'value.0.max'=>trans('viewproduct.value_max'),
                // 'value.*.required'=>trans('viewproduct.value_required'),
                // 'value.*.max'=>trans('viewproduct.value_max'),
                // 'is_happy_hour.0.required'=>trans('viewproduct.is_happy_hour_required'),
                // 'is_happy_hour.0.max'=>trans('viewproduct.is_happy_hour_max'),
                // 'is_happy_hour.*.required'=>trans('viewproduct.is_happy_hour_required'),
                // 'is_happy_hour.*.max'=>trans('viewproduct.is_happy_hour_max'),

            ]
        );
        $barRestaurant = BarRestaurant::where('user_id', Auth::id())->first();
        $edit = product::with('productvariations')->where('id', $this->selectedEditProductId)->first();
        $edit->name = $this->name;



        if ($this->happy_hour == null) {
            $edit->happy_hour = '0';
        } else {
            $edit->happy_hour = '1';
        }


        if ($this->image != null) {
            $add_image = product::where('id', $edit->id)->first();
            $extension = $this->image->getClientOriginalExtension();
            $image = $this->image->storeAs('images/' . $barRestaurant->name . '_' . $barRestaurant->id . '/products', $edit->name . '_' . $edit->id . '.' . $extension, 'public');
            $add_image->image = $image;
            $add_image->save();
        }
        if ($this->thumbnail_image != null) {
            $add_image = product::where('id', $edit->id)->first();
            $extension = $this->thumbnail_image->getClientOriginalExtension();
            $thumnailimage = $this->thumbnail_image->storeAs('images/thumbnail/' . $barRestaurant->name . '_' . $barRestaurant->id . '/products', $edit->name . '_' . $edit->id . '.' . $extension, 'public');
            $add_image->thumbnail_image = $thumnailimage;
            $add_image->save();
        }

        $edit->category_id = $this->category;
        $edit->arabic_name = $this->arabic_name;

        $edit->update();
        foreach ($this->value as $key => $value) {


                $variation_sql = ProductVariation::where([['id',$this->product_variation_id[$key]],['product_id',$edit->id]])->first();

                if($variation_sql == NULL){
                    $variation_sql = new ProductVariation;
                    $variation_sql->product_id = $edit->id;
                    $variation_sql->value = $this->value[$key];
                    $variation_sql->variation_type_id = $this->variation_type[$key];
                    $variation_sql->price = $this->price[$key];
                    if ($this->happy_hour == 1) {
                        $this->validate(['is_happy_hour.0' => 'required'], [
                            'is_happy_hour.0.required' => trans('Please enter the happy hour price'),
                        ]);
                        $variation_sql->is_happyhour_price = $this->is_happy_hour[$key];
                    }else{
                        $variation_sql->is_happyhour_price = NULL;
                    }
                }
                else{
                    $variation_sql->product_id = $edit->id;
                    $variation_sql->value = $this->value[$key];
                    $variation_sql->variation_type_id = $this->variation_type[$key];
                    $variation_sql->price = $this->price[$key];
                    if ($this->happy_hour == 1) {
                        $this->validate(['is_happy_hour.0' => 'required'], [
                            'is_happy_hour.0.required' => trans('Please enter the happy hour price'),
                        ]);
                        $variation_sql->is_happyhour_price = $this->is_happy_hour[$key];
                    }else{
                        $variation_sql->is_happyhour_price = NULL;
                    }
                }
                $variation_sql->save();
        }
        $this->value = NULL;
        $this->variation_type = NULL;
        $this->price = NULL;
        $this->is_happy_hour = NULL;
        $this->product_variation_id = NULL;
        $this->inputs = [];

        $this->reset('name', 'image', 'category', 'arabic_name', 'tax', 'value', 'variation_type', 'price');
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Updated Successfully",
        ]);
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $variationtype = VariationType::all();
        $tax = TaxType::all();

        $category = Category::all();
        $barRestaurant = BarRestaurant::all();

        $product = Product::with('subcategory', 'productvariations', 'tax', 'category')->where([['admin_id', Auth::id()], ['name', 'LIKE', $search]])->paginate(15);

        return view('livewire.bar-admin.product.view-product', ['products' => $product, 'variationtypes' => $variationtype, 'categories' => $category, 'barRestaurants' => $barRestaurant]);
    }
}
