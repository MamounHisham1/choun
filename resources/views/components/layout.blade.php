<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="/assets/choun/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="/assets/choun/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
        href="/assets/choun/assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/choun/assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/assets/choun/assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/choun/assets/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/choun/assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/choun/assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="/assets/choun/assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="/assets/choun/assets/css/main.css">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/choun/assets/imgs/.template/favicon.svg">
    <link href="/assets/choun/assets/css/style.css?v=1.0.0" rel="stylesheet">
    <style>
        .radio-badge {
            display: inline-block;
            /* padding: 3px 6px; */
            /* border-radius: 50px; */
            /* border: 2px solid trans parent; */
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
        }

        .radio-badge:hover {
            background-color: #b0b0b0;
            color: #fff;
            border-color: #8a8a8a;
        }

        .radio-badge input[type="radio"] {
            display: none;
        }

        .radio-badge input[type="radio"]:checked+.badge-content {
            background-color: #b0b0b0;
            color: #fff;
            border-color: #8a8a8a;
        }

        .badge-content {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 50px;
            border: 2px solid #6c757d;
            transition: all 0.3s ease;
        }

        .badge-icon {
            margin-right: 8px;
            vertical-align: middle;
        }
    </style>
    @stack('css')
    <title>Home 16 - Electronic - Multipurpose Startup SaaS HTML Template</title>
</head>

<body>
    <x-loader />
    <x-header />
    <main class="main">

        {{ $slot }}

    </main>
    <x-footer />
    <x-popup-preview />
    <x-popup-search />
    <x-popup-account />
    <x-popup-cart />
    <x-popup-wishlist />


    <script src="/assets/choun/assets/js/vendors/modernizr-3.6.0.min.js"></script>
    <script src="/assets/choun/assets/js/vendors/jquery-3.7.0.min.js"></script>
    <script src="/assets/choun/assets/js/vendors/jquery-migrate-3.3.0.min.js"></script>
    <script src="/assets/choun/assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="/assets/choun/assets/js/vendors/waypoints.js"></script>
    <script src="/assets/choun/assets/js/vendors/wow.js"></script>
    <script src="/assets/choun/assets/js/vendors/magnific-popup.js"></script>
    <script src="/assets/choun/assets/js/vendors/perfect-scrollbar.min.js"></script>
    <script src="/assets/choun/assets/js/vendors/select2.min.js"></script>
    <script src="/assets/choun/assets/js/vendors/isotope.js"></script>
    <script src="/assets/choun/assets/js/vendors/swiper-bundle.min.js"></script>
    <script src="/assets/choun/assets/js/vendors/counterup.js"></script>
    <script src="/assets/choun/assets/js/vendors/jquery.countdown.min.js"></script>
    <script src="/assets/choun/assets/js/vendors/slick.js"></script>
    <script src="/assets/choun/assets/js/vendors/jquery.timepicker.min.js"></script>
    <script src="/assets/choun/assets/js/vendors/glightbox.min.js"></script>
    <script src="/assets/choun/assets/js/main.js?v=1.0.0"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireScripts
    @stack('scripts')

    <script>
        // Add to cart
        $(".add-to-cart").click(function(e) {
            $(this).attr('disabled', true);
            $(this).addClass('disabled');
            const that = this;
            $.ajax({
                type: "POST",
                url: "/add-to-cart/" + $(this).data('product'),
                data: {
                    quantity: $('#qty').val(),
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    $("#success-alert").html(data['message']);
                    $("#success-alert").toggleClass("d-none");
                    const cart = parseInt($("#cart-tag").html()) || 0;
                    $("#cart-tag").html(cart + 1);
                    setTimeout(() => {
                        $("#success-alert").toggleClass("d-none");
                    }, 2000);
                    $('#cart-tag').addClass("number-tag");
                    parseInt($("#cart-tag").html());

                    // Update cart items and subtotal in the popup
                    updateCartPopup(data.cartItems, data.subtotal);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $("#error-alert").html("Product not found");
                    $("#error-alert").toggleClass("d-none");
                    setTimeout(() => {
                        $("#error-alert").toggleClass("d-none");
                    }, 2000);
                },
                complete: () => {
                    $(that).removeAttr("disabled");
                    $(that).removeClass('disabled');
                },
            });
        });

        // Render cart items
        function updateCartPopup(cartItems, subtotal) {
            let cartHtml = '';
            cartItems.forEach(item => {
                cartHtml += `
            <div class="item-cart">
                <div class="item-cart-image"><img src="" alt="${item[0].name}"></div>
                <div class="item-cart-info">
                    <div class="item-cart-info-1"><a class="text-16-medium" href="#">${item[0].name}</a>
                        <div class="box-info-size-color-product">
                            <p class="box-color"><span class="body-p2 neutral-medium-dark">Color:</span><span
                                    class="body-p2 neutral-dark">Navy</span></p>
                            <p class="box-size"><span class="body-p2 neutral-medium-dark">Size:</span><span
                                    class="body-p2 neutral-dark">S</span></p>
                        </div>
                        <p class="body-p2 d-block d-sm-none mb-8">${item[0].price}</p>
                        <div class="box-form-cart">
                            <div class="form-cart detail-qty"><span class="minus"></span>
                                <input class="qty-val form-control" type="text" name="quantity"
                                    value="${item[1]}" min="1"><span class="plus"></span>
                            </div>
                        </div>
                    </div>
                    <div class="item-cart-info-2">
                        <p class="body-p2 d-none d-sm-block">${item[0].price * item[1]}</p><a class="btn-remove-cart"
                            href="#"></a>
                    </div>
                </div>
            </div>`;
            });

            if (cartItems.length > 0) {
                cartHtml += `
            <div class="d-flex align-items-center justify-content-between mt-25 mb-15">
                <h6 class="neutral-medium-dark">Subtotal</h6>
                <h6 class="neutral-dark">${subtotal}</h6>
            </div>`;
            } else {
                cartHtml = `
            <div class="box-empty-cart">
                <div class="icon-empty-cart"><img src="assets/imgs/template/icons/empty-cart.svg" alt="Guza"></div>
                <div class="info-empty-cart">
                    <p class="text-17 neutral-medium-dark">Your cart is empty</p><a class="link-underline" href="#">Add from Wishlist</a>
                </div>
            </div>`;
            }

            $('.list-items-cart').html(cartHtml);
        }

        // Add to wishlist
        $(".add-to-wishlist").click(function(e) {
            $(this).attr('disabled', true);
            $(this).addClass('disabled');
            const that = this;

            $.ajax({
                type: "POST",
                url: "/add-to-wishlist/" + $(this).data('product'),
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log("hello");
                    const wishlist = parseInt($("#wishlist-tag").html()) || 0;
                    $("#wishlist-tag").html(wishlist + 1);
                    $('#wishlist-tag').addClass("number-tag");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error:", textStatus, errorThrown);
                    console.log("Response:", jqXHR.responseText);
                    $("#error-alert").html("Product not found");
                    $("#error-alert").toggleClass("d-none");
                    setTimeout(() => {
                        $("#error-alert").toggleClass("d-none");
                    }, 2000);
                },
            });
        });
    </script>
</body>

</html>
