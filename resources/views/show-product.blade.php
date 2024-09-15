<x-layout>
    <div class="section block-breadcrumb">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Home </a></li>
                    <li><a href="/shop">Shop</a></li>
                    <li><a href="/shop/categories/{{ $product->category->id }}">{{ $product->category->name }}</a></li>
                    <li><a href="#">{{ $product->name }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section block-product-single">
        <div class="container">
            <livewire:add-to-cart></livewire:add-to-cart>
            <div class="box-detail-product">
                <ul class="nav-tabs nav-tab-product" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                            data-bs-target="#description" type="button" role="tab" aria-controls="description"
                            aria-selected="true">
                            Description
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sizechart-tab" data-bs-toggle="tab" data-bs-target="#sizechart"
                            type="button" role="tab" aria-controls="sizechart" aria-selected="false">
                            Size Chart
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                            type="button" role="tab" aria-controls="reviews" aria-selected="false">
                            Reviews (3)
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                        aria-labelledby="description-tab">
                        <p>
                            The shorts are made from soft organic
                            cotton. They have an elasticated waistband
                            with an internal drawstring and side
                            pockets. They’re the same fit as our classic
                            365 organic cotton shorts and feature a
                            multicolored embroidered logo on the hem.
                        </p>
                        <div class="row mt-40">
                            <div class="col-lg-6">
                                <p>
                                    <strong>Model wears:</strong>UK 10/
                                    EU 38/ US 6<br /><strong>Occasion:</strong>Lifestyle,
                                    Sport<br /><strong>Country:</strong>Italy
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p>
                                    <strong>Outer:</strong>Leather 100%,
                                    Polyamide 100%<br /><strong>Lining:</strong>Polyester
                                    100%<br /><strong>CounSoletry:</strong>Rubber 100%
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sizechart" role="tabpanel" aria-labelledby="sizechart-tab">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Color</th>
                                        <td>Red</td>
                                    </tr>
                                    <tr>
                                        <th>Size</th>
                                        <td>XL</td>
                                    </tr>
                                    <tr>
                                        <th>Weight</th>
                                        <td>300gr</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="comments-area">
                            <div class="row">
                                <div class="col-lg-12 mb-30">
                                    <h4 class="mb-30 title-question">
                                        Customer reviews
                                    </h4>
                                    <div class="d-flex align-items-center mb-30">
                                        <div class="product-rate d-inline-block mr-15">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <h6>4.8 out of 5</h6>
                                    </div>
                                    <div class="progress">
                                        <span>5 star</span>
                                        <div class="progress-bar" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            50%
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <span>4 star</span>
                                        <div class="progress-bar" role="progressbar" style="width: 25%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            25%
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <span>3 star</span>
                                        <div class="progress-bar" role="progressbar" style="width: 45%"
                                            aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                            45%
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <span>2 star</span>
                                        <div class="progress-bar" role="progressbar" style="width: 65%"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                            65%
                                        </div>
                                    </div>
                                    <div class="progress mb-30">
                                        <span>1 star</span>
                                        <div class="progress-bar" role="progressbar" style="width: 85%"
                                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                            85%
                                        </div>
                                    </div>
                                    <a class="font-xs text-muted" href="#">How are ratings calculated?</a>
                                </div>
                                <div class="col-lg-12 mb-30">
                                    <h4 class="mb-30 title-question">
                                        Customer questions &amp; answers
                                    </h4>
                                    <div class="comment-list">
                                        <div class="single-comment justify-content-between d-flex mb-30 hover-up">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb text-center">
                                                    <img src="/assets/imgs/page/about1/team.png" alt="Ecom" /><a
                                                        class="font-heading text-brand" href="#">Sienna</a>
                                                </div>
                                                <div class="desc">
                                                    <div class="d-flex justify-content-between mb-10">
                                                        <div class="d-flex align-items-center">
                                                            <span class="font-xs color-gray-700">December
                                                                4, 2023
                                                                at 3:12
                                                                pm</span>
                                                        </div>
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating"
                                                                style="
                                                                        width: 100%;
                                                                    ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mb-10 font-sm color-gray-900">
                                                        Lorem ipsum
                                                        dolor sit amet,
                                                        consectetur
                                                        adipisicing
                                                        elit. Delectus,
                                                        suscipit
                                                        exercitationem
                                                        accusantium
                                                        obcaecati quos
                                                        voluptate
                                                        nesciunt facilis
                                                        itaque modi
                                                        commodi
                                                        dignissimos
                                                        sequi
                                                        repudiandae
                                                        minus ab
                                                        deleniti totam
                                                        officia id
                                                        incidunt?<a class="reply" href="#">
                                                            Reply</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="single-comment justify-content-between d-flex mb-30 ml-30 hover-up">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb text-center">
                                                    <img src="/assets/imgs/page/about1/team.png" alt="Ecom" /><a
                                                        class="font-heading text-brand" href="#">Brenna</a>
                                                </div>
                                                <div class="desc">
                                                    <div class="d-flex justify-content-between mb-10">
                                                        <div class="d-flex align-items-center">
                                                            <span class="font-xs color-gray-700">December
                                                                4, 2023
                                                                at 3:12
                                                                pm</span>
                                                        </div>
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating"
                                                                style="
                                                                        width: 80%;
                                                                    ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mb-10 font-sm color-gray-900">
                                                        Lorem ipsum
                                                        dolor sit amet,
                                                        consectetur
                                                        adipisicing
                                                        elit. Delectus,
                                                        suscipit
                                                        exercitationem
                                                        accusantium
                                                        obcaecati quos
                                                        voluptate
                                                        nesciunt facilis
                                                        itaque modi
                                                        commodi
                                                        dignissimos
                                                        sequi
                                                        repudiandae
                                                        minus ab
                                                        deleniti totam
                                                        officia id
                                                        incidunt?<a class="reply" href="#">
                                                            Reply</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-comment justify-content-between d-flex hover-up">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb text-center">
                                                    <img src="/assets/imgs/page/about1/team.png" alt="Ecom" /><a
                                                        class="font-heading text-brand" href="#">Gemma</a>
                                                </div>
                                                <div class="desc">
                                                    <div class="d-flex justify-content-between mb-10">
                                                        <div class="d-flex align-items-center">
                                                            <span class="font-xs color-gray-700">December
                                                                4, 2023
                                                                at 3:12
                                                                pm</span>
                                                        </div>
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating"
                                                                style="
                                                                        width: 80%;
                                                                    ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mb-10 font-sm color-gray-900">
                                                        Lorem ipsum
                                                        dolor sit amet,
                                                        consectetur
                                                        adipisicing
                                                        elit. Delectus,
                                                        suscipit
                                                        exercitationem
                                                        accusantium
                                                        obcaecati quos
                                                        voluptate
                                                        nesciunt facilis
                                                        itaque modi
                                                        commodi
                                                        dignissimos
                                                        sequi
                                                        repudiandae
                                                        minus ab
                                                        deleniti totam
                                                        officia id
                                                        incidunt?<a class="reply" href="#">
                                                            Reply</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section block-may-also-like">
        <div class="container">
            <div class="text-center">
                <h3 class="mb-60">You May Also Like</h3>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="cardProduct wow fadeInUp">
                        <div class="cardImage">
                            <a href="#"><img class="imageMain" src="/assets/imgs/page/homepage1/product8.png"
                                    alt="guza" /><img class="imageHover"
                                    src="/assets/imgs/page/homepage1/product1-hover.png" alt="guza" /></a>
                            <div class="button-select">
                                <a href="#">Select Options</a>
                            </div>
                            <div class="box-quick-button">
                                <a class="btn" href="#">
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
                            <a href="#"><img class="imageMain" src="/assets/imgs/page/homepage1/product7.png"
                                    alt="guza" /><img class="imageHover"
                                    src="/assets/imgs/page/homepage1/product2-hover.png" alt="guza" /></a>
                            <div class="button-select">
                                <a href="#">Select Options</a>
                            </div>
                            <div class="box-quick-button">
                                <a class="btn" href="#">
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
                                    </svg></a>
                            </div>
                        </div>
                        <div class="cardInfo">
                            <a href="#">
                                <h6 class="text-16-medium cardTitle">
                                    Lace Shirt Cut II
                                </h6>
                            </a>
                            <p class="body-p2 cardDesc">$24.00</p>
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
                            <a href="#"><img class="imageMain" src="/assets/imgs/page/homepage1/product6.png"
                                    alt="guza" /><img class="imageHover"
                                    src="/assets/imgs/page/homepage1/product1-hover.png" alt="guza" /></a>
                            <div class="button-select">
                                <a href="#">Select Options</a>
                            </div>
                            <div class="box-quick-button">
                                <a class="btn" href="#">
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
                                    </svg></a>
                            </div>
                        </div>
                        <div class="cardInfo">
                            <a href="#">
                                <h6 class="text-16-medium cardTitle">
                                    Lace Shirt Cut II
                                </h6>
                            </a>
                            <p class="body-p2 cardDesc">$38.00</p>
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
                            <a href="#"><img class="imageMain" src="/assets/imgs/page/homepage1/product5.png"
                                    alt="guza" /><img class="imageHover"
                                    src="/assets/imgs/page/homepage1/product2-hover.png" alt="guza" /></a>
                            <div class="button-select">
                                <a href="#">Select Options</a>
                            </div>
                            <div class="box-quick-button">
                                <a class="btn" href="#">
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
                                    </svg></a>
                            </div>
                        </div>
                        <div class="cardInfo">
                            <a href="#">
                                <h6 class="text-16-medium cardTitle">
                                    Lace Shirt Cut II
                                </h6>
                            </a>
                            <p class="body-p2 cardDesc">$67.00</p>
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
    </section>
</x-layout>
