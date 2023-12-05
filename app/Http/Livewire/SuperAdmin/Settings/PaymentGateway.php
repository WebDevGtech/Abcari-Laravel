<?php

namespace App\Http\Livewire\SuperAdmin\Settings;

use App\Models\PaymentGateway as PaymentGatewayModel;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentGateway extends Component
{
    use WithPagination;
    public $name, $editId, $displayname, $gatewayname, $delete, $search;
    public $edit_name, $edit_displayname, $edit_gatewayname;
    protected $listeners = ['deleteconfirmed' => 'delete'];
    protected $paginationTheme = 'bootstrap';
    public function updateStatus($value, $id)
    {

        $orders = PaymentGatewayModel::where('id', $id)->first();

        if ($value == true) {

            $orders->status = '1';
            $this->dispatchBrowserEvent('onstatus');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Updated Successfully',
            ]);
        } else {
            $orders->status = '0';
        }
        $orders->save();
        $this->dispatchBrowserEvent('offstatus');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Updated Successfully',
        ]);
    }

    public function saveup()
    {

        $this->validate([
            'name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50|unique:payment_gateways,gatewayname',
            'displayname' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
        ], ['name.required' => trans('superadminPaymentGateway.name_required'),
            'name.regex' => trans('superadminPaymentGateway.name_regex'),
            'name.max' => trans('superadminPaymentGateway.name_max'),
            'name.unique' => trans('Name is already exist'),
            'displayname.required' => trans('superadminPaymentGateway.displayname_required'),
            'displayname.regex' => trans('superadminPaymentGateway.displayname_regex'),
            'displayname.max' => trans('superadminPaymentGateway.displayname_max'),
        ]);
        $content = new PaymentGatewayModel;
        $content->gatewayname = $this->name;
        $content->displayname = $this->displayname;
        $content->save();

        $this->reset('name', 'displayname');
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Saved Successfully',
        ]);
    }

    public function edit($id)
    {

        $edit = PaymentGatewayModel::where('id', $id)->first();
        $this->editId = $id;
        $this->edit_name = $edit->gatewayname;
        $this->edit_displayname = $edit->displayname;

    }

    public function reseted()
    {
        $this->reset(['name', 'displayname']);

    }
    public function submit()
    {

        $this->validate([
            'edit_name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
            'edit_displayname' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',
        ], ['edit_name.required' => trans('superadminPaymentGateway.name_required'),
            'edit_name.regex' => trans('superadminPaymentGateway.name_regex'),
            'edit_name.max' => trans('superadminPaymentGateway.name_max'),
            'edit_displayname.required' => trans('superadminPaymentGateway.displayname_required'),
            'edit_displayname.regex' => trans('superadminPaymentGateway.displayname_regex'),
            'edit_displayname.max' => trans('superadminPaymentGateway.displayname_max'),
        ]);

        PaymentGatewayModel::where('id', $this->editId)->update([
            'gatewayname' => $this->edit_name,
            'displayname' => $this->edit_displayname,

        ]);

        $this->reset('name', 'displayname');
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Updated Successfully',
        ]);

    }

    public function deleteId($id)
    {

        $this->delete = $id;
        $this->dispatchBrowserEvent('some-confirmation');

    }
    public function delete()
    {
        $content = PaymentGatewayModel::where('id', $this->delete)->first();
        $content->delete();
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Deleted Successfully',
        ]);
    }
    public function render()
    {
        $search = $this->search . '%';
        $payment = PaymentGatewayModel::where('gatewayname', 'LIKE', $search)->paginate(10);
        return view('livewire.super-admin.settings.payment-gateway', ['payment' => $payment]);
    }
}
