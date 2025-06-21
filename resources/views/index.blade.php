<x-layout>
    @if (Session::has('message'))
        <x-alert>{{ Session::get('message') }}</x-alert>
    @endif
    <section class="section icon-box-type1 wow fadeInUp">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-3 col-sm-6">
                    <div class="box-icon-type-1">
                        <div class="item-image"> <img src="/assets/imgs/template/icons/shipping_world_wide.png"
                                alt="choun">
                        </div>
                        <div class="item-info"> <span class="text-18">Shipping Worldwide</span></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="box-icon-type-1">
                        <div class="item-image"> <img src="/assets/imgs/template/icons/sixty_days_return.png"
                                alt="choun">
                        </div>
                        <div class="item-info"> <span class="text-18">60 - Days Returns</span></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="box-icon-type-1">
                        <div class="item-image"> <img src="/assets/imgs/template/icons/security_payment.png"
                                alt="choun"></div>
                        <div class="item-info"> <span class="text-18">Security Payment</span></div>
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
                                @foreach ($homeFirstBanner as $banner)
                                    <div class="swiper-slide">
                                        <div class="banner-home-16">
                                            <div class="banner-home-16-inner">
                                                <h3 class="mb-10">{{ $banner['message'] }}</h3>
                                                <div class="body-p1 mb-25">{!! $banner['description'] !!}</div>
                                                <a class="btn btn-border" href="#">Shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
                        @foreach ($homeOffers as $offer)
                            <div class="home-offer-card d-flex align-items-center">
                                <div class="offer-content">
                                    <p class="offer-message">{{ $offer['message'] }}</p>
                                    <h2 class="offer-title">{{ $offer['product']->name }}</h2>
                                    <a href="/shop/{{ $offer['product']->slug }}" class="offer-btn">Learn more</a>
                                </div>
                                <div class="offer-image">
                                    <img src="{{ $offer['product']->image_url }}" alt="{{ $offer['product']->name }}">
                                </div>
                            </div>
                        @endforeach
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
                                data-bs-target="#newproducts" type="button" role="tab" aria-controls="newproducts"
                                aria-selected="false" data-index="2" data-items="1">New
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
                <x-tab id="bestsellers" class="show active">
                    @foreach ($bestProducts->chunk(8) as $productsChunk)
                        <x-tab-wrapper>
                            @foreach ($productsChunk as $product)
                                <x-tab-card>
                                    <div class="cardProductModern wow fadeInUp">
                                        <div class="cardImage"><a href="/shop/{{ $product->slug }}"><img class="imageMain"
                                                    src="{{ $product->image_url }}" alt="choun"><img
                                                    class="imageHover" src="{{ $product->images->last()?->getUrl() }}"
                                                    alt="choun"></a>
                                            <div class="button-select">
                                                <a href="/shop/{{ $product->slug }}">Select Options</a>
                                            </div>
                                            <div class="box-quick-button">
                                                <a class="btn add-to-wishlist" href="javascript:void(0);"
                                                    data-product="{{ $product->id }}">
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
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="cardInfo">
                                            <a href="/shop/{{ $product->slug }}">
                                                <h6 class="text-17-medium mb-10">{{ $product->name }}</h6>
                                            </a>
                                            <p class="body-p2 cardDesc"><span
                                                    class="price-line">${{ $product->price }}</span><span
                                                    class="price-main">${{ $product->price }}</span></p>
                                        </div>
                                    </div>
                                </x-tab-card>
                            @endforeach
                        </x-tab-wrapper>
                    @endforeach
                </x-tab>
                <x-tab id="newproducts" tab="2">
                    @foreach ($latestProducts->chunk(8) as $productsChunk)
                        <x-tab-wrapper>
                            @foreach ($productsChunk as $product)
                                <x-tab-card>
                                    <div class="cardProductModern wow fadeInUp">
                                        <div class="cardImage"><a href="/shop/{{ $product->slug }}"><img class="imageMain"
                                                    src="{{ $product->image_url }}" alt="choun"><img
                                                    class="imageHover"
                                                    src="{{ $product->images->last()?->getUrl() }}"
                                                    alt="choun"></a>
                                            <div class="button-select">
                                                <a href="/shop/{{ $product->slug }}">Select Options</a>
                                            </div>
                                            <div class="box-quick-button">
                                                <a class="btn add-to-wishlist" href="javascript:void(0);"
                                                    data-product="{{ $product->id }}">
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
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="cardInfo">
                                            <a href="/shop/{{ $product->slug }}">
                                                <h6 class="text-17-medium mb-10">{{ $product->name }}</h6>
                                            </a>
                                            <p class="body-p2 cardDesc"><span
                                                    class="price-line">${{ $product->price }}</span><span
                                                    class="price-main">${{ $product->price }}</span></p>
                                        </div>
                                    </div>
                                </x-tab-card>
                            @endforeach
                        </x-tab-wrapper>
                    @endforeach
                </x-tab>
                <x-tab id="featureproducts" tab="3">
                    @foreach ($featuredProducts->chunk(8) as $productsChunk)
                        <x-tab-wrapper>
                            @foreach ($productsChunk as $product)
                                <x-tab-card>
                                    <div class="cardProductModern wow fadeInUp">
                                        <div class="cardImage"><a href="/shop/{{ $product->slug }}"><img class="imageMain"
                                                    src="{{ $product->image_url }}" alt="choun"><img
                                                    class="imageHover"
                                                    src="{{ $product->images->last()?->getUrl() }}"
                                                    alt="choun"></a>
                                            <div class="button-select">
                                                <a href="/shop/{{ $product->slug }}">Select Options</a>
                                            </div>
                                            <div class="box-quick-button">
                                                <a class="btn add-to-wishlist" href="javascript:void(0);"
                                                    data-product="{{ $product->id }}">
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
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="cardInfo">
                                            <a href="/shop/{{ $product->slug }}">
                                                <h6 class="text-17-medium mb-10">{{ $product->name }}</h6>
                                            </a>
                                            <p class="body-p2 cardDesc"><span
                                                    class="price-line">${{ $product->price }}</span><span
                                                    class="price-main">${{ $product->price }}</span></p>
                                        </div>
                                    </div>
                                </x-tab-card>
                            @endforeach
                        </x-tab-wrapper>
                    @endforeach
                </x-tab>
            </div>
        </div>
    </section>
    @if ($homeSecondBanner)
        <section class="section banner-2-homepage16">
            <div class="container">
                <div class="text-center">
                    <h2 class="color-white mb-10">{{ $homeSecondBanner['category']->name }}</h2>
                    <div class="body-p1 color-white mb-30">{!! $homeSecondBanner['message'] !!}</div>
                    <a class="btn btn-border-white"
                        href="/shop/categories/{{ $homeSecondBanner['category']->slug }}">Shop now</a>
                </div>
            </div>
        </section>
    @endif
    @if ($categories)
        <section class="section category-homepage16">
            <div class="container">
                <h3 class="mb-40">Shop by Category</h3>
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="cardCategoryCircle">
                                <div class="cardImage"><a href="/shop/categories/{{ $category->slug }}"><img
                                            src="{{ $category->image_url }}" alt="choun"></a></div>
                                <div class="cardInfo">
                                    <p class="text-17-medium">{{ $category->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- <section class="section banner-3-homepage16">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-30">
                    <div class="box-banner-3">
                        <div class="box-banner-3-left">
                            <div class="box-banner-3-image"><img src="assets/imgs/page/homepage16/speaker.svg"
                                    alt="choun"></div>
                            <div class="box-banner-3-info">
                                <h4 class="mb-5">Next-level audio</h4>
                                <p class="text-16 mb-20">Turn up the drama on movie night with speakers & sound
                                    barts</p><a class="btn btn-border" href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="box-banner-3-right"> <img src="assets/imgs/page/homepage16/speaker2.png"
                                alt="choun"></div>
                    </div>
                </div>
                <div class="col-lg-6 mb-30">
                    <div class="box-banner-3 box-banner-3-2">
                        <div class="box-banner-3-left">
                            <div class="box-banner-3-image"><img src="assets/imgs/page/homepage16/smartwatch.svg"
                                    alt="choun"></div>
                            <div class="box-banner-3-info">
                                <h4 class="mb-5">Apple Watch</h4>
                                <p class="text-16 mb-20">Give Dad the gift of Apple Watch. Now up to $70 off.</p>
                                <a class="btn btn-border" href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="box-banner-3-right"> <img src="assets/imgs/page/homepage16/smartwatch.png"
                                alt="choun"></div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
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
                                            alt="choun"></div>
                                    <div class="cardNameAuthor">
                                        <p class="text-17-medium">Kate Smith</p>
                                    </div>
                                </div>
                                <div class="cardRate mb-10"> <img src="assets/imgs/template/icons/star.svg"
                                        alt="choun"><img src="assets/imgs/template/icons/star.svg"
                                        alt="choun"><img src="assets/imgs/template/icons/star.svg"
                                        alt="choun"><img src="assets/imgs/template/icons/star.svg"
                                        alt="choun"><img src="assets/imgs/template/icons/star.svg" alt="choun">
                                </div>
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
                                            alt="choun"></div>
                                    <div class="cardNameAuthor">
                                        <p class="text-17-medium">Kate Smith</p>
                                    </div>
                                </div>
                                <div class="cardRate mb-10"><img src="assets/imgs/template/icons/star.svg"
                                        alt="choun"><img src="assets/imgs/template/icons/star.svg"
                                        alt="choun"><img src="assets/imgs/template/icons/star.svg"
                                        alt="choun"><img src="assets/imgs/template/icons/star.svg"
                                        alt="choun"><img src="assets/imgs/template/icons/star.svg" alt="choun">
                                </div>
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
                                            alt="choun"></div>
                                    <div class="cardNameAuthor">
                                        <p class="text-17-medium">Kate Smith</p>
                                    </div>
                                </div>
                                <div class="cardRate mb-10"> <img src="assets/imgs/template/icons/star.svg"
                                        alt="choun"><img src="assets/imgs/template/icons/star.svg"
                                        alt="choun"><img src="assets/imgs/template/icons/star.svg"
                                        alt="choun"><img src="assets/imgs/template/icons/star.svg"
                                        alt="choun"><img src="assets/imgs/template/icons/star.svg" alt="choun">
                                </div>
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
