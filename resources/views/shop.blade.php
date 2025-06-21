<x-layout title="Shop">
    @push('css')
        <style>
            .color-label {
                margin-right: 8px;
                /* Add space between circles */
                cursor: pointer;
            }

            .color-circle {
                width: 24px;
                height: 24px;
                border-radius: 50%;
                border: 2px solid #ccc;
                transition: border-color 0.3s;
            }

            input[type="radio"]:checked+.color-circle {
                border-color: #000;
                /* Change to a different color when active */
            }
        </style>
    @endpush
    <section class="section block-banner-shop">
        <div class="container">
            <h1 class="text-56-medium">Shop</h1>
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Home </a></li>
                    <li><a href="#">Shop</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section block-content-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="wrapper-overlay"></div>
                    <x-forms.form method="GET" action="/shop/filter">
                        <div class="box-filters-sidebar">
                            <h5 class="title-filter">Filter</h5>
                            <div class="block-filter">
                                <h6 class="item-collapse">Categories</h6>
                                <div class="box-collapse scrollFilter">
                                    <ul class="list-filter-checkbox">
                                        @foreach ($categories as $category)
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" name="categories[]"
                                                        value="{{ $category->id }}" multiple
                                                        @checked(in_array($category->id, request('categories') ?? [])) />
                                                    <span class="text-small">{{ $category->name }}
                                                        <span
                                                            class="neutral-medium">({{ $category->products->count() }})</span>
                                                    </span>
                                                    <span class="checkmark"></span> </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="block-filter">
                                <h6 class="item-collapse">Brand</h6>
                                <div class="box-collapse scrollFilter">
                                    <ul class="list-filter-checkbox">
                                        @foreach ($brands as $brand)
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                                                        multiple @checked(in_array($brand->id, request('brands') ?? [])) /><span
                                                        class="text-small">{{ $brand->name }}</span><span
                                                        class="checkmark"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="block-filter">
                                <h6 class="item-collapse">Price</h6>
                                <div class="box-collapse scrollFilter">
                                    <ul class="list-filter-checkbox">
                                        <li>
                                            <label class="cb-container">
                                                <input type="radio" name="price" value="0" checked><span
                                                    class="text-small">All</span><span class="checkmark"></span>
                                            </label>
                                        </li>
                                        @foreach ($prices as $price)
                                            <li>
                                                <label class="cb-container">
                                                    <input type="radio" name="price"
                                                        value="{{ implode('_', $price) }}"
                                                        @checked(request('price') == implode('_', $price))><span
                                                        class="text-small">${{ implode(' - $', $price) }}</span><span
                                                        class="checkmark"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3"
                                style="padding: 0.375rem 0.75rem;">Submit</button>
                        </div>
                    </x-forms.form>
                </div>
                <div class="col-lg-9">
                    <div class="box-filter-top">
                        <div class="show-sm">
                            <a class="btn-open-filter" href="#">Filter
                            </a>
                        </div>
                        <div class="number-product">
                            <p class="body-p2 neutral-medium-dark">
                                Showing {{ $products->count() }} of {{ $products->total() }} products
                            </p>
                        </div>
                        <div class="box-sort">
                            <div class="box-sortby d-flex align-items-center">
                                <div class="dropdown dropdown-sort">
                                    <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Default Sorting
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort"
                                        style="margin: 0px">
                                        <li>
                                            <a class="dropdown-item active" href="#">Default Sorting</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Oldest products</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Comments products
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-view-style">
                                <a class="view-type view-2" href="#" data-col="2"></a><a
                                    class="view-type view-3 active" href="#" data-col="3"></a><a
                                    class="view-type view-4" href="#" data-col="4"></a><a
                                    class="view-type view-5" href="#" data-col="5"></a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="box-your-filter">
                        <div class="block-text-filter">
                            <span class="body-p2 neutral-medium-dark">Your filter</span>
                        </div>
                        <div class="block-ele-filter">
                            <a class="btn btn-tag-filter" href="#">XS<span class="close-tag"></span></a><a
                                class="btn btn-tag-filter" href="#">Women<span class="close-tag"></span></a><a
                                class="clear-filter link-underline" href="#">Clear All</a>
                        </div>
                    </div> --}}
                    <div class="box-list-products">
                        @foreach ($products as $product)
                            <div class="product-item">
                                <div class="cardProductModern wow fadeInUp">
                                    <div class="cardImage" style="!important; background-color: white;"><a href="/shop/{{ $product->slug }}"><img class="imageMain"
                                                style="object-fit: contain;"
                                                src="{{ $product->image_url }}" alt="choun"><img class="imageHover"
                                                style="object-fit: contain;"
                                                src="{{ $product->images->last()?->getUrl() }}" alt="choun"></a>
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
                                                class="price-line">${{ $product->price }}</span>
                                            {{-- <span class="price-main">${{ $product->price }}</span> --}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $products->render('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="section block-may-also-like">
        <div class="container">
            <div class="text-center">
                <h3 class="mb-60">Recently Viewed Products</h3>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="cardProduct wow fadeInUp">
                        <div class="cardImage">
                            <a href="#"><img class="imageMain" src="assets/imgs/page/homepage1/product8.png"
                                    alt="choun" /><img class="imageHover"
                                    src="assets/imgs/page/homepage1/product1-hover.png" alt="choun" /></a>
                            <div class="button-select">
                                <a href="#">Select Options</a>
                            </div>
                            <div class="box-quick-button">
                                <a class="btn" href="#">
                                    <svg class="d-inline-flex align-items-center justify-content-center" width="28"
                                        height="28" viewbox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_116_452)">
                                            <path
                                                d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                fill=""></path>
                                        </g>
                                        <defs>
                                            <clippath id="clip0_116_452">
                                                <rect width="24" height="24" fill="white" transform="translate(2 2)">
                                                </rect>
                                            </clippath>
                                        </defs>
                                    </svg></a><a class="btn" href="#">
                                    <svg class="d-inline-flex align-items-center justify-content-center" width="24"
                                        height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_200_1102)">
                                            <path
                                                d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                fill=""></path>
                                        </g>
                                        <defs>
                                            <clippath id="clip0_200_1102">
                                                <rect width="20" height="20" fill="white" transform="translate(2 2)">
                                                </rect>
                                            </clippath>
                                        </defs>
                                    </svg></a><a class="btn preview-product" href="#">
                                    <svg class="d-inline-flex align-items-center justify-content-center" width="28"
                                        height="28" viewbox="0 0 28 28" fill="" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_91_73)">
                                            <path
                                                d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                fill=""></path>
                                        </g>
                                        <defs>
                                            <clippath id="clip0_91_73">
                                                <rect width="24" height="24" fill="white" transform="translate(2 2)">
                                                </rect>
                                            </clippath>
                                        </defs>
                                    </svg></a>
                            </div>
                        </div>
                        <div class="cardInfo">
                            <a href="#">
                                <h6 class="text-16-medium cardTitle">
                                    Lace Shirt Cut II
                                </h6>
                            </a>
                            <p class="body-p2 cardDesc">$16.00</p>
                            <div class="box-colors">
                                <div class="item-color color-1"></div>
                                <div class="item-color color-2"></div>
                                <div class="item-color color-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="cardProduct wow fadeInUp">
                        <div class="cardImage">
                            <a href="#"><img class="imageMain" src="assets/imgs/page/homepage1/product7.png"
                                    alt="choun" /><img class="imageHover"
                                    src="assets/imgs/page/homepage1/product1-hover.png" alt="choun" /></a>
                            <div class="button-select">
                                <a href="#">Select Options</a>
                            </div>
                            <div class="box-quick-button">
                                <a class="btn" href="#">
                                    <svg class="d-inline-flex align-items-center justify-content-center" width="28"
                                        height="28" viewbox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_116_452)">
                                            <path
                                                d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                fill=""></path>
                                        </g>
                                        <defs>
                                            <clippath id="clip0_116_452">
                                                <rect width="24" height="24" fill="white" transform="translate(2 2)">
                                                </rect>
                                            </clippath>
                                        </defs>
                                    </svg></a><a class="btn" href="#">
                                    <svg class="d-inline-flex align-items-center justify-content-center" width="24"
                                        height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_200_1102)">
                                            <path
                                                d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                fill=""></path>
                                        </g>
                                        <defs>
                                            <clippath id="clip0_200_1102">
                                                <rect width="20" height="20" fill="white" transform="translate(2 2)">
                                                </rect>
                                            </clippath>
                                        </defs>
                                    </svg></a><a class="btn preview-product" href="#">
                                    <svg class="d-inline-flex align-items-center justify-content-center" width="28"
                                        height="28" viewbox="0 0 28 28" fill="" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_91_73)">
                                            <path
                                                d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                fill=""></path>
                                        </g>
                                        <defs>
                                            <clippath id="clip0_91_73">
                                                <rect width="24" height="24" fill="white" transform="translate(2 2)">
                                                </rect>
                                            </clippath>
                                        </defs>
                                    </svg></a>
                            </div>
                        </div>
                        <div class="cardInfo">
                            <a href="#">
                                <h6 class="text-16-medium cardTitle">
                                    Lace Shirt Cut II
                                </h6>
                            </a>
                            <p class="body-p2 cardDesc">$16.00</p>
                            <div class="box-colors">
                                <div class="item-color color-1"></div>
                                <div class="item-color color-2"></div>
                                <div class="item-color color-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="cardProduct wow fadeInUp">
                        <div class="cardImage">
                            <a href="#"><img class="imageMain" src="assets/imgs/page/homepage1/product6.png"
                                    alt="choun" /><img class="imageHover"
                                    src="assets/imgs/page/homepage1/product1-hover.png" alt="choun" /></a>
                            <div class="button-select">
                                <a href="#">Select Options</a>
                            </div>
                            <div class="box-quick-button">
                                <a class="btn" href="#">
                                    <svg class="d-inline-flex align-items-center justify-content-center" width="28"
                                        height="28" viewbox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_116_452)">
                                            <path
                                                d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                fill=""></path>
                                        </g>
                                        <defs>
                                            <clippath id="clip0_116_452">
                                                <rect width="24" height="24" fill="white" transform="translate(2 2)">
                                                </rect>
                                            </clippath>
                                        </defs>
                                    </svg></a><a class="btn" href="#">
                                    <svg class="d-inline-flex align-items-center justify-content-center" width="24"
                                        height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_200_1102)">
                                            <path
                                                d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                fill=""></path>
                                        </g>
                                        <defs>
                                            <clippath id="clip0_200_1102">
                                                <rect width="20" height="20" fill="white" transform="translate(2 2)">
                                                </rect>
                                            </clippath>
                                        </defs>
                                    </svg></a><a class="btn preview-product" href="#">
                                    <svg class="d-inline-flex align-items-center justify-content-center" width="28"
                                        height="28" viewbox="0 0 28 28" fill="" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_91_73)">
                                            <path
                                                d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                fill=""></path>
                                        </g>
                                        <defs>
                                            <clippath id="clip0_91_73">
                                                <rect width="24" height="24" fill="white" transform="translate(2 2)">
                                                </rect>
                                            </clippath>
                                        </defs>
                                    </svg></a>
                            </div>
                        </div>
                        <div class="cardInfo">
                            <a href="#">
                                <h6 class="text-16-medium cardTitle">
                                    Lace Shirt Cut II
                                </h6>
                            </a>
                            <p class="body-p2 cardDesc">$16.00</p>
                            <div class="box-colors">
                                <div class="item-color color-1"></div>
                                <div class="item-color color-2"></div>
                                <div class="item-color color-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="cardProduct wow fadeInUp">
                        <div class="cardImage">
                            <a href="#"><img class="imageMain" src="assets/imgs/page/homepage1/product5.png"
                                    alt="choun" /><img class="imageHover"
                                    src="assets/imgs/page/homepage1/product1-hover.png" alt="choun" /></a>
                            <div class="button-select">
                                <a href="#">Select Options</a>
                            </div>
                            <div class="box-quick-button">
                                <a class="btn" href="#">
                                    <svg class="d-inline-flex align-items-center justify-content-center" width="28"
                                        height="28" viewbox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_116_452)">
                                            <path
                                                d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                                fill=""></path>
                                        </g>
                                        <defs>
                                            <clippath id="clip0_116_452">
                                                <rect width="24" height="24" fill="white" transform="translate(2 2)">
                                                </rect>
                                            </clippath>
                                        </defs>
                                    </svg></a><a class="btn" href="#">
                                    <svg class="d-inline-flex align-items-center justify-content-center" width="24"
                                        height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_200_1102)">
                                            <path
                                                d="M15.375 12.0416L19.5 16.1666L15.375 20.2916L14.1967 19.1133L16.31 16.9991L5.33333 17V15.3333H16.31L14.1967 13.22L15.375 12.0416ZM8.625 3.70831L9.80333 4.88665L7.69 6.99998H18.6667V8.66665H7.69L9.80333 10.78L8.625 11.9583L4.5 7.83331L8.625 3.70831Z"
                                                fill=""></path>
                                        </g>
                                        <defs>
                                            <clippath id="clip0_200_1102">
                                                <rect width="20" height="20" fill="white" transform="translate(2 2)">
                                                </rect>
                                            </clippath>
                                        </defs>
                                    </svg></a><a class="btn preview-product" href="#">
                                    <svg class="d-inline-flex align-items-center justify-content-center" width="28"
                                        height="28" viewbox="0 0 28 28" fill="" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_91_73)">
                                            <path
                                                d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z"
                                                fill=""></path>
                                        </g>
                                        <defs>
                                            <clippath id="clip0_91_73">
                                                <rect width="24" height="24" fill="white" transform="translate(2 2)">
                                                </rect>
                                            </clippath>
                                        </defs>
                                    </svg></a>
                            </div>
                        </div>
                        <div class="cardInfo">
                            <a href="#">
                                <h6 class="text-16-medium cardTitle">
                                    Lace Shirt Cut II
                                </h6>
                            </a>
                            <p class="body-p2 cardDesc">$16.00</p>
                            <div class="box-colors">
                                <div class="item-color color-1"></div>
                                <div class="item-color color-2"></div>
                                <div class="item-color color-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
</x-layout>
