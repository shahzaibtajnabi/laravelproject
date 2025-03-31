@extends('website.layouts.main')


@section('main_section')


@if (session('alert'))
<div class="success-alert" id="successAlert">
    <div class="pink-panther-cartoon">
        <img src="{{ asset('assets/img/pinkpenther.png') }}" alt="Pink Panther">
    </div>
    <span>{{ session('alert')['message'] }}</span>
</div>

@endif

    <div class="jumbotron jumbotron-fluid bg-jumbotron" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h3 class="text-white display-3 mb-4">shopping</h3>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="far fa-circle px-3"></i>
                <p class="m-0">Sopping</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <style>
        .color {
            color: black;

        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: 0.3s;
            overflow: hidden;
            background: #fff;
            padding: 10px;
            text-align: center;
        }

        .product-card img {
            height: 250px;
            object-fit: cover;
            border-color: white
        }

        .product-card:hover {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .product-title {
            text-align: left;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .product-name {
            text-align: left;
            font-size: 17px;
            color: black;
            margin-right: 70px;
            font-weight: 500;

        }

        .price {
            text-align: left;
            font-size: 15px;



        }

        .color {
            text-align: left;
            font-size: 13px;
            color: #1a1919;
            font-weight: bold;
        }

        .ratings {
            text-align: left;
            color: #ff9900;
        }


        .btn-sg {
            background-color: #FFD814;
            /* Amazon yellow */
            color: #111;
            /* Black text */
            font-weight: bold;
            border: 1px solid #FCD200;
            border-radius: 15px;
            /* Slightly smaller rounded corners */
            padding: 6px 12px;
            /* Reduced padding */
            font-size: 14px;
            /* Smaller text */
            width: auto;
            /* Smaller width */
            text-align: center;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
            display: inline-block;
            /* Keeps button compact */
            margin-right: 75px;
            margin-top: 10px;
        }

        .btn-sg:hover {
            background-color: #F7CA00;
            /* Darker shade on hover */

        }

        .product-card {
            padding: 5px;
            /* Kam padding */
            border-radius: 5px;
            font-size: 13px;
            /* Choti text size */
            min-height: 280px;
            /* Minimum height set */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Extra space remove */
        }

        .product-card img {
            height: 150px;
            /* Image ka size chota */
            object-fit: cover;
            margin-bottom: 5px;
            /* Image ke niche ka gap kam */
        }

        .product-title,
        .product-name {
            font-size: 13px;
            /* Text ka size chota */
            line-height: 1.2;
            margin: 2px 0;
            /* Upar niche ka gap remove */
        }

        .price,
        .color,
        .ratings {
            font-size: 12px;
            /* Price aur color ka size chota */
            margin: 2px 0;
            /* Extra space remove */
        }

        .btn-sg {
            padding: 4px 8px;
            /* Button chota */
            font-size: 12px;
            border-radius: 10px;
            margin-top: 5px;
            /* Button ke upar ka space kam */
        }

        //* Price Filter Section */
        .col-md-3 {
            padding-left: 50px;
            /* Left padding kam karein */
            margin-left: -40px;
            /* Filter ko thoda left shift karein */
        }

        /* Price Labels */
        #minPriceVal,
        #maxPriceVal {
            font-size: 12px;
            font-weight: bold;
        }

        /* Apply Filter Button */
        #applyFilter {
            font-size: 12px;
            padding: 5px 8px;
            border-radius: 5px;
        }

        .product-heading {
            font-size: 36px;
            font-weight: bold;
            color: #222;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Subheading */
        .product-subheading {
            font-size: 18px;
            color: #555;
            margin-top: 5px;
        }

        /* Medium Screens (Tablets) */
        @media (max-width: 992px) {
            .product-heading {
                font-size: 30px;
            }

            .product-subheading {
                font-size: 16px;
            }
        }

        /* Small Screens (Mobile) */
        @media (max-width: 768px) {
            .product-heading {
                font-size: 24px;
            }

            .product-subheading {
                font-size: 14px;
            }
        }

        /* Extra Small Screens */
        @media (max-width: 480px) {
            .product-heading {
                font-size: 20px;
            }

            .product-subheading {
                font-size: 12px;
            }
        }
    </style>

    <div class="container text-center mt-4">
        <h2 class="product-heading">✨ Explore Our Exclusive Collection ✨</h2>
        <p class="product-subheading">Find the perfect products at unbeatable prices!</p>
    </div>


    <div class="container mt-4">
        <div id="noProductsMessage"
            style="display: none; text-align: center; color: red; font-weight: bold; margin-top: 20px;">
            No products found in this price range.
        </div>

        <div class="row">
            <!-- Filter Sidebar -->
            <div class="col-md-3">
                <h4>Filter by Price</h4>

                <label>Min Price: $<span id="minPriceVal">0</span></label>
                <input type="range" id="minPrice" min="0" max="1000" value="0" step="10"
                    class="form-range">

                <label>Max Price: $<span id="maxPriceVal">1000</span></label>
                <input type="range" id="maxPrice" min="0" max="1000" value="1000" step="10"
                    class="form-range">

                <button id="applyFilter" class="btn btn-primary mt-2">Apply Filter</button>
            </div>


            <!-- Product Listing -->
            <div class="col-lg-9">
                <div class="row">
                    @foreach ($product as $p)
                        @php
                            $list_price = round($p->price * 1.2, 2);
                            $rating = round(mt_rand(6, 10) / 2, 1);
                            $fullStars = floor($rating);
                            $halfStar = $rating - $fullStars >= 0.5 ? 1 : 0;
                            $emptyStars = 5 - ($fullStars + $halfStar);
                        @endphp

                        <div class="col-lg-4 col-md-6 mb-4 product-item" data-price="{{ $p->price }}">
                            <div class="card product-card">
                                {{-- image tap --}}
                                <a href="{{ route('product.show', $p->id) }}">
                                    <img src="{{ $p->image }}" class="card-img-top" alt="Product Image">
                                </a>
                                <div class="card-body">
                                    <p class="product-name">{{ $p->name }}</p>
                                    <p class="product-title">{{ $p->desc }}</p>

                                    <!-- Ratings -->
                                    <div class="ratings" style="color: #ff9900; font-size: 16px;">
                                        @for ($i = 0; $i < $fullStars; $i++)
                                            <span>★</span>
                                        @endfor
                                        @if ($halfStar)
                                            <span>★</span>
                                        @endif
                                        @for ($i = 0; $i < $emptyStars; $i++)
                                            <span>☆</span>
                                        @endfor
                                    </div>

                                    <p class="color">Color: {{ $p->color }} / Size: {{ $p->size }}</p>
                                    <p class="price">
                                        <span
                                            style="font-weight:400; font-size:30px; color:black;">${{ $p->price }}</span>
                                        <sup style="font-size: 17px; font-weight:600;">99</sup>
                                        <span style="font-weight:300; font-size:15px; color: gray;">List:</span>
                                        <span
                                            style="text-decoration: line-through; color: gray;">${{ $list_price }}</span>
                                    </p>

                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $p->id }}">
                                        <input type="hidden" name="desc" value="{{ $p->desc }}">
                                        <input type="hidden" name="price" value="{{ $p->price }}">
                                        <input type="hidden" name="image" value="{{ $p->image }}">
                                        <button type="submit" class="btn-sg ">Add to Cart</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const minPriceInput = document.getElementById("minPrice");
            const maxPriceInput = document.getElementById("maxPrice");
            const minPriceVal = document.getElementById("minPriceVal");
            const maxPriceVal = document.getElementById("maxPriceVal");
            const applyFilterBtn = document.getElementById("applyFilter");
            const productItems = document.querySelectorAll(".product-item");
            const noProductsMessage = document.getElementById("noProductsMessage"); // Error message div

            // Update range text values
            minPriceInput.addEventListener("input", function() {
                minPriceVal.textContent = this.value;
            });

            maxPriceInput.addEventListener("input", function() {
                maxPriceVal.textContent = this.value;
            });

            // Filter products on button click
            applyFilterBtn.addEventListener("click", function() {
                let minPrice = parseInt(minPriceInput.value);
                let maxPrice = parseInt(maxPriceInput.value);
                let productFound = false; // Track matching products

                productItems.forEach(product => {
                    let productPrice = parseInt(product.getAttribute("data-price"));
                    if (productPrice >= minPrice && productPrice <= maxPrice) {
                        product.style.display = "block";
                        productFound = true; // At least one product found
                    } else {
                        product.style.display = "none";
                    }
                });

                // Show or hide "No products found" message
                if (!productFound) {
                    noProductsMessage.style.display = "block"; // Show message
                } else {
                    noProductsMessage.style.display = "none"; // Hide message
                }
            });
        });
    </script>
@endsection
