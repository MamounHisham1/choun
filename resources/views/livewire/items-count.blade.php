<a class="account-icon cart" href="#">

    @if ($totalItems > 0)
    <span id="cart-tag" class="number-tag">{{ $totalItems }}</span>
    @else
    <span id="cart-tag"></span>
    @endif
    <svg width="28" height="28" viewbox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_116_450)">
            <path
                d="M9 10V8C9 6.67392 9.52678 5.40215 10.4645 4.46447C11.4021 3.52678 12.6739 3 14 3C15.3261 3 16.5979 3.52678 17.5355 4.46447C18.4732 5.40215 19 6.67392 19 8V10H22C22.2652 10 22.5196 10.1054 22.7071 10.2929C22.8946 10.4804 23 10.7348 23 11V23C23 23.2652 22.8946 23.5196 22.7071 23.7071C22.5196 23.8946 22.2652 24 22 24H6C5.73478 24 5.48043 23.8946 5.29289 23.7071C5.10536 23.5196 5 23.2652 5 23V11C5 10.7348 5.10536 10.4804 5.29289 10.2929C5.48043 10.1054 5.73478 10 6 10H9ZM9 12H7V22H21V12H19V14H17V12H11V14H9V12ZM11 10H17V8C17 7.20435 16.6839 6.44129 16.1213 5.87868C15.5587 5.31607 14.7956 5 14 5C13.2044 5 12.4413 5.31607 11.8787 5.87868C11.3161 6.44129 11 7.20435 11 8V10Z">
            </path>
        </g>
        <defs>
            <clippath id="clip0_116_450">
                <rect width="24" height="24" transform="translate(2 2)"></rect>
            </clippath>
        </defs>
    </svg>
</a>