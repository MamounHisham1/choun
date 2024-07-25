@props(['tab' => 1])
@php
    $defaults = [
        'class' => 'tab-pane fade',
        'role' => 'tabpanel',
    ];
@endphp
<div {{ $attributes($defaults) }}>
    <div class="box-swiper button-slide-square button-slide-square-2">
        <div class="swiper-container swiper-tab-{{ $tab }}">
            <div class="swiper-wrapper">
                {{ $slot }}
            </div>
            <div class="box-pagination-button">
                <div class="swiper-pagination swiper-pagination-tab-{{ $tab }} swiper-pagination-banner-style-2">
                </div>
            </div>
        </div>
    </div>
</div>
