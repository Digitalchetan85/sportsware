<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Livewire\Component;
use Razorpay\Api\Api;
use Cart;
use Illuminate\Support\Facades\Mail;

class RazorPayThankYou extends Component
{
    public $paymentid;
    private $razorpayId = "rzp_test_BOZFJRyclJtXL1";
    private $razorpaykey = "Foiy2R0WHwzdKDFUZgeK8TgC";

    private function SignatureVerify($_signature, $_paymentId, $_orderId)
    {
        try {
            $api = new Api($this->razorpayId, $this->razorpaykey);
            $attributes = array('razorpay_signature' => $_signature, 'razorpay_payment_id' => $_paymentId, 'razorpay_order_id' => $_orderId);
            $order = $api->utility->verifyPaymentSignature($attributes);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function whichPage($page)
    {
        if($page == true)
        {
            $transaction = Transaction::where('user_id',session()->get('transaction')['userid'])->where('order_id',session()->get('transaction')['orderid'])->first();
            // dd(session()->get('transaction')['orderid']);
            $transaction->status = 'approved';
            $transaction->paymentid = $this->paymentid;
            $transaction->save();
            
            Cart::instance('cart')->destroy();
            session()->forget('checkout');
            session()->forget('razorpay');
            session()->forget('transaction');
            // dd(session()->get('order'));
            $this->SendOrderConfirmationMail(session()->get('order'));
            return redirect()->route('thankyou');
        }
        else
        {
            return view('livewire.home-component');
            dd('fail');
        }        
    }

    // public function SendOrderConfirmationMail($order)
    // {
    //     Mail::to($order->email)->send(new OrderMail($order));
    // }

    public function render(Request $request)
    {
        // dd($request->all()['rzp_paymentid']);
        $singtureStatus = $this->SignatureVerify(
            $request->all()['rzp_signature'],
            $request->all()['rzp_paymentid'],
            $request->all()['rzp_orderid'],
        );

        $this->paymentid = $request->all()['rzp_paymentid'];

        // dd($singtureStatus == true);

        $this->whichPage($singtureStatus);
        return view('livewire.razor-pay-thank-you')->layout('layouts.base');
    }
}
