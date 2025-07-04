<div>
    <form>
        <div class="form-group">
            <select class="form-control arrow-select" wire:model="categoryId" wire:change="search">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input class="form-control search-icon" type="text" wire:model.live="searchParams" wire:keyup="search">
        </div>
    </form>
    <div class="box-quick-search"><span class="text-17 neutral-medium-dark">Quick search:</span><a class="text-17"
            href="#">T-Shirt</a><a class="text-17" href="#">Jeans</a><a class="text-17"
            href="#">Mens</a></div>
    <div class="box-products-search">
        <h6 class="text-18-medium mb-10">Search Results</h6>
        <div class="box-list-product-search">
            @foreach($products as $product)
            <div class="item-product-search">
                <div class="cardProductModern wow fadeInUp">
                    <div class="cardImage"><a href="#"><img class="imageMain"
                                src="{{ $product->image_url }}" alt="{{ $product->name }}"><img class="imageHover"
                                src="{{ $product->image_hover_url }}" alt="{{ $product->name }}"></a>
                        <div class="button-select"><a href="#">Select Options</a></div>
                        <div class="box-quick-button"><a class="btn" href="#">
                                <svg class="d-inline-flex align-items-center justify-content-center" width="28"
                                    height="28" viewbox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
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
                                <svg class="d-inline-flex align-items-center justify-content-center" width="24"
                                    height="24" viewbox="0 0 24 24" fill="none"
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
                                <svg class="d-inline-flex align-items-center justify-content-center" width="28"
                                    height="28" viewbox="0 0 28 28" fill=""
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
                        <h6 class="text-16-medium">{{ $product->name }}</h6>
                        <p class="body-p2 cardDesc">${{ $product->price }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>