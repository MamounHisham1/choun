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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/imgs/.template/favicon.svg">
    <link href="/assets/css/style.css?v=1.0.0" rel="stylesheet">
    <link href="/assets/css/modern.css?v=1.0.0" rel="stylesheet">
    <style>
        .radio-badge {
            display: inline-block;
            margin: 0;
            border-radius: 12px;
            border: 2px solid #e5e7eb;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 600;
            background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            position: relative;
            overflow: hidden;
        }

        .radio-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        .radio-badge:hover {
            border-color: #4f46e5;
            background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
            box-shadow: 0 4px 16px rgba(79, 70, 229, 0.15);
            transform: translateY(-2px);
        }

        .radio-badge:hover::before {
            left: 100%;
        }

        .radio-badge input[type="radio"] {
            display: none;
        }

        .radio-badge input[type="radio"]:checked + .badge-content {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: #ffffff;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        .radio-badge input[type="radio"]:checked + .badge-content::after {
            content: '✓';
            position: absolute;
            top: -2px;
            right: 4px;
            font-size: 0.75rem;
            font-weight: bold;
            color: #ffffff;
        }

        .badge-content {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 10px;
            border: 2px solid transparent;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: #374151;
            background-color: inherit;
            position: relative;
            min-width: 60px;
            text-align: center;
        }

        .badge-icon {
            margin-right: 8px;
            vertical-align: middle;
        }

        .block-color {
            margin-bottom: 24px;
            padding: 16px 0;
            border-bottom: 1px solid rgba(229, 231, 235, 0.5);
        }

        .block-color:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .block-color span:first-child {
            font-weight: 700;
            font-size: 1.1rem;
            color: #1f2937;
            margin-right: 10px;
            margin-bottom: 12px;
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
        }

        .block-color span:first-child::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 30px;
            height: 2px;
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
            border-radius: 1px;
        }

        .sticky-toast {
            position: fixed;
            top: 50px;
            right: 20px;
            z-index: 1050;
        }

        .toast-icon {
            margin-right: 10px;
        }

        .attributes-section {
            background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
            border: 1px solid rgba(79, 70, 229, 0.1);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 4px 20px rgba(79, 70, 229, 0.08);
            position: relative;
            overflow: hidden;
        }

        .attributes-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #4f46e5, #7c3aed, #ec4899);
            border-radius: 16px 16px 0 0;
        }

        .attribute-label {
            font-weight: 700;
            font-size: 1.1rem;
            color: #1f2937;
            display: block;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
        }

        .attribute-label::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 30px;
            height: 2px;
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
            border-radius: 1px;
        }

        .attribute-values {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .attribute-values:last-child {
            margin-bottom: 0;
        }

        /* Responsive design for attributes */
        @media (max-width: 768px) {
            .attributes-section {
                padding: 20px 16px;
                margin-bottom: 20px;
            }
            
            .attribute-label {
                font-size: 1rem;
                margin-bottom: 10px;
            }
            
            .badge-content {
                padding: 10px 16px;
                font-size: 0.8rem;
                min-width: 50px;
            }
            
            .attribute-values {
                gap: 6px;
            }
        }

        /* Animation for attributes section */
        .attributes-section {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Enhanced focus states for accessibility */
        .radio-badge input[type="radio"]:focus + .badge-content {
            outline: 2px solid #4f46e5;
            outline-offset: 2px;
        }

        /* Special styling for color attributes */
        .attribute-values.color-values .radio-badge {
            border-radius: 50%;
            width: 48px;
            height: 48px;
            padding: 0;
            margin: 4px;
        }

        .attribute-values.color-values .badge-content {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0;
        }

        .attribute-values.color-values .radio-badge input[type="radio"]:checked + .badge-content::after {
            content: '✓';
            font-size: 1rem;
            color: #ffffff;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        }
    </style>
    @stack('css')
    <title>{{ env('APP_NAME') }} - {{ $title ?? 'Home' }}</title>
</head>

<body>
    <div class="toast-container sticky-toast">
        <div id="flashToast" class="toast text-white" role="alert"
            style="display: none;">
            <div class="toast-body d-flex align-items-center">
                <i id="toastIcon" class="toast-icon"></i>
                <span id="toastMessage"></span>
                <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    {{-- <x-loader /> --}}
    <x-header />
    <main class="main">

        {{ $slot }}

    </main>
    <x-footer />
    <x-popup-preview />
    <div class="box-popup-search ele-popup-search" id="searchPopup">
        <div class="box-search-overlay"></div>
<div class="box-search-wrapper"><a class="btn-close-popup" href="#">
        <svg class="icon-16 d-inline-flex align-items-center justify-content-center" fill="#111111" stroke="#111111"
            width="24" height="24" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
            </path>
        </svg></a>
    <h5 class="mb-15">Search products</h5>
        <livewire:search />
        </div>
    </div>
    <x-popup-account />
    <livewire:slider-cart />
    <x-popup-wishlist />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/.bootstrapmin.js"></script>
    <script src="/assets/js/vendors/modernizr-3.6.0.min.js"></script>
    <script src="/assets/js/vendors/jquery-3.7.0.min.js"></script>
    <script src="/assets/js/vendors/jquery-migrate-3.3.0.min.js"></script>
    <script src="/assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/vendors/waypoints.js"></script>
    <script src="/assets/js/vendors/wow.js"></script>
    <script src="/assets/js/vendors/magnific-popup.js"></script>
    <script src="/assets/js/vendors/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/vendors/select2.min.js"></script>
    <script src="/assets/js/vendors/isotope.js"></script>
    <script src="/assets/js/vendors/swiper-bundle.min.js"></script>
    <script src="/assets/js/vendors/counterup.js"></script>
    <script src="/assets/js/vendors/jquery.countdown.min.js"></script>
    <script src="/assets/js/vendors/slick.js"></script>
    <script src="/assets/js/vendors/jquery.timepicker.min.js"></script>
    <script src="/assets/js/vendors/glightbox.min.js"></script>
    <script src="/assets/js/main.js?v=1.0.0"></script>
    @livewireScripts
    @stack('scripts')

    <script>
        $(document).ready(function() {
            const bgClass = '{{ session('toast.bg') }}';
            const message = '{{ session('toast.message') }}';

            // Display the toast on page load
            @if (session()->has('toast'))
                showToast(bgClass, message);
            @endif
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
                        const wishlist = parseInt($("#wishlist-tag").html()) || 0;
                        $("#wishlist-tag").html(wishlist + 1);
                        $('#wishlist-tag').addClass("number-tag");
                        showToast(data.bg, data.message);
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

        });
        function showToast(bgClass, message) {
            const flashToast = $('#flashToast');

            // Update the background color and message
            flashToast.removeClass().addClass('toast text-white bg-' + bgClass);
            $('#toastMessage').text(message);

            // Set the correct icon based on the background class
            let iconClass = '';
            switch (bgClass) {
                case 'success':
                    iconClass = 'bi-check-circle-fill';
                    break;
                case 'danger':
                    iconClass = 'bi-exclamation-triangle-fill';
                    break;
                case 'info':
                    iconClass = 'bi-info-circle-fill';
                    break;
                case 'warning':
                    iconClass = 'bi-exclamation-diamond-fill';
                    break;
            }
            $('#toastIcon').removeClass().addClass('toast-icon bi ' + iconClass);

            // Show the toast
            flashToast.show().toast({
                autohide: true,
                delay: 5000 // 5 seconds delay
            }).toast('show');
        }
    </script>
</body>

</html>
