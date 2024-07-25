@if ($paginator->hasPages())
    <div class="text-center mt-50">
        <nav class="box-pagination">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link page-prev" href="#">
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"></path>
                            </svg>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link page-prev" href="{{ $paginator->previousPageUrl() }}">
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"></path>
                            </svg>
                        </a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link page-next" href="{{ $paginator->nextPageUrl() }}">
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                            </svg>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link page-next" href="{{ $paginator->nextPageUrl() }}">
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                            </svg>
                        </a>
                    </li>
                @endif
            </ul>

            <div class="d-none text-center mt-50">
                <div>
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link page-prev" href="#">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"></path>
                                </svg>
                            </a>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link page-prev" href="{{ $paginator->previousPageUrl() }}">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"></path>
                                </svg>
                            </a>
                        </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li class="page-item disabled" aria-disabled="true"><span
                                        class="page-link">{{ $element }}</span></li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="page-item active" aria-current="page"><span
                                                class="page-link">{{ $page }}</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link page-next" href="{{ $paginator->nextPageUrl() }}">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                                </svg>
                            </a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <a class="page-link page-next" href="{{ $paginator->nextPageUrl() }}">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                                </svg>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
@endif
