<?php

namespace App\Http\Livewire\CountryAdmin\Settings;

use App\Models\Countries;
use App\Models\TaxType as TaxTypeModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\BarService;
use Livewire\WithPagination;

class TaxType extends Component
{
    use WithPagination;
    private $country, $taxtype, $bar_services;

    public $name, $country_id, $taxrate,$service_id,$edit_service_id;
    public $edit_name, $edit_country_id, $edit_taxrate;
    public $delete_tax_name, $deleteId, $search;
    public function updateStatus($value, $id)
    {

        $addtax = TaxTypeModel::where('id', $id)->first();

        if ($value == true) {
            $addtax->status = '1';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);

        } else {
            $addtax->status = '0';
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        }
        $addtax->update();

    }
    public function submit()
    {
        $this->validate(['name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u',

            'taxrate' => 'required|regex:/[0-9]+(\.[0-9][0-9]?)?/'],
            [
                'name.required' => trans('taxtype.taxname_required'),
                'name.regex' => trans('taxtype.taxname_regex'),
                'name.max' => trans('taxtype.taxname_max'),

                'taxrate.required' => trans('taxtype.taxrate_required'),
                'taxrate.regex' => trans('taxtype.taxrate_regex'),
            ]);
        // dd(Auth::user()->country_id);
        $addtax = new TaxTypeModel;
        $addtax->name = $this->name;
        $addtax->country_id = Auth::user()->country_id;
        $addtax->tax_rate = $this->taxrate;
        $addtax->service_id = $this->service_id;
        $addtax->save();
        $this->reset('name', 'country_id', 'taxrate');
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Updated Successfully',
        ]);
    }
    public function editId($id)
    {
        $edit = TaxTypeModel::where('id', $id)->first();
        $this->editId = $id;
        $this->edit_name = $edit->name;
        $this->edit_country_id = $edit->country_id;
        $this->edit_taxrate = $edit->tax_rate;
        $this->edit_service_id = $edit->service_id;
    }
    public function editForm()
    {
        $this->validate(['edit_name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u',
            'edit_country_id' => 'required',
            'edit_taxrate' => 'required|regex:/[0-9]+(\.[0-9][0-9]?)?/'],
            [
                'edit_name.required' => trans('taxtype.taxname_required'),
                'edit_name.regex' => trans('taxtype.taxname_regex'),
                'edit_name.max' => trans('taxtype.taxname_max'),
                'edit_country_id.required' => trans('taxtype.countryname_required'),
                'edit_taxrate.required' => trans('taxtype.taxrate_required'),
                'edit_taxrate.regex' => trans('taxtype.taxrate_regex'),
            ]);
        $edittax = TaxTypeModel::where('id', $this->editId)->first();
        $edittax->name = $this->edit_name;
        $edittax->country_id = $this->edit_country_id;
        $edittax->tax_rate = $this->edit_taxrate;
        $edittax->service_id = $this->edit_service_id;
        $edittax->update();
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Updated Successfully',
        ]);
    }
    public function deleteId($id)
    {
        $delete = TaxTypeModel::where('id', $id)->first();
        $this->deleteId = $id;
        $this->delete_tax_name = $delete->name;
    }
    public function deleteForm()
    {
        $delete = TaxTypeModel::where('id', $this->deleteId)->delete();
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Tax Deleted",
        ]);
    }
    public function render()
    {
        $this->country = Countries::all();
        $this->bar_services = BarService::all();
        $search = $this->search . '%';
        $this->taxtype = TaxTypeModel::with('country')->where('name', 'LIKE', $search)->paginate(10);
        return view('livewire.country-admin.settings.tax-type', ['countries' => $this->country, 'taxtypes' => $this->taxtype, 'bar_services'=>$this->bar_services]);
    }
}
