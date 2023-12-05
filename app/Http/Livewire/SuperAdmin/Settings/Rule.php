<?php

namespace App\Http\Livewire\SuperAdmin\Settings;

use App\Models\AdminUser;
use App\Models\Rule as RuleModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Rule extends Component
{
    use WithFileUploads;
    use WithPagination;
    private $rule;
    public $name, $image, $description, $editId, $search;
    public $edit_name, $edit_image, $edit_description;
    protected $paginationTheme = 'bootstrap';
    public function updateStatus($value, $id)
    {

        $rule = RuleModel::where('id', $id)->first();

        if ($value == true) {

            $rule->status = '1';
            $this->dispatchBrowserEvent('onstatus');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);

        } else {
            $rule->status = '0';
            $this->dispatchBrowserEvent('onstatus');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        $rule->save();
    }
    public function editId($id)
    {
        $editrule = RuleModel::where('id', $id)->first();
        $this->editId = $id;
        $this->edit_name = $editrule->name;
       // $this->edit_image = $editrule->image;
        $this->edit_description = $editrule->description;

    }
    public function editform()
    {
        $this->validate(['edit_name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:250',
            // 'edit_description'=>'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
            // 'edit_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'edit_name.required' => trans('rule.name_required'),
                'edit_name.regex' => trans('rule.name_regex'),
                'edit_name.max' => trans('rule.name_max'),
                //    'edit_description.required'=>trans('rule.description_required'),
                //    'edit_description.regex'=>trans('rule.description_regex'),
                //    'edit_description.max'=>trans('rule.description_max'),
                //    'edit_image.required'=>trans('rule.image_required'),
                //    'edit_image.mimes'=>trans('rule.image_mimes'),
                //    'edit_image.max'=>trans('rule.image_max'),
            ]);
        $adminuser = AdminUser::where('id', Auth::id())->first();
        $editrule = RuleModel::where('id', $this->editId)->first();
        $editrule->name = $this->edit_name;

        if ($this->edit_image) {
            $extension = $this->edit_image->getClientOriginalExtension();

            $image = $this->edit_image->storeAs('images/' . $adminuser->name . '_' . $adminuser->id . '/rule', $editrule->name . '_' . $editrule->id . '.' . $extension, 'public');
            $editrule->image = $image;
        }

        $editrule->description = $this->edit_description;
        $editrule->update();
        $this->reset('edit_name', 'edit_image', 'edit_description');
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Updated Successfully',
        ]);
    }
    public function submit()
    {
        $this->validate(['name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:250',
            // 'description'=> 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
            // 'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'name.required' => trans('rule.name_required'),
                'name.regex' => trans('rule.name_regex'),
                'name.max' => trans('rule.name_max'),
                //    'description.required'=>trans('rule.description_required'),
                //    'description.regex'=>trans('rule.description_regex'),
                //    'description.max'=>trans('rule.description_max'),
                //    'image.required'=>trans('rule.image_required'),
                //    'image.mimes'=>trans('rule.image_mimes'),
                //    'image.max'=>trans('rule.image_max'),
            ]);
        $adminuser = AdminUser::where('id', Auth::id())->first();
        $addrule = new RuleModel;
        $addrule->name = $this->name;
        $addrule->description = $this->description;
        $addrule->save();
        if ($this->image) {
            $saverule = RuleModel::where('id', $addrule->id)->first();
            $extension = $this->image->getClientOriginalExtension();

            $image = $this->image->storeAs('images/' . $adminuser->name . '_' . $adminuser->id . '/bar-rule', $saverule->name . '_' . $saverule->id . '.' . $extension, 'public');
            $saverule->image = $image;
            $saverule->save();
        }

        $this->reset('name', 'image', 'description');
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Saved Successfully',
        ]);
    }

    public function render()
    {
        $search = $this->search . '%';
        $this->rule = RuleModel::where('name', 'LIKE', $search)->paginate(10);
        return view('livewire.super-admin.settings.rule', ['rules' => $this->rule]);
    }
}
