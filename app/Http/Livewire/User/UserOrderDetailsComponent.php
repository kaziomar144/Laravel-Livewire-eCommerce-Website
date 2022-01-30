<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order = Order::where('user_id',Auth::user()->id)->whereId($this->order_id)->first();
        return view('livewire.user.user-order-details-component',compact('order'))->layout('layouts.base');
    }
}
