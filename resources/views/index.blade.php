<x-layout>
    <section class="section icon-box-type1 wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="box-icon-type-1">
                        <div class="item-image"> <img src="assets/imgs/page/homepage3/ship.svg" alt="Guza">
                        </div>
                        <div class="item-info"> <span class="text-18">Shipping Worldwide</span></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="box-icon-type-1">
                        <div class="item-image"> <img src="assets/imgs/page/homepage4/return.svg" alt="Guza">
                        </div>
                        <div class="item-info"> <span class="text-18">60 - Days Returns</span></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="box-icon-type-1">
                        <div class="item-image"> <img src="assets/imgs/page/homepage4/payment.svg" alt="Guza"></div>
                        <div class="item-info"> <span class="text-18">Security Payment</span></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="box-icon-type-1">
                        <div class="item-image"> <img src="assets/imgs/page/homepage4/cart.svg" alt="Guza">
                        </div>
                        <div class="item-info"> <span class="text-18">Order Tracking</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section banner-homepage2 banner-homepage16">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box-swiper button-slide-square">
                        <div class="swiper-container swiper-banner pb-0">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="banner-home-16">
                                        <div class="banner-home-16-inner">
                                            <h3 class="mb-10">Grab these HOT deals, <br class="d-none d-lg-block">now!
                                            </h3>
                                            <p class="body-p1 mb-25">Limited-time savings you won’t believe on the
                                                tech you want <br class="d-none d-lg-block">want & need.</p><a
                                                class="btn btn-border" href="#">Shop now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="banner-home-16">
                                        <div class="banner-home-16-inner">
                                            <h3 class="mb-10">Grab these HOT deals, <br class="d-none d-lg-block">now!
                                            </h3>
                                            <p class="body-p1 mb-25">Limited-time savings you won’t believe on the
                                                tech you <br class="d-none d-lg-block">want & need.</p><a
                                                class="btn btn-border" href="#">Shop now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="banner-home-16">
                                        <div class="banner-home-16-inner">
                                            <h3 class="mb-10">Grab these HOT deals, <br class="d-none d-lg-block">now!
                                            </h3>
                                            <p class="body-p1 mb-25">Limited-time savings you won’t believe on the
                                                tech you <br class="d-none d-lg-block">want & need.</p><a
                                                class="btn btn-border" href="#">Shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-pagination-button">
                                <div
                                    class="swiper-pagination swiper-pagination-banner swiper-pagination-banner-style-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="banner-home-16-2">
                                <p class="text-18">SAVE 20%</p>
                                <h3 class="mb-55">Apple AirPods Max</h3><a class="btn btn-border" href="#">Buy
                                    now</a>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="banner-home-16-3">
                                <p class="text-18">NEW ARRIVALS</p>
                                <h3 class="mb-25">Macbook Air <br class="d-none d-lg-block">M2 Chip</h3><a
                                    class="btn btn-border" href="#">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section block-shop-1">
        <div class="container">
            <div class="text-center">
                <div class="box-tabs wow fadeInRight">
                    <ul class="nav nav-tabs nav-tabs-style-2 nav-tabs-style-4" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="bestsellers-tab" data-bs-toggle="tab"
                                data-bs-target="#bestsellers" type="button" role="tab" aria-controls="bestsellers"
                                aria-selected="true" data-index="1" data-items="1">Best Sellers</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="newproducts-tab" data-bs-toggle="tab"
                                data-bs-target="#newproducts" type="button" role="tab"
                                aria-controls="newproducts" aria-selected="false" data-index="2" data-items="1">New
                                Products</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="featureproducts-tab" data-bs-toggle="tab"
                                data-bs-target="#featureproducts" type="button" role="tab"
                                aria-controls="featureproducts" aria-selected="false" data-index="3"
                                data-items="1">Feature Products</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <x-tab>
                    @foreach ($bestProducts->chunk(8) as $productsChunk)
                    <x-tab-wrapper>
                        @foreach ($productsChunk as $product)
                            <x-tab-card>
                                <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                    <div class="cardImage"><a href="#"><img class="imageMain"
                                                src="{{ $product->image }}" alt="guza"><img
                                                class="imageHover" src="assets/imgs/page/homepage16/sp1.png"
                                                alt="guza"></a>
                                        <div class="button-select"><a href="#">Select Options</a></div>
                                        <div class="box-quick-button"><a class="btn" href="#">
                                                <svg class="d-inline-flex align-items-center justify-content-center"
                                                    width="28" height="28" viewbox="0 0 28 28"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_116_452)">
                                                        <path
                                                            d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                            fill=""></path>
                                                    </g>
                                                    <defs>
                                                        <clippath id="clip0_116_452">
                                                            <rect width="24" height="24" fill="white"
                                                                transform="translate(2 2)">
                                                            </rect>
                                                        </clippath>
                                                    </defs>
                                                </svg></a><a class="btn" href="#">
                                                <svg class="d-inline-flex align-items-center justify-content-center"
                                                    width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_200_1102)">
                                                        <path
                                                            d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                            fill=""></path>
                                                    </g>
                                                    <defs>
                                                        <clippath id="clip0_200_1102">
                                                            <rect width="20" height="20" fill="white"
                                                                transform="translate(2 2)">
                                                            </rect>
                                                        </clippath>
                                                    </defs>
                                                </svg></a><a class="btn preview-product" href="#">
                                                <svg class="d-inline-flex align-items-center justify-content-center"
                                                    width="28" height="28" viewbox="0 0 28 28" fill=""
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_91_73)">
                                                        <path
                                                            d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                            fill=""></path>
                                                    </g>
                                                    <defs>
                                                        <clippath id="clip0_91_73">
                                                            <rect width="24" height="24" fill="white"
                                                                transform="translate(2 2)">
                                                            </rect>
                                                        </clippath>
                                                    </defs>
                                                </svg></a></div>
                                    </div>
                                    <div class="cardInfo">
                                        <h6 class="text-17-medium mb-10">{{ $product->name }}</h6>
                                        <p class="body-p2 cardDesc"><span class="price-line">${{ $product->price }}</span><span
                                                class="price-main">${{ $product->price }}</span></p>
                                    </div>
                                </div>
                            </x-tab-card>
                        @endforeach
                    </x-tab-wrapper>
                    @endforeach
                </x-tab>
                <div class="tab-pane fade" id="newproducts" role="tabpanel">
                    <div class="box-swiper button-slide-square button-slide-square-2">
                        <div class="swiper-container swiper-tab-2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp1.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp8.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Huawei Watch Charging Cradle
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp2.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp7.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Smart Watches</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp3.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp6.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Meizu HD50 On-Ear Headphones
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp4.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp5.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Mi Power Bank 2nd 20000mAh
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp5.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp4.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Meizu EP51 Sport Bluetooth
                                                        Stereo Headset</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp6.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp3.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Huawei TalkBand B2 Smart
                                                        Bracelet</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp7.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp2.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Xiaomi Mi Bluetooth Speaker 2
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp8.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp1.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Power Bank</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp1.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp8.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Huawei Watch Charging Cradle
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp2.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp7.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Smart Watches</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp3.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp6.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Meizu HD50 On-Ear Headphones
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp4.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp5.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Mi Power Bank 2nd 20000mAh
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp5.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp4.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white" transform="translate(2 2)">
                                                                        </rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Meizu EP51 Sport Bluetooth
                                                        Stereo Headset</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp6.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp3.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Huawei TalkBand B2 Smart
                                                        Bracelet</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp7.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp2.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Xiaomi Mi Bluetooth Speaker 2
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp8.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp1.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Power Bank</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-pagination-button">
                                <div
                                    class="swiper-pagination swiper-pagination-tab-2 swiper-pagination-banner-style-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="featureproducts" role="tabpanel" aria-labelledby="haircare-tab">
                    <div class="box-swiper button-slide-square button-slide-square-2">
                        <div class="swiper-container swiper-tab-3">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp1.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp8.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Huawei Watch Charging Cradle
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp2.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp7.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Smart Watches</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp3.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp6.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Meizu HD50 On-Ear Headphones
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp4.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp5.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Mi Power Bank 2nd 20000mAh
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp5.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp4.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Meizu EP51 Sport Bluetooth
                                                        Stereo Headset</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp6.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp3.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Huawei TalkBand B2 Smart
                                                        Bracelet</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp7.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp2.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Xiaomi Mi Bluetooth Speaker 2
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp8.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp1.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Power Bank</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp1.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp8.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Huawei Watch Charging Cradle
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp2.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp7.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Smart Watches</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp3.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp6.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Meizu HD50 On-Ear Headphones
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp4.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp5.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Mi Power Bank 2nd 20000mAh
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp5.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp4.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Meizu EP51 Sport Bluetooth
                                                        Stereo Headset</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp6.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp3.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Huawei TalkBand B2 Smart
                                                        Bracelet</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp7.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp2.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Xiaomi Mi Bluetooth Speaker 2
                                                    </h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="cardProductStyle3 cardProductStyle5 wow fadeInUp">
                                                <div class="cardImage"><a href="#"><img class="imageMain"
                                                            src="assets/imgs/page/homepage16/sp8.png"
                                                            alt="guza"><img class="imageHover"
                                                            src="assets/imgs/page/homepage16/sp1.png"
                                                            alt="guza"></a>
                                                    <div class="button-select"><a href="#">Select
                                                            Options</a></div>
                                                    <div class="box-quick-button"><a class="btn"
                                                            href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_116_452)">
                                                                    <path
                                                                        d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_116_452">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_200_1102)">
                                                                    <path
                                                                        d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_200_1102">
                                                                        <rect width="20" height="20"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a><a class="btn preview-product" href="#">
                                                            <svg class="d-inline-flex align-items-center justify-content-center"
                                                                width="28" height="28" viewbox="0 0 28 28"
                                                                fill="" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_91_73)">
                                                                    <path
                                                                        d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                                        fill=""></path>
                                                                </g>
                                                                <defs>
                                                                    <clippath id="clip0_91_73">
                                                                        <rect width="24" height="24"
                                                                            fill="white"
                                                                            transform="translate(2 2)"></rect>
                                                                    </clippath>
                                                                </defs>
                                                            </svg></a></div>
                                                </div>
                                                <div class="cardInfo">
                                                    <h6 class="text-17-medium mb-10">Power Bank</h6>
                                                    <p class="body-p2 cardDesc"><span
                                                            class="price-line">$150.00</span><span
                                                            class="price-main">$100.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-pagination-button">
                                <div
                                    class="swiper-pagination swiper-pagination-tab-3 swiper-pagination-banner-style-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section banner-2-homepage16">
        <div class="container">
            <div class="text-center">
                <h2 class="color-white mb-10">Awesome tech gifts</h2>
                <p class="body-p1 color-white mb-30">Surprise them with the latest gadgets.</p><a
                    class="btn btn-border-white" href="#">Shop now</a>
            </div>
        </div>
    </section>
    <section class="section category-homepage16">
        <div class="container">
            <h3 class="mb-40">Shop by Category</h3>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="cardCategoryCircle">
                        <div class="cardImage"><a href="#"><img src="assets/imgs/page/homepage16/cat.png"
                                    alt="Guza"></a></div>
                        <div class="cardInfo">
                            <p class="text-17-medium">Mobile</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="cardCategoryCircle">
                        <div class="cardImage"><a href="#"><img src="assets/imgs/page/homepage16/cat2.png"
                                    alt="Guza"></a></div>
                        <div class="cardInfo">
                            <p class="text-17-medium">Smart home</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="cardCategoryCircle">
                        <div class="cardImage"><a href="#"><img src="assets/imgs/page/homepage16/cat3.png"
                                    alt="Guza"></a></div>
                        <div class="cardInfo">
                            <p class="text-17-medium">Home Audio</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="cardCategoryCircle">
                        <div class="cardImage"><a href="#"><img src="assets/imgs/page/homepage16/cat4.png"
                                    alt="Guza"></a></div>
                        <div class="cardInfo">
                            <p class="text-17-medium">Headphones</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="cardCategoryCircle">
                        <div class="cardImage"><a href="#"><img src="assets/imgs/page/homepage16/cat5.png"
                                    alt="Guza"></a></div>
                        <div class="cardInfo">
                            <p class="text-17-medium">Tablets</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="cardCategoryCircle">
                        <div class="cardImage"><a href="#"><img src="assets/imgs/page/homepage16/cat6.png"
                                    alt="Guza"></a></div>
                        <div class="cardInfo">
                            <p class="text-17-medium">Smart Watch</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section banner-3-homepage16">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-30">
                    <div class="box-banner-3">
                        <div class="box-banner-3-left">
                            <div class="box-banner-3-image"><img src="assets/imgs/page/homepage16/speaker.svg"
                                    alt="Guza"></div>
                            <div class="box-banner-3-info">
                                <h4 class="mb-5">Next-level audio</h4>
                                <p class="text-16 mb-20">Turn up the drama on movie night with speakers & sound
                                    barts</p><a class="btn btn-border" href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="box-banner-3-right"> <img src="assets/imgs/page/homepage16/speaker2.png"
                                alt="Guza"></div>
                    </div>
                </div>
                <div class="col-lg-6 mb-30">
                    <div class="box-banner-3 box-banner-3-2">
                        <div class="box-banner-3-left">
                            <div class="box-banner-3-image"><img src="assets/imgs/page/homepage16/smartwatch.svg"
                                    alt="Guza"></div>
                            <div class="box-banner-3-info">
                                <h4 class="mb-5">Apple Watch</h4>
                                <p class="text-16 mb-20">Give Dad the gift of Apple Watch. Now up to $70 off.</p>
                                <a class="btn btn-border" href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="box-banner-3-right"> <img src="assets/imgs/page/homepage16/smartwatch.png"
                                alt="Guza"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section block-review block-testimonials-type4">
        <div class="container">
            <div class="text-center">
                <h3 class="mb-40">Our Lovely Customers</h3>
            </div>
            <div class="box-swiper box-button-leftright box-page-style2 pb-90">
                <div class="swiper-container swiper-3-items pb-0">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="cardReview">
                                <div class="cardAuthor mb-20">
                                    <div class="cardImageAuthor"><img src="assets/imgs/page/homepage12/author.png"
                                            alt="Guza"></div>
                                    <div class="cardNameAuthor">
                                        <p class="text-17-medium">Kate Smith</p>
                                    </div>
                                </div>
                                <div class="cardRate mb-10"> <img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"><img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"><img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"><img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"><img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"></div>
                                <h6 class="mb-20">Perfect indoor play tent!</h6>
                                <div class="cardText mb-0">
                                    <h6 class="text-18">I like the way the staff advises me. Thank you for the
                                        very good quality of the case. I will come back and buy more stuff.</h6>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="cardReview">
                                <div class="cardAuthor mb-20">
                                    <div class="cardImageAuthor"><img src="assets/imgs/page/homepage12/author.png"
                                            alt="Guza"></div>
                                    <div class="cardNameAuthor">
                                        <p class="text-17-medium">Kate Smith</p>
                                    </div>
                                </div>
                                <div class="cardRate mb-10"><img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"><img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"><img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"><img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"><img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"></div>
                                <h6 class="mb-20">Perfect indoor play tent!</h6>
                                <div class="cardText mb-0">
                                    <h6 class="text-18">I like the way the staff advises me. Thank you for the
                                        very good quality of the case. I will come back and buy more stuff.</h6>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="cardReview">
                                <div class="cardAuthor mb-20">
                                    <div class="cardImageAuthor"><img src="assets/imgs/page/homepage12/author.png"
                                            alt="Guza"></div>
                                    <div class="cardNameAuthor">
                                        <p class="text-17-medium">Kate Smith</p>
                                    </div>
                                </div>
                                <div class="cardRate mb-10"> <img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"><img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"><img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"><img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"><img src="assets/imgs/template/icons/star.svg"
                                        alt="Guza"></div>
                                <h6 class="mb-20">Perfect indoor play tent!</h6>
                                <div class="cardText mb-0">
                                    <h6 class="text-18">I like the way the staff advises me. Thank you for the
                                        very good quality of the case. I will come back and buy more stuff.</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-pagination-button">
                    <div class="swiper-pagination swiper-pagination-items-3"></div>
                </div>
                <div class="swiper-button-prev swiper-button-prev-items-3 btn-prev-style-1"></div>
                <div class="swiper-button-next swiper-button-next-items-3 btn-next-style-1"></div>
            </div>
        </div>
    </section>
</x-layout>
