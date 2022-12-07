<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
use Illuminate\Support\Str;
use Razorpay\Api\Api;

// use Razorpay\Api\Api;

class CheckoutComponent extends Component
{
    private $razorpayId = "rzp_test_kHhTGq6d0I9ltk";
    private $razorpaykey = "9P4tuae2VemGZNrHsOlTs4Ex";

    public $ship_to_different;

    public $fname;
    public $lname;
    public $phone;
    public $email;
    public $line1;
    public $line2;
    public $zipcode;
    public $state;
    public $country;
    public $city;

    public $s_fname;
    public $s_lname;
    public $s_phone;
    public $s_email;
    public $s_line1;
    public $s_line2;
    public $s_zipcode;
    public $s_state;
    public $s_country;
    public $s_city;

    public $paymentMethod;
    public $thankyou;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'line1' => 'required',
            'line2' => 'required',
            'zipcode' => 'required',
            'state' => 'required',
            'country' => 'required',
            'city' => 'required',
            'paymentMethod' => 'required',
        ]);

            if($this->ship_to_different)
            {
                $this->validateOnly($fields, [
                    's_fname' => 'required',
                    's_lname' => 'required',
                    's_phone' => 'required',
                    's_email' => 'required',
                    's_line1' => 'required',
                    's_line2' => 'required',
                    's_zipcode' => 'required',
                    's_state' => 'required',
                    's_country' => 'required',
                    's_city' => 'required',
                ]);
            }

    }

    public function placeOrder()
    {
        $this->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'line1' => 'required',
            'line2' => 'required',
            'zipcode' => 'required',
            'state' => 'required',
            'country' => 'required',
            'city' => 'required',
            'paymentMethod' => 'required',
        ]);

        $order = new Order();

        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->total = session()->get('checkout')['total'];
        $order->tax = session()->get('checkout')['tax'];
        $order->discount = session()->get('checkout')['discount'];

        $order->firstname = $this->fname;
        $order->lastname = $this->lname;
        $order->mobile = $this->phone;
        $order->email = $this->email;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->zipcode = $this->zipcode;
        $order->state = $this->state;
        $order->country = $this->country;
        $order->city = $this->city;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1:0;
        $order->save();

        foreach(Cart::instance('cart')->content() as $content)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $content->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $content->price;
            $orderItem->quantity = $content->qty;
            $orderItem->save();
        }
        if($this->ship_to_different)
        {
         $this->validate([
            's_fname' => 'required',
            's_lname' => 'required',
            's_phone' => 'required',
            's_email' => 'required',
            's_line1' => 'required',
            's_line2' => 'required',
            's_zipcode' => 'required',
            's_state' => 'required',
            's_country' => 'required',
            's_city' => 'required',
         ]);
         $shipping = new Shipping();
         $shipping->order_id = $order->id;
         $shipping->firstname = $this->s_fname;
         $shipping->lastname = $this->s_lname;
         $shipping->mobile = $this->s_phone;
         $shipping->email = $this->s_email;
         $shipping->line1 = $this->s_line1;
         $shipping->line2 = $this->s_line2;
         $shipping->zipcode = $this->s_zipcode;
         $shipping->state = $this->s_state;
         $shipping->country = $this->s_country;
         $shipping->city = $this->s_city;
         $shipping->save();
        }

        if($this->paymentMethod == 'cod')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode='cod';
            $transaction->status='pending';
            $transaction->save();
            $this->thankyou();
        }
        elseif($this->paymentMethod == 'razorpay')
        {
            session()->put('transaction', [
                'orderid' => $order->id,
                'userid' => Auth::user()->id,
            ]);

            session()->put('order', $order);

            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = $this->paymentMethod;
            $transaction->status = 'pending';
            $transaction->save();

            $receiptId = Str::random(20);
            $api = new Api($this->razorpayId, $this->razorpaykey);

            //creating order
            $order = $api->order->create(array(
                'receipt' => $receiptId,
                'amount' => session()->get('checkout')['total']*100,
                'currency' => 'INR',
            ));

            session()->put('razorpay', [
                'orderId' => $order['id'],
                'razorpayId' => $this->razorpayId,
                'amount' => session()->get('checkout')['total'] * 100,
                'name' => $this->fname.' '.$this->lname,
                'currency' => 'INR',
                'email' => $this->email,
                'contactNumber' => $this->phone,
                'address' => $this->city,
                'description' => 'Testing Description'
            ]);

            return redirect()->route('payment');
        }

        

    }

    public function thankyou() {
        $this->thankyou = 1;

        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function verifyforCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        elseif ($this->thankyou) {
            return redirect()->route('thankyou');
        }
        elseif(!session()->get('checkout'))
        {
            return redirect()->route('cart');
        }
    }

    

    public function render()
    {
        // dd(session()->get('checkout')['subtotal']);
        $this->verifyforCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
