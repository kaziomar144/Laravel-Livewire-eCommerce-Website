<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\Setting;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $phone;
    public $email;
    public $comment;

    public function updated($field)
    {
        $this->validateOnly($field,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'comment' => 'required'
        ]);
    }

    public function sendMessage()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'comment' => 'required'
        ]);

        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->comment = $this->comment;
        $contact->save();
        $this->dispatchBrowserEvent('toastr',['type' => 'Success','message' => 'Your message has been sent successfully!']);
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->comment = '';
    }

    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.contact-component',compact('setting'))->layout('layouts.base');
    }
}
