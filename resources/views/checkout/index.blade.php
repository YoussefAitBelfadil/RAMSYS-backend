@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Checkout</h2>
            <div class="card">
                <div class="card-header">Order Summary</div>
                <div class="card-body">
                    @foreach($cartItems as $item)
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h5>{{ $item->product->name }}</h5>
                                <p>Quantity: {{ $item->quantity }}</p>
                            </div>
                            <div>${{ number_format($item->product->price * $item->quantity, 2) }}</div>
                        </div>
                    @endforeach
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h4>Total:</h4>
                        <h4>${{ number_format($total, 2) }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Payment Information</div>
                <div class="card-body">
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Cardholder Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Card Number</label>
                            <input type="text" class="form-control" placeholder="4242 4242 4242 4242" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Expiration</label>
                                <input type="text" class="form-control" placeholder="MM/YY" required>
                            </div>
                            <div class="col-md-6">
                                <label>CVV</label>
                                <input type="text" class="form-control" placeholder="123" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Complete Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
