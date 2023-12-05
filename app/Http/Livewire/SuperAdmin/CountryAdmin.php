<?php

namespace App\Http\Livewire\SuperAdmin;

use App\Models\AdminUser;
use App\Models\Countries;
use Livewire\Component;
use Livewire\WithPagination;

class CountryAdmin extends Component
{
    use WithPagination;
    public $i, $value, $search;
    public $usergroupid = 2;

    public $delete, $name, $email, $countryid;
    private $user;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['deleteconfirmed' => 'delete'];

    public function updateStatus($value)
    {

        if ($value == true) {

            $this->i = 1;
            $this->dispatchBrowserEvent('true');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Changed Bar Admin  View Successfully',
            ]);

        } else {
            $this->i = 0;
            $this->dispatchBrowserEvent('false');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Changed Country Admin View Successfully',
            ]);
        }

    }

    public function deleteId($id)
    {

        $this->delete = $id;

        $this->dispatchBrowserEvent('some-confirmation');

    }
    public function delete()
    {

        $user = AdminUser::where('id', $this->delete)->first();
        $user->delete();
        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Deleted Successfully',
        ]);

    }
    public function updateChange($value, $id)
    {

        $orders = AdminUser::where('id', $id)->first();

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

    public function edit($id)
    {

        $edit = AdminUser::where('id', $id)->first();
        $this->editId = $id;
        $this->name = $edit->name;
        $this->email = $edit->email;
        $this->countryid = $edit->country_id;

    }

    public function reseted()
    {
        $this->reset(['name', 'email', 'countryid']);
    }

    public function submit()
    {
        //dd($this->email);

        $this->validate(['name' => 'required|regex:/(^([a-z A-z]+)(\d+)?$)/u|max:50',

            'email' => 'required|email',
            'countryid' => 'required'],
            ['name.required' => trans('add-admin.name_required'),
                'name.regex' => trans('add-admin.name_regex'),
                'name.max' => trans('add-admin.name_max'),

                'email.required' => trans('add-admin.email_required'),
                'email.email' => trans('add-admin.email_email'),
                'countryid.required' => trans('add-admin.country_required')]);
        //  if( $edit=AdminUser::where('country_id',$this->countryid)->first())
        //  {
        //   $this->dispatchBrowserEvent('error');
        //   $this->dispatchBrowserEvent('alert',[
        //     'type'=>'info',
        //     'message'=>'used by '.$edit->name
        //   ]);

        //  }
        //  else{

        $editcountry = AdminUser::where('id', $this->editId)->update([
            'name' => $this->name,
            'email' => $this->email,
            'country_id' => $this->countryid,

        ]);

        $this->dispatchBrowserEvent('modalClose');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Updated Successfully',
        ]);

        // }
    }
    public function render()
    {

        if ($this->search == '') {
            $this->user = AdminUser::Where('user_group_id', $this->usergroupid)->paginate(10);
        } else {
            $search = $this->search . '%';
            $this->user = AdminUser::Where([['user_group_id', $this->usergroupid], ['name', 'LIKE', $search]])->paginate(10);

        }
        $country = Countries::all();
        return view('livewire.super-admin.country-admin', ['users' => $this->user, 'country' => $country]);


    }
}
