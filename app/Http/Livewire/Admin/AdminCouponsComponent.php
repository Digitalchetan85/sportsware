<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCouponsComponent extends Component
{
    use WithPagination;

    public function deleteCoupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('success','Coupon deleted successfully');
    }
    public function render()
    {
        $coupons = Coupon::Paginate(10);
        return view('livewire.admin.admin-coupons-component',compact('coupons'))->layout('layouts.base');
    }

   
}
