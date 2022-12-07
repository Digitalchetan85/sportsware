<div>
    <button id="rzp-button1" hidden>Pay</button>

    <form action="{{ url('/razorpay-thank-you')}}" method="post" hidden>
        <input type="hidden" value="{{csrf_token()}}" name="_token" />
        <input type="text" class="form-control" id="rzp_paymentid" name="rzp_paymentid" />
        <input type="text" class="form-control" id="rzp_orderid" name="rzp_orderid" />
        <input type="text" class="form-control" id="rzp_signature" name="rzp_signature" />
        <button type="submit" id="rzp_paymentresponse" class="btn btn-primary">Submit</button>
    </form>
</div>

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    @if(Session::has('checkout'))
var options = {
    "key": "{{Session::get('razorpay')['razorpayId']}}", // Enter the Key ID generated from the Dashboard
    "amount": "{{Session::get('razorpay')['amount']}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "{{Session::get('razorpay')['currency']}}", //
    "name": "{{Session::get('razorpay')['name']}}",
    "description": "{{Session::get('razorpay')['description']}}",
    "image": "{{asset('assets/images/logo.png')}}",
    "order_id": "{{Session::get('razorpay')['orderId']}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        document.getElementById('rzp_paymentid').value = response.razorpay_payment_id;
        document.getElementById('rzp_orderid').value = response.razorpay_order_id;
        document.getElementById('rzp_signature').value = response.razorpay_signature;

        // alert(response.razorpay_payment_id);
        // alert(response.razorpay_order_id);
        // alert(response.razorpay_signature)

        document.getElementById('rzp_paymentresponse').click();
    },
    "prefill": {
        "name": "{{Session::get('razorpay')['name']}}",
        "email": "{{Session::get('razorpay')['email']}}",
        "contact": "{{Session::get('razorpay')['contactNumber']}}",
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
@endif
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});

window.onload = function() {
    document.getElementById('rzp-button1').click();
}
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
@endpush