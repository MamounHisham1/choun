<x-layout title="{{ $product->name }}">
    <div class="section block-breadcrumb">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Home </a></li>
                    <li><a href="/shop">Shop</a></li>
                    <li><a href="/shop/categories/{{ $product->category->slug }}">{{ $product->category->name }}</a></li>
                    <li><a href="#">{{ $product->name }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section block-product-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="detail-gallery detail-gallery-2">
                        <div class="box-main-gallery">
                            <a class="zoom-image glightbox" href="{{ $product->image_url }}"></a>
                            <div class="product-image-slider product-image-slider-5">
                                @foreach ($product->images as $image)
                                    <figure class="border-radius-10">
                                        <a class="glightbox" href="{{ $image->getUrl() }}"><img
                                                src="{{ $image->getUrl() }}" alt="kidify" /></a>
                                    </figure>
                                @endforeach
                            </div>
                        </div>
                        <div class="slider-nav-thumbnails slider-nav-thumbnails-5">
                            @foreach ($product->images as $image)
                                <div>
                                    <div class="item-thumb">
                                        <img src="{{ $image->getUrl() }}" alt="kidify" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box-product-info">
                        <p class="body-p2 viewed-guest">
                            <span class="text-17-medium tone-red">24 guests</span>are viewing this product
                        </p>
                        <h3 class="mb-5">{{ $product->name }}</h3>
                        <div class="block-rating">
                            <img src="/assets/imgs/template/icons/star-fill.svg" alt="choun" /><img
                                src="/assets/imgs/template/icons/star-fill.svg" alt="choun" /><img
                                src="/assets/imgs/template/icons/star-fill.svg" alt="choun" /><img
                                src="/assets/imgs/template/icons/star-fill.svg" alt="choun" /><img
                                src="/assets/imgs/template/icons/star-none.svg" alt="choun" /><span
                                class="text-17 neutral-medium-dark">(5)</span>
                        </div>
                        <div class="block-price">
                            <span class="price-main">{{ Number::currency($product->price, 'USD') }}</span>
                        </div>
                        <div class="block-description">
                            <p class="body-p2 neutral-medium-dark">
                                {{ $product->description }}
                            </p>
                        </div>

                        <livewire:add-to-cart :$product />

                        <div class="block-shipping">
                            <div class="free-shipping">
                                Free shipping over $300
                            </div>
                            <div class="time-shipping">
                                60 - Days Returns Learn More
                            </div>
                        </div>
                        <div class="block-tags-product">
                            {{-- <p class="body-p2">
                                <span class="neutral-medium-dark">SKU:</span><span
                                    class="neutral-dark">C66R8B47MP</span>
                            </p> --}}
                            <p class="body-p2">
                                <span class="neutral-medium-dark">Category:</span>
                                <a class="neutral-dark"
                                    href="/shop/categories/{{ $product->category->slug }}">{{ $product->category->name }}</a>
                            </p>
                            @if ($product->tags->isNotEmpty())
                                <p class="body-p2">
                                    <span class="neutral-medium-dark">Tags:</span>
                                    @foreach ($product->tags as $tag)
                                        <span class="badge bg-secondary">{{ $tag->name }}</span>
                                    @endforeach
                                </p>
                            @endif
                        </div>
                        {{-- <div class="block-socials-product">
                            <span class="body-p2 neutral-medium-dark">Share:</span><a class="social-neutral-dark"
                                href="#">
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.9047 12.75H13.4437V20.1H10.1625V12.75H7.47187V9.73125H10.1625V7.40156C10.1625 4.77656 11.7375 3.3 14.1328 3.3C15.2813 3.3 16.4953 3.52969 16.4953 3.52969V6.12187H15.15C13.8375 6.12187 13.4437 6.90937 13.4437 7.7625V9.73125H16.3641L15.9047 12.75Z"
                                        fill=""></path>
                                </svg></a><a class="social-neutral-dark" href="#">
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.6609 8.2875C18.6609 8.45156 18.6609 8.58281 18.6609 8.74687C18.6609 13.3078 15.2156 18.525 8.88281 18.525C6.91406 18.525 5.10937 17.9672 3.6 16.9828C3.8625 17.0156 4.125 17.0484 4.42031 17.0484C6.02812 17.0484 7.50469 16.4906 8.68594 15.5719C7.17656 15.5391 5.89687 14.5547 5.47031 13.1766C5.7 13.2094 5.89687 13.2422 6.12656 13.2422C6.42187 13.2422 6.75 13.1766 7.0125 13.1109C5.4375 12.7828 4.25625 11.4047 4.25625 9.73125V9.69844C4.71562 9.96094 5.27344 10.0922 5.83125 10.125C4.87969 9.50156 4.28906 8.45156 4.28906 7.27031C4.28906 6.61406 4.45312 6.02344 4.74844 5.53125C6.45469 7.59844 9.01406 8.97656 11.8687 9.14062C11.8031 8.87812 11.7703 8.61562 11.7703 8.35312C11.7703 6.45 13.3125 4.90781 15.2156 4.90781C16.2 4.90781 17.0859 5.30156 17.7422 5.99062C18.4969 5.82656 19.2516 5.53125 19.9078 5.1375C19.6453 5.95781 19.1203 6.61406 18.3984 7.04062C19.0875 6.975 19.7766 6.77812 20.3672 6.51562C19.9078 7.20469 19.3172 7.79531 18.6609 8.2875Z"
                                        fill=""></path>
                                </svg></a><a class="social-neutral-dark" href="#">
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.1375 11.7C20.1375 16.1953 16.4953 19.8375 12 19.8375C11.1469 19.8375 10.3266 19.7391 9.57187 19.4766C9.9 18.9516 10.3922 18.0656 10.5891 17.3437C10.6875 16.9828 11.0812 15.4078 11.0812 15.4078C11.3437 15.9328 12.1312 16.3594 12.9516 16.3594C15.4125 16.3594 17.1844 14.0953 17.1844 11.3062C17.1844 8.61562 14.9859 6.58125 12.1641 6.58125C8.65312 6.58125 6.78281 8.94375 6.78281 11.5031C6.78281 12.7172 7.40625 14.1937 8.42344 14.6859C8.5875 14.7516 8.68594 14.7187 8.71875 14.5547C8.71875 14.4562 8.88281 13.8984 8.94844 13.6359C8.94844 13.5703 8.94844 13.4719 8.88281 13.4062C8.55469 13.0125 8.29219 12.2578 8.29219 11.5359C8.29219 9.76406 9.6375 8.025 11.9672 8.025C13.9359 8.025 15.3469 9.37031 15.3469 11.3391C15.3469 13.5375 14.2312 15.0469 12.7875 15.0469C12 15.0469 11.4094 14.3906 11.5734 13.6031C11.8031 12.6187 12.2625 11.5687 12.2625 10.8797C12.2625 10.2562 11.9344 9.73125 11.2453 9.73125C10.425 9.73125 9.76875 10.5844 9.76875 11.7C9.76875 12.4219 9.99844 12.9141 9.99844 12.9141C9.99844 12.9141 9.21094 16.3266 9.04687 16.95C8.88281 17.6719 8.94844 18.6563 9.01406 19.2797C5.99531 18.0984 3.8625 15.1781 3.8625 11.7C3.8625 7.20469 7.50469 3.5625 12 3.5625C16.4953 3.5625 20.1375 7.20469 20.1375 11.7Z"
                                        fill=""></path>
                                </svg></a><a class="social-neutral-dark" href="#">
                                <svg width="29" height="28" viewbox="0 0 29 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.6001 10.0078C12.1001 10.0078 10.1079 12.0391 10.1079 14.5C10.1079 17 12.1001 18.9922 14.6001 18.9922C17.061 18.9922 19.0923 17 19.0923 14.5C19.0923 12.0391 17.061 10.0078 14.6001 10.0078ZM14.6001 17.4297C12.9985 17.4297 11.6704 16.1406 11.6704 14.5C11.6704 12.8984 12.9595 11.6094 14.6001 11.6094C16.2017 11.6094 17.4907 12.8984 17.4907 14.5C17.4907 16.1406 16.2017 17.4297 14.6001 17.4297ZM20.3032 9.85156C20.3032 9.26562 19.8345 8.79688 19.2485 8.79688C18.6626 8.79688 18.1938 9.26562 18.1938 9.85156C18.1938 10.4375 18.6626 10.9062 19.2485 10.9062C19.8345 10.9062 20.3032 10.4375 20.3032 9.85156ZM23.272 10.9062C23.1938 9.5 22.8813 8.25 21.8657 7.23438C20.8501 6.21875 19.6001 5.90625 18.1938 5.82812C16.7485 5.75 12.4126 5.75 10.9673 5.82812C9.56104 5.90625 8.3501 6.21875 7.29541 7.23438C6.27979 8.25 5.96729 9.5 5.88916 10.9062C5.81104 12.3516 5.81104 16.6875 5.88916 18.1328C5.96729 19.5391 6.27979 20.75 7.29541 21.8047C8.3501 22.8203 9.56104 23.1328 10.9673 23.2109C12.4126 23.2891 16.7485 23.2891 18.1938 23.2109C19.6001 23.1328 20.8501 22.8203 21.8657 21.8047C22.8813 20.75 23.1938 19.5391 23.272 18.1328C23.3501 16.6875 23.3501 12.3516 23.272 10.9062ZM21.397 19.6562C21.1235 20.4375 20.4985 21.0234 19.7563 21.3359C18.5845 21.8047 15.8501 21.6875 14.6001 21.6875C13.311 21.6875 10.5767 21.8047 9.44385 21.3359C8.6626 21.0234 8.07666 20.4375 7.76416 19.6562C7.29541 18.5234 7.4126 15.7891 7.4126 14.5C7.4126 13.25 7.29541 10.5156 7.76416 9.34375C8.07666 8.60156 8.6626 8.01562 9.44385 7.70312C10.5767 7.23438 13.311 7.35156 14.6001 7.35156C15.8501 7.35156 18.5845 7.23438 19.7563 7.70312C20.4985 7.97656 21.0845 8.60156 21.397 9.34375C21.8657 10.5156 21.7485 13.25 21.7485 14.5C21.7485 15.7891 21.8657 18.5234 21.397 19.6562Z"
                                        fill=""></path>
                                </svg></a>
                        </div> --}}
                    </div>
                </div>
            </div>
            {{-- <div class="box-detail-product">
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
            </div> --}}
        </div>
    </section>
    <section class="section block-may-also-like">
        <div class="container">
            <div class="text-center">
                <h3 class="mb-60">You May Also Like</h3>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="cardProductModern wow fadeInUp">
                            <div class="cardImage">
                                <a href="/shop/{{ $product->slug }}"><img class="imageMain"
                                        src="{{ $product->image_url }}" alt="choun" /><img class="imageHover"
                                        src="{{ $product->images->last()?->getUrl() }}" alt="choun" /></a>
                                <div class="button-select">
                                    <a href="/shop/{{ $product->slug }}">More Details</a>
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
                                <a href="/shop/{{ $product->slug }}">
                                    <h6 class="text-16-medium cardTitle">
                                        {{ $product->name }}
                                    </h6>
                                </a>
                                <p class="body-p2 cardDesc">
                                    {{ Number::currency($product->price, 'USD') }}
                                </p>
                                <div class="box-colors">
                                    <label class="color-label">
                                        <input type="radio" name="color" value="red" class="d-none">
                                        <div class="color-circle" style="background-color: red;"></div>
                                    </label>
                                    <label class="color-label">
                                        <input type="radio" name="color" value="green" class="d-none">
                                        <div class="color-circle" style="background-color: green;"></div>
                                    </label>
                                    <label class="color-label">
                                        <input type="radio" name="color" value="blue" class="d-none">
                                        <div class="color-circle" style="background-color: blue;"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-3 col-md-6">
                    <div class="cardProduct wow fadeInUp">
                        <div class="cardImage">
                            <a href="#"><img class="imageMain" src="/assets/imgs/page/homepage1/product8.png"
                                    alt="choun" /><img class="imageHover"
                                    src="/assets/imgs/page/homepage1/product1-hover.png" alt="choun" /></a>
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
                                    alt="choun" /><img class="imageHover"
                                    src="/assets/imgs/page/homepage1/product2-hover.png" alt="choun" /></a>
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
                                    alt="choun" /><img class="imageHover"
                                    src="/assets/imgs/page/homepage1/product1-hover.png" alt="choun" /></a>
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
                                    alt="choun" /><img class="imageHover"
                                    src="/assets/imgs/page/homepage1/product2-hover.png" alt="choun" /></a>
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
                </div> --}}
            </div>
        </div>
    </section>
</x-layout>
