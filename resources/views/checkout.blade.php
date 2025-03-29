@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Checkout</h2>

            <div class="card">
                <div class="card-header">Payment Information</div>
                <div class="card-body">
                    <form id="payment-form" action="{{ route('checkout.process') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="card-holder-name">Card Holder Name</label>
                            <input type="text" class="form-control" id="card-holder-name" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="card-element">Credit or debit card</label>
                            <div id="card-element" class="form-control" style="height: 40px; padding: 10px;"></div>
                            <div id="card-errors" role="alert" class="text-danger"></div>
                        </div>

                        <button id="card-button" class="btn btn-primary mt-3">Pay ${{ number_format($total, 2) }}</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Order Summary</div>
                <div class="card-body">
                    @foreach($cartItems as $item)
                        <div class="d-flex justify-content-between mb-2">
                            <span>{{ $item->product->name }} (x{{ $item->quantity }})</span>
                            <span>${{ number_format($item->product->price * $item->quantity, 2) }}</span>
                        </div>
                    @endforeach
                    <hr>
                    <div class="d-flex justify-content-between font-weight-bold">
                        <span>Total:</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('services.stripe.key') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const form = document.getElementById('payment-form');
    const cardButton = document.getElementById('card-button');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        cardButton.disabled = true;

        const { paymentMethod, error } = await stripe.createPaymentMethod(
            'card', cardElement, {
                billing_details: { name: document.getElementById('card-holder-name').value }
            }
        );

        if (error) {
            document.getElementById('card-errors').textContent = error.message;
            cardButton.disabled = false;
        } else {
            // Add payment method ID to form and submit
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', paymentMethod.id);
            form.appendChild(hiddenInput);

            form.submit();
        }
    });
</script>
@endsection
