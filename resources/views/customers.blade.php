<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        } */

        .product-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 20px;
        }

        .product-image {
            flex: 1;
            text-align: center;
        }

        .product-image img {
            max-width: 100%;
            height: 350px;
            object-fit: contain;
            border-radius: 8px;
        }

        .product-details {
            flex: 1;
            padding: 20px;
        }

        .product-title {
            font-size: 26px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }

        .product-price {
            font-size: 22px;
            color: rgb(255, 152, 170);
            font-weight: bold;
        }

        .product-price del {
            color: #888;
            font-size: 16px;
            margin-left: 8px;
        }

        .rating {
            color: #ff9900;
            font-size: 18px;
            margin-bottom: 8px;
        }

        /* Quantity Selector */
        .quantity-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 15px;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            border: 2px solid rgb(255, 152, 170);
            border-radius: 50px;
            padding: 5px;
            background-color: rgb(255, 235, 238);
        }

        .quantity-btn {
            background-color: rgb(255, 152, 170);
            color: white;
            border: none;
            padding: 5px 12px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 50%;
        }

        .quantity-input {
            width: 40px;
            text-align: center;
            border: 2px solid rgb(255, 152, 170);
            font-size: 16px;
            background: white;
            border-radius: 8px;
            padding: 5px;
            font-weight: bold;
        }

        /* Purchase Button */
        .purchase-btn {
            background-color: rgb(255, 152, 170);
            color: white;
            padding: 12px 20px;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .purchase-btn:hover {
            background-color: rgb(255, 192, 203);
        }

        /* Button Container */
        .button-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 15px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .product-container {
                flex-direction: column;
                text-align: center;
            }

            .product-details {
                padding: 10px;
            }

            .product-image img {
                height: 250px;
            }

            .button-container {
                flex-direction: column;
            }
        }

        .quantity-container {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .quantity-btn {
            width: 35px;
            height: 35px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-btn:hover {
            background-color: #0056b3;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            height: 35px;
            background-color: #f8f9fa;
        }

        .total-price-container {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        .total-price-label {
            color: #007bff;
        }

        .total-price-value {
            color: #28a745;
        }
                @keyframes scrollRight {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(-50%);
            }
        }
        .scroll-container {
            display: flex;
            overflow: hidden;
            white-space: nowrap;
            position: relative;
        }
        .scroll-content {
            display: flex;
            animation: scrollRight 10s linear infinite;
            gap: 1rem;
        }
        .scroll-content:hover {
            animation-play-state: paused;
        }

        /* -----carousel work */

        .carousel-container {
            position: relative;
            max-width: 90%;
            margin: auto;
            overflow: hidden;
            border-radius: 10px;
        }

        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .card {
            min-width: 200px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            margin: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-color: white;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover img {
            transform: scale(1.1);
        }

        .card h3 {
            font-size: 16px;
            margin: 10px 0;
            color: #333;
        }

        .card p {
            font-size: 14px;
            color: #777;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }

        .add-to-cart {
            display: inline-block;
            background: black;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.3s;
        }

        .add-to-cart:hover {
            background: #333;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .card {
                min-width: 150px;
            }
        }

        @media (max-width: 576px) {
            .card {
                min-width: 120px;
            }
        }

    </style>

    <div class="product-container">
        <div class="product-image">
            <img src="{{ asset($product->image) }}" alt="Product Image">
        </div>
        <div class="product-details">
            <h1 class="product-title">{{ $product->desc }}</h1>

            <!-- ⭐⭐⭐⭐⭐ Star Ratings -->
            <div class="rating">
                @for ($i = 0; $i < floor($rating); $i++)
                    <span>★</span>
                @endfor
                @if ($rating - floor($rating) >= 0.5)
                    <span>★</span>
                @endif
                @for ($i = 0; $i < 5 - ceil($rating); $i++)
                    <span>☆</span>
                @endfor
            </div>

            <p class="product-price">
                ${{ number_format($product->price) }}
                <del>${{ number_format($list_price) }}</del>
                <span class="badge bg-success">-25%</span>
            </p>

            <ul style="font-size: 14px;">
                <li><strong>Material:</strong> {{ $product->name }}</li>
                <li><strong>Color:</strong> {{ $product->color }}</li>
                <li><strong>Size:</strong> {{ $product->size }}</li>
            </ul>

            <!-- Quantity & Purchase Button -->
            <div class="button-container">

                <!-- Quantity Section -->
                <div class="quantity-container">
                    <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
                    <input type="text" id="quantity" class="quantity-input" value="1" readonly>
                    <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                </div>
                <form action="{{ route('billing.page') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                    <input type="hidden" name="product_desc" value="{{ $product->desc }}">
                    <input type="hidden" name="product_image" value="{{ asset($product->image) }}">
                    <input type="hidden" name="product_price" id="product_price" value="{{ $product->price }}">
                    <input type="hidden" name="list_price" value="{{ $list_price }}">
                    <input type="hidden" name="discount" value="25%">
                    <input type="hidden" name="product_color" value="{{ $product->color }}">
                    <input type="hidden" name="product_size" value="{{ $product->size }}">
                    <input type="hidden" name="quantity" id="hidden_quantity" value="1">

                    <!-- Quantity Input Field -->


                    <!-- Total Price Section -->
                    <p class="total-price-container">
                        <span class="total-price-label">Total Price: $ </span>
                        <span id="total_price" class="total-price-value">{{ $product->price }}</span>
                    </p>

                    <button type="submit" class="purchase-btn">Purchase Now</button>
                </form>




            </div>

            <div class="extra-info">
                <p>✅ 100% Original</p>
                <p>✅ Free Delivery</p>
                <p>✅ Cash On Delivery</p>
            </div>

        </div>
    </div>
  {{-- ---->carousel work --}}

  <div class="carousel-container">
    <div class="carousel">
  @foreach ( $productcarousel as $c )
  <div class="card">
    <a href="{{ route('product.show', $c->id) }}">
        <img src="{{ asset($c->image) }}" alt="Product Image">
    </a>


    <h3>{{ $c->name}}</h3>
    <p>{{ $c->desc}}</p>
    <p class="price">{{$c->price}}</p>

    <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $c->id }}">
        <input type="hidden" name="desc" value="{{ $c->desc }}">
        <input type="hidden" name="price" value="{{ $c->price }}">
        <input type="hidden" name="image" value="{{ $c->image }}">
        <button type="submit" class="add-to-cart" >Add to Cart</button>
    </form>
</div>

  @endforeach
     </div>
</div>


    <script>
        let productPrice = {{ $product->price }}; // Laravel se product price le rahe hain

        function increaseQuantity() {
            let quantityInput = document.getElementById("quantity");
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updateTotalPrice();
        }

        function decreaseQuantity() {
            let quantityInput = document.getElementById("quantity");
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                updateTotalPrice();
            }
        }

        function updateTotalPrice() {
    let quantity = parseInt(document.getElementById("quantity").value);
    let totalPrice = quantity * productPrice;
    document.getElementById("total_price").innerText = totalPrice;
    document.getElementById("hidden_quantity").value = quantity; // Hidden input update
}

    </script>

    {{-- ----------->carousel work --}}
    <script>
        let index = 0;
        let autoScroll;

        function startAutoScroll() {
            autoScroll = setInterval(() => {
                moveSlide(1);
            }, 3000);
        }

        function moveSlide(step) {
            const carousel = document.querySelector('.carousel');
            const cards = document.querySelectorAll('.card');
            const totalCards = cards.length;
            const cardWidth = cards[0].offsetWidth + 20; // Card width + margin

            index += step;

            // Looping mechanism
            if (index > totalCards - 4) {
                index = 0;
            }

            carousel.style.transform = `translateX(-${index * cardWidth}px)`;
        }

        // Mouse hover to pause
        document.querySelector('.carousel-container').addEventListener('mouseenter', () => {
            clearInterval(autoScroll);
        });

        // Mouse leave to resume
        document.querySelector('.carousel-container').addEventListener('mouseleave', () => {
            startAutoScroll();
        });

        startAutoScroll(); // Start auto scrolling on load
    </script>

</body>

</html>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
