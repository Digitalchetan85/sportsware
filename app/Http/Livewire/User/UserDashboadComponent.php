<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class UserDashboadComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get()->take(10);
        $totalSales = Order::where('status','delivered')->count();
        $totalRevenue = Order::where('status','delivered')->sum('total');
        $todaySales = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->count();
        $todayRevenue = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->sum('total');
        return view('livewire.user.user-dashboad-component',compact('orders','totalSales','totalRevenue','todaySales','todayRevenue'))->layout('layouts.base');
    }
}
