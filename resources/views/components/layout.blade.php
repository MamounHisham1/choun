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
    <style>
        .radio-badge {
            display: inline-block;
            padding: `;
            border-radius: 50px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
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

        .sticky-toast {
            position: fixed;
            top: 50px;
            right: 20px;
            z-index: 1050;
        }

        .toast-icon {
            margin-right: 10px;
        }
    </style>
    @stack('css')
    <title>Home 16 - Electronic - Multipurpose Startup SaaS HTML Template</title>
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
