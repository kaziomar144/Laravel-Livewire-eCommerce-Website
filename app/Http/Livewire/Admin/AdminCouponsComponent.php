<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{

    public function deleteCoupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        $this->dispatchBrowserEvent('toastr',['type' => 'Error','message'=>'Coupon has been deleted successfully!']);
    }

    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupons-component',compact('coupons'))->layout('layouts.base');
    }
}
