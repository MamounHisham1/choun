<header class="header sticky-bar header-style-2 header-style-2-nofix">
    <div class="container">
        <div class="main-header">
            <div class="header-menu">
                <div class="header-nav">
                    <nav class="nav-main-menu d-none d-xl-block">
                        <ul class="main-menu">
                            <li><a class="active" href="/">Home</a></li>
                            <li><a href="/shop">Shop</a></li>
                            <li><a href="/blogs">Blog</a></li>
                            <li><a href="/about">About Us</a></li>
                        </ul>
                    </nav>
                    <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                            class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
                </div>
            </div>
            <div class="header-logo">
                <a class="d-flex" href="/">
                    <img alt="electron" src="/assets/imgs/template/electron-logo-png_seeklogo-468387-removebg-preview.png" style="width: 40px;">
                </a>
            </div>
            <div class="header-account">
                <a class="account-icon search" href="#">
                    <svg class="d-inline-flex align-items-center justify-content-center" width="28" height="28"
                        viewbox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_91_73)">
                            <path
                                d="M20.031 18.617L24.314 22.899L22.899 24.314L18.617 20.031C17.0237 21.3082 15.042 22.0029 13 22C8.032 22 4 17.968 4 13C4 8.032 8.032 4 13 4C17.968 4 22 8.032 22 13C22.0029 15.042 21.3082 17.0237 20.031 18.617ZM18.025 17.875C19.2941 16.5699 20.0029 14.8204 20 13C20 9.132 16.867 6 13 6C9.132 6 6 9.132 6 13C6 16.867 9.132 20 13 20C14.8204 20.0029 16.5699 19.2941 17.875 18.025L18.025 17.875Z">
                            </path>
                        </g>
                        <defs>
                            <clippath id="clip0_91_73">
                                <rect width="24" height="24" fill="white" transform="translate(2 2)">
                                </rect>
                            </clippath>
                        </defs>
                    </svg>
                </a>
                @auth
                    <a href="/account">
                        <svg class="d-inline-flex align-items-center justify-content-center" width="28" height="28"
                            viewbox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_116_451)">
                                <path
                                    d="M6 24C6 21.8783 6.84285 19.8434 8.34315 18.3431C9.84344 16.8429 11.8783 16 14 16C16.1217 16 18.1566 16.8429 19.6569 18.3431C21.1571 19.8434 22 21.8783 22 24H20C20 22.4087 19.3679 20.8826 18.2426 19.7574C17.1174 18.6321 15.5913 18 14 18C12.4087 18 10.8826 18.6321 9.75736 19.7574C8.63214 20.8826 8 22.4087 8 24H6ZM14 15C10.685 15 8 12.315 8 9C8 5.685 10.685 3 14 3C17.315 3 20 5.685 20 9C20 12.315 17.315 15 14 15ZM14 13C16.21 13 18 11.21 18 9C18 6.79 16.21 5 14 5C11.79 5 10 6.79 10 9C10 11.21 11.79 13 14 13Z">
                                </path>
                            </g>
                            <defs>
                                <clippath id="clip0_116_451">
                                    <rect width="24" height="24" fill="white" transform="translate(2 2)">
                                    </rect>
                                </clippath>
                            </defs>
                        </svg>
                    </a>
                @endauth
                <a class="account-icon wishlist" href="#">
                    @if (count($wishlistItems) > 0)
                        <span id="wishlist-tag" class="number-tag">{{ count($wishlistItems) }}</span>
                    @else
                        <span id="wishlist-tag"></span>
                    @endif
                    <svg class="d-inline-flex align-items-center justify-content-center" width="28" height="28"
                        viewbox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_116_452)">
                            <path
                                d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z">
                            </path>
                        </g>
                        <defs>
                            <clippath id="clip0_116_452">
                                <rect width="24" height="24" fill="white" transform="translate(2 2)">
                                </rect>
                            </clippath>
                        </defs>
                    </svg>
                </a>
                <livewire:items-count />
            </div>
        </div>
    </div>
</header>

<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="mobile-menu-head">
                <div class="box-head-1"><a class="link-underline mr-20 account-icon account" href="#">Login</a><a
                        class="link-underline account-icon account" href="#">Sign Up</a><a class="close-mobile"
                        href="#"><img src="/assets/imgs/template/icons/close.svg" alt="choun"></a></div>
                <div class="box-head-2"><a class="back-mobile" href="#"><img
                            src="/assets/imgs/template/icons/back.svg" alt="choun"></a></div>
            </div>
            <div class="perfect-scroll">
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="has-children"><a class="active" href="/">Home</a>
                            </li>
                            <li class="has-children"><a href="/shop">Shop</a>
                            </li>
                            <li class="has-children"><a href="/blogs">Blog</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
