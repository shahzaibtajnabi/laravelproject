@extends('website.layouts.main')
@section('main_section')

<div class="container">
    <h2 class="my-4">Shopping Cart</h2>

    @if(session('cart'))
        <div class="card p-3">
            @php
                $total = 0;
                $totalItems = 0;
            @endphp

            @foreach(session('cart') as $id => $product)
                @php
                    $total += $product['price'] * $product['quantity'];
                    $totalItems += $product['quantity'];
                @endphp

                <div class="d-flex border-bottom pb-3 mb-3 align-items-center justify-content-between">
                    <!-- Product Details (Left Side) -->
                    <div class="d-flex align-items-center">
                        <div class="me-4">
                            <img src="{{ $product['image'] }}" style="padding-right: 20px" width="120" class="rounded">
                        </div>
                        <div>
                            <h5 class="mb-1">{{ $product['desc'] }}</h5>

                            <!-- Quantity Selector -->
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center">
                                @csrf
                                @method('PUT')

                                <div class="d-flex align-items-center bg-light rounded-pill p-2">
                                    <button type="submit" name="action" value="decrease" class="btn btn-sm btn-light border rounded-circle">-</button>
                                    <input type="text" name="quantity" value="{{ $product['quantity'] }}" class="form-control text-center mx-2 quantity" style="width: 50px; border: none; background: transparent;" readonly>
                                    <button type="submit" name="action" value="increase" class="btn btn-sm btn-light border rounded-circle">+</button>
                                </div>
                            </form>

                            <!-- Remove Button -->
                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link text-danger">Remove</button>
                            </form>
                        </div>
                    </div>

                    <!-- Price (Right Side, Bold) -->
                    <p class="mb-0 text-danger fw-bold fs-5">${{ $product['price'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- Subtotal Section (Right Side) -->
        <div class="mt-4 d-flex justify-content-end">
            <h4 class="me-3">Subtotal ({{ $totalItems }} items):</h4>
            <h4 class="text-danger fw-bold">${{ $total }}</h4>
        </div>

        <!-- Checkout & Continue Shopping -->
        <div class="mt-3 d-flex justify-content-end">
            <a href="" class="btn btn-warning btn-lg">Proceed to Checkout</a>
            <a href="" class="btn btn-outline-secondary btn-lg ms-2">Continue Shopping</a>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>

@endsection
