@extends('website.layouts.main')
@section('main_section')

<style>
    .checkout-container {
        max-width: 900px;
        margin: auto;
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        gap: 40px; /* Increased gap between billing and order sections */
    }
    .billing-details {
        flex: 1.2;
    }
    .order-summary-section {
        flex: 0.8;
        margin-left: auto;
    }
    .checkout-title {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }
    .checkout-input {
        border: 1px solid #ddd;
        padding: 12px;
        border-radius: 6px;
        width: 100%;
        margin-bottom: 12px;
        font-size: 16px;
    }
    .checkout-section {
        background: #f4f4f4;
        padding: 18px;
        border-radius: 8px;
        margin-top: 18px;
    }
    .checkout-button {
        width: 100%;
        background: linear-gradient(135deg, #6b46c1, #9b59b6);
        color: white;
        padding: 14px;
        border-radius: 6px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        transition: 0.3s;
        border: none;
        cursor: pointer;
    }
    .checkout-button:hover {
        background: linear-gradient(135deg, #5a36a1, #8e44ad);
    }
    .payment-icons img {
        height: 35px;
        margin-right: 12px;
    }
    .order-summary {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        background: #fff;
        border-radius: 8px;
        margin-top: 12px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }
    .order-summary img {
        width: 55px;
        height: 55px;
        border-radius: 6px;
    }
    .order-summary .details {
        flex-grow: 1;
        margin-left: 12px;
    }
    .order-summary .price {
        font-weight: bold;
        font-size: 18px;
    }
</style>

<div class="checkout-container">
    <div class="billing-details">
        <h2 class="checkout-title">Billing Details</h2>

        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="customer_name" placeholder="Name *" class="checkout-input" required>
                <input type="text" name="address" placeholder="Delivery Address With Street and House # *" class="checkout-input" required>
                <input type="text" name="city" placeholder="Town / City *" class="checkout-input" required>
                <input type="text" name="phone" placeholder="Phone *" class="checkout-input" required>
                <input type="email" name="email" placeholder="Email address" class="checkout-input">
            </div>

            <div class="mt-4">
                <label class="block font-semibold">Additional Information</label>
                <textarea name="order_notes" class="checkout-input" placeholder="Add Order Notes"></textarea>
            </div>

            <!-- Hidden Inputs for Order Data -->

            <input type="hidden" name="product_id" value="{{ $data['product_id'] }}">
            <input type="hidden" name="product_name" value="{{ $data['product_name'] }}">
            <input type="hidden" name="product_desc" value="{{ $data['product_desc'] }}">
            <input type="hidden" name="product_price" value="{{ $data['product_price'] }}">
            <input type="hidden" name="quantity" value="{{ $data['quantity'] }}">
            <input type="hidden" name="total_price" value="{{ $total_price }}">

            <div class="order-summary-section">
                <div class="checkout-section">
                    <h3 class="font-semibold">Your Order</h3>
                    <div class="order-summary">
                        <img src="{{ $data['product_image'] }}" alt="{{ $data['product_name'] }}">
                        <div class="details">
                            <p>{{ $data['product_desc'] }}</p>
                            <p>Quantity: {{ $data['quantity'] }}</p>
                        </div>
                        <span class="price">${{ number_format($data['product_price'], 2) }}</span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between font-bold">
                        <span>Total</span>
                        <span>${{ number_format($total_price, 2) }}</span>
                    </div>
                </div>

                <div class="checkout-section">
                    <p class="font-semibold">Select Payment Method</p>
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="payment_method" value="cash_on_delivery" checked class="form-radio">
                            <span>Cash on Delivery</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="payment_method" value="card" class="form-radio">
                            <span>Credit / Debit Card (Visa, MasterCard, PayPal)</span>
                        </label>
                    </div>
                </div>

                <button type="submit" class="checkout-button">Place Order (${{ number_format($total_price, 2) }})</button>

                <div class="flex justify-center space-x-4 mt-4 payment-icons">
                    <img src="/images/visa.png" alt="Visa">
                    <img src="/images/mastercard.png" alt="MasterCard">
                    <img src="/images/paypal.png" alt="PayPal">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
