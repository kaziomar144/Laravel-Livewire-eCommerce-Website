<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserChangePasswordComponent extends Component
{

    public $current_password;
    public $new_password;
    public $confirm_password;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
            'confirm_password' => 'required|min:8|same:new_password',
        ]);
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
            'confirm_password' => 'required|min:8|same:new_password',
        ]);

        if(Hash::check($this->current_password,Auth::user()->password)){
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->new_password);
            $user->save();
            $this->dispatchBrowserEvent('toastr',['type' => 'Success','message' => 'Password has been changed successfully!']);
            $this->emit('changePassword');
        }else{
            $this->dispatchBrowserEvent('toastr',['type' => 'Error','message' => 'Password does not match!']);
        }
        
    }


    public function messages()
    {
        return [
            'confirm_password.same'=>'New Password and Confirm Password does not match',
        ];
    }


    public function render()
    {
        return view('livewire.user.user-change-password-component')->layout('layouts.base');
    }
}
