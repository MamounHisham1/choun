<x-layout>
    <x-categories-layout>

        <x-categories-container>
            <div class="box-shop-category-top">
                <div class="box-swiper">
                    <div class="swiper-container swiper-6-items pb-0">
                        <div class="swiper-wrapper">
                            @foreach ($categories as $category)
                                <div class="swiper-slide">
                                    <div class="cardCategorySmall cardCategorySmallStyle2 wow fadeInUp">
                                        <div class="cardImage"><a href="{{ $category->id }}"><img
                                                    src="{{ $category->image_url }}" alt="Guza"></a>
                                        </div>
                                        <div class="cardInfo"><a href="/shop/categories/{{ $category->id }}">
                                                <h4 class="cardTitle">{{ $category->name }}
                                                    ({{ $category->products->count() }})
                                                </h4>
                                            </a></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="box-pagination-button box-pagination-leftright">
                        <div class="swiper-pagination swiper-pagination-6"></div>
                        <div class="swiper-button-prev swiper-button-prev-6 btn-prev-style-1"></div>
                        <div class="swiper-button-next swiper-button-next-6 btn-next-style-1"></div>
                    </div>
                </div>
            </div>
            <div class="box-filter-top">
                <div class="wrapper-overlay"></div>
                <div class="box-filters box-filters-left"> <span class="body-p2 neutral-medium-dark">Filter by</span>
                    <x-dropdown buttonName="Categories" id="dropdownCat">
                        <div class="dropdown-menu dropdown-menu-light dropdown-menu-filter dropdown-menu-category"
                            style="margin: 0px;">
                            <div class="box-dropdown-filter">
                                <h6 class="head-filter">Categories</h6>
                                <div class="box-collapse">
                                    <ul class="list-filter-checkbox">
                                        @foreach ($categories as $category)
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-small">{{ $category->name }} <span
                                                            class="neutral-medium">({{ $category->products->count() }})</span></span><span
                                                        class="checkmark"></span>
                                                </label><span class="arrow-down"></span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </x-dropdown>
                </div>
                <div class="box-sort">
                    <div class="box-sortby d-flex align-items-center">
                        <div class="dropdown dropdown-sort">
                            <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Default Sorting</button>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort"
                                style="margin: 0px;">
                                <li><a class="dropdown-item active" href="#">Default Sorting</a></li>
                                <li><a class="dropdown-item" href="#">Oldest products</a></li>
                                <li><a class="dropdown-item" href="#">Comments products </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-view-style"> <a class="view-type view-2" href="#" data-col="2"></a><a
                            class="view-type view-3 active" href="#" data-col="3"></a><a
                            class="view-type view-4" href="#" data-col="4"></a><a class="view-type view-5"
                            href="#" data-col="5"></a></div>
                </div>
            </div>
        </x-categories-container>

        <div class="wrapper-overlay"></div>
        <div class="block-filter-middle block-filter-canvas wrapper-popup">
            <div class="container">
                <div class="box-filters-sidebar">
                    <h5 class="title-filter">Filter</h5>
                    <div class="block-filter">
                        <h6 class="item-collapse">Categories</h6>
                        <div class="box-collapse scrollFilter">
                            <ul class="list-filter-checkbox">
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Womens <span
                                                class="neutral-medium">(12)</span></span><span class="checkmark"></span>
                                    </label><span class="arrow-down"></span>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Mens <span
                                                class="neutral-medium">(9)</span></span><span class="checkmark"></span>
                                    </label><span class="arrow-down"></span>
                                    <ul>
                                        <li>
                                            <label class="cb-container">
                                                <input type="checkbox"><span class="text-small">Hats<span
                                                        class="neutral-medium">(4)</span></span><span
                                                    class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="cb-container">
                                                <input type="checkbox"><span class="text-small">Glasses <span
                                                        class="neutral-medium">(3)</span></span><span
                                                    class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="cb-container">
                                                <input type="checkbox"><span class="text-small">Jeans<span
                                                        class="neutral-medium">(2)</span></span><span
                                                    class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Kids <span
                                                class="neutral-medium">(15)</span></span><span
                                            class="checkmark"></span>
                                    </label><span class="arrow-down"></span>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Gifts <span
                                                class="neutral-medium">(10)</span></span><span
                                            class="checkmark"></span>
                                    </label><span class="arrow-down"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="block-filter">
                        <h6 class="item-collapse">Colors </h6>
                        <div class="box-collapse scrollFilter">
                            <ul class="list-colors">
                                <li class="active">
                                    <div class="box-colors">
                                        <div class="item-color color-4"></div>
                                        <label>Blue</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="box-colors">
                                        <div class="item-color color-3"></div>
                                        <label>Grey</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="box-colors">
                                        <div class="item-color color-5"></div>
                                        <label>Red</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="box-colors">
                                        <div class="item-color color-6"></div>
                                        <label>Yellow</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="block-filter">
                        <h6 class="item-collapse">Size </h6>
                        <div class="box-collapse scrollFilter">
                            <div class="block-size">
                                <div class="list-sizes"><span class="item-size">XS </span><span
                                        class="item-size active">S </span><span class="item-size">M </span><span
                                        class="item-size">XL </span></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-filter">
                        <h6 class="item-collapse">Brand </h6>
                        <div class="box-collapse scrollFilter">
                            <ul class="list-filter-checkbox">
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Adidas</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Chloe</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Kendo</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Nike</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Adidas</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="block-filter">
                        <h6 class="item-collapse">Price </h6>
                        <div class="box-collapse scrollFilter">
                            <ul class="list-filter-checkbox">
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">$10.00 -
                                            $49.00</span><span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">$50.00 -
                                            $99.00</span><span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">$100.00 -
                                            $199.00</span><span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">$200.00 +</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-categories-container>
            <div class="box-your-filter box-your-filter-shop2">
                <div class="block-text-filter"><span class="body-p2 neutral-medium-dark">Your filter</span></div>
                <div class="block-ele-filter"><a class="btn btn-tag-filter" href="#">XS<span
                            class="close-tag"></span></a><a class="btn btn-tag-filter" href="#">Women<span
                            class="close-tag"></span></a><a class="clear-filter link-underline" href="#">Clear
                        All</a></div>
            </div>
            <div class="box-list-products box-list-products-4 box-list-products-shop-2">
                @foreach ($products as $product)
                    <div class="product-item">
                        <div class="cardProduct wow fadeInUp">
                            <div class="cardImage"><a href="/shop/{{ $product->id }}/show"><img class="imageMain" src="{{ $product->image_url }}"
                                        alt="guza"><img class="imageHover" src="{{ $product->image_url }}" alt="guza"></a>
                                <div class="button-select">
                                    <a href="/shop/{{ $product->id }}/show">More Details</a>
                                </div>
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
                                                        transform="translate(2 2)"></rect>
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
                                                        transform="translate(2 2)"></rect>
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
                                                        transform="translate(2 2)"></rect>
                                                </clippath>
                                            </defs>
                                        </svg></a></div>
                            </div>
                            <div class="cardInfo">
                                <a href="/shop/{{ $product->id }}/show">
                                    <h6 class="text-16-medium cardTitle">{{ $product->name }}</h6>
                                </a>
                                <p class="body-p2 cardDesc">{{ Number::currency($product->price, 'USD') }}</p>
                                <div class="box-colors">
                                    <div class="item-color color-1"></div>
                                    <div class="item-color color-2"></div>
                                    <div class="item-color color-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->render('vendor.pagination.bootstrap-5') }}
        </x-categories-container>
    </x-categories-layout>
</x-layout>
