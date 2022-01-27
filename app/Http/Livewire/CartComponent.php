<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\Sale;
use Carbon\Carbon;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;
class CartComponent extends Component
{
    public $haveCouponCode;
    public $couponCode;

    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
         $this->emitTo('cart-count-component','refreshComponent');
    }

    public function destroy($rowId) 
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        $this->dispatchBrowserEvent('toastr',['type' => 'Error','message'=>'Item has been removed']);
        session()->flash('msg','Item has been removed');
        session()->flash('msg-type','success');
        // return redirect()->route('product.cart');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
        $this->dispatchBrowserEvent('toastr',['type' => 'Error','message'=>'All item has been removed']);
        session()->flash('msg','All item has been removed');
        session()->flash('msg-type','success');
    }

    //save for later function
    public function switchToSaveForLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        $this->dispatchBrowserEvent('toastr',['type' => 'Success','message'=>'Item has been saved for later']);

    }

    public function moveToCart($rowId)
    {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        $this->dispatchBrowserEvent('toastr',['type' => 'Success','message'=>'Item has been moved to cart']);
    }

    public function deleteFromSaveForLater($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
        $this->dispatchBrowserEvent('toastr',['type' => 'Error','message'=>'Item has been removed from save for later']);
    }

    public function applyCouponCode()
    {
        $coupon = Coupon::whereCode($this->couponCode)->where('expiry_date','>=',Carbon::today())->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
        if(!$coupon){
            $this->dispatchBrowserEvent('toastr',['type' => 'Error','message'=>'Coupon code is invalid!']);
            return;
        }
        session()->put('coupon',[
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value,
        ]);
        $this->dispatchBrowserEvent('toastr',['type' => 'Success','message'=>'Coupon code applied!']);
    }

    public function calculateDiscounts(){
        if(session()->has('coupon')){
            if(session()->get('coupon')['type'] == 'fixed'){
                $this->discount = session()->get('coupon')['value'];
            }else{
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value']) / 100;
            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
        $this->dispatchBrowserEvent('toastr',['type' => 'Error','message' => 'Coupon has been removed!']);
    }

    public function checkout()
    {
        if(Auth::check()){
            return redirect()->route('checkout');
        }else{
            return redirect()->route('login');
        }
    }


    public function setAmountForCheckout()
    {
        if(session()->has('coupon')){
            session()->put('checkout',[
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'tax' => $this->taxAfterDiscount,
                'total' => $this->totalAfterDiscount
            ]);
        }
        else{
            session()->put('checkout',[
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total()
            ]);
        }
    }



    public function render()
    {
        if(session()->has('coupon')){
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']){
                session()->forget('coupon');
            }else{
                $this->calculateDiscounts();
            }
        }
        $sale = Sale::find(1);

        $this->setAmountForCheckout();
        return view('livewire.cart-component',compact('sale'))->layout('layouts.base');
    }
}
