<x-layout>
    <main class="main">
        <!-- Header Banner -->
        <section class="section block-head">
            <div class="container">
                <div class="text-center wow bounceIn">
                    <h1>Our Stories</h1>
                    <div class="breadcrumbs d-inline-block">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('blog.index') }}">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog List Section -->
        <section class="section block-blog-list">
            <div class="container">
                <!-- Categories Nav -->
                <ul class="nav-tabs nav-tab-grey wow bounceIn">
                    <li><a class="{{ !request('category') ? 'active' : '' }}" href="{{ route('blog.index') }}">All</a>
                    </li>
                    @foreach($categories as $category)
                    <li>
                        <a class="{{ request('category') == $category->slug ? 'active' : '' }}"
                            href="{{ route('blog.index', ['category' => $category->slug]) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>

                <!-- Blog Grid -->
                <div class="row wow bounceIn" id="blog-grid">
                    @forelse($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="cardBlog wow fadeInUp">
                            <div class="cardImage">
                                <a href="{{ route('blog.show', $blog->slug) }}">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                </a>
                            </div>
                            <div class="cardInfo">
                                <div class="cardTags">
                                    <a href="{{ route('blog.index', ['category' => $blog->category->slug]) }}">
                                        {{ $blog->category->name }}
                                    </a>
                                    <span class="date-post">{{ $blog->created_at->format('M d, Y') }}</span>
                                </div>
                                <a class="cardTitle" href="{{ route('blog.show', $blog->slug) }}">
                                    <h5>{{ $blog->title }}</h5>
                                </a>
                                <p class="cardDesc body-p2">
                                    {{ Str::limit($blog->excerpt, 100) }}
                                </p>
                                <a class="link-underline link-l2" href="{{ route('blog.show', $blog->slug) }}">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No blog posts found.</p>
                    </div>
                    @endforelse
                </div>

                <!-- Load More Button -->
                @if($hasMorePages)
                <div class="text-center mt-40 wow bounceIn">
                    <a class="btn btn-black" href="#" id="load-more" data-page="2">
                        <svg class="icon-16" width="16" height="16" viewbox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.625 0.25C15.875 0.25 16 0.375 16 0.625V6.625C16 6.875 15.875 7 15.625 7H9.625C9.375 7 9.25 6.875 9.25 6.625V5.75C9.25 5.64583 9.28125 5.5625 9.34375 5.5C9.42708 5.41667 9.52083 5.375 9.625 5.375L13.5938 5.46875C13.0938 4.38542 12.3438 3.52083 11.3438 2.875C10.3438 2.20833 9.22917 1.875 8 1.875C6.3125 1.875 4.86458 2.47917 3.65625 3.6875C2.46875 4.875 1.875 6.3125 1.875 8C1.875 9.6875 2.46875 11.1354 3.65625 12.3438C4.86458 13.5312 6.3125 14.125 8 14.125C9.5625 14.125 10.9167 13.6042 12.0625 12.5625C12.25 12.4167 12.4271 12.4271 12.5938 12.5938L13.2188 13.2188C13.4062 13.4062 13.3958 13.5833 13.1875 13.75C11.7083 15.0833 9.97917 15.75 8 15.75C5.85417 15.75 4.02083 15 2.5 13.5C1 11.9792 0.25 10.1458 0.25 8C0.25 5.875 1 4.05208 2.5 2.53125C4.02083 1.01042 5.84375 0.25 7.96875 0.25C9.30208 0.25 10.5417 0.5625 11.6875 1.1875C12.8333 1.8125 13.7604 2.65625 14.4688 3.71875L14.375 0.625C14.375 0.520833 14.4062 0.4375 14.4688 0.375C14.5521 0.291667 14.6458 0.25 14.75 0.25H15.625Z"
                                fill=""></path>
                        </svg>
                        Load More
                    </a>
                </div>
                @endif
            </div>
        </section>
    </main>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadMoreBtn = document.getElementById('load-more');
            const blogGrid = document.getElementById('blog-grid');
            
            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Show loading state
                    loadMoreBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Loading...';
                    loadMoreBtn.disabled = true;
                    
                    const page = parseInt(this.dataset.page);
                    const category = new URLSearchParams(window.location.search).get('category') || '';
                    
                    fetch(`{{ route('blog.load-more') }}?page=${page}&category=${category}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            const tempDiv = document.createElement('div');
                            tempDiv.innerHTML = data.html;
                            
                            if (tempDiv.children.length > 0) {
                                // Remove empty state message if it exists
                                const emptyState = blogGrid.querySelector('.col-12.text-center');
                                if (emptyState) {
                                    emptyState.remove();
                                }
                                
                                // Append new blog posts
                                while (tempDiv.firstChild) {
                                    blogGrid.appendChild(tempDiv.firstChild);
                                }
                                
                                // Update page number
                                this.dataset.page = page + 1;
                                
                                // Initialize WOW.js for new elements
                                new WOW().init();
                                
                                // Reset button state
                                loadMoreBtn.innerHTML = `
                                    <svg class="icon-16" width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.625 0.25C15.875 0.25 16 0.375 16 0.625V6.625C16 6.875 15.875 7 15.625 7H9.625C9.375 7 9.25 6.875 9.25 6.625V5.75C9.25 5.64583 9.28125 5.5625 9.34375 5.5C9.42708 5.41667 9.52083 5.375 9.625 5.375L13.5938 5.46875C13.0938 4.38542 12.3438 3.52083 11.3438 2.875C10.3438 2.20833 9.22917 1.875 8 1.875C6.3125 1.875 4.86458 2.47917 3.65625 3.6875C2.46875 4.875 1.875 6.3125 1.875 8C1.875 9.6875 2.46875 11.1354 3.65625 12.3438C4.86458 13.5312 6.3125 14.125 8 14.125C9.5625 14.125 10.9167 13.6042 12.0625 12.5625C12.25 12.4167 12.4271 12.4271 12.5938 12.5938L13.2188 13.2188C13.4062 13.4062 13.3958 13.5833 13.1875 13.75C11.7083 15.0833 9.97917 15.75 8 15.75C5.85417 15.75 4.02083 15 2.5 13.5C1 11.9792 0.25 10.1458 0.25 8C0.25 5.875 1 4.05208 2.5 2.53125C4.02083 1.01042 5.84375 0.25 7.96875 0.25C9.30208 0.25 10.5417 0.5625 11.6875 1.1875C12.8333 1.8125 13.7604 2.65625 14.4688 3.71875L14.375 0.625C14.375 0.520833 14.4062 0.4375 14.4688 0.375C14.5521 0.291667 14.6458 0.25 14.75 0.25H15.625Z" fill=""></path>
                                    </svg>
                                    Load More
                                `;
                                loadMoreBtn.disabled = false;
                            }
                            
                            // Hide button if no more pages
                            if (!data.hasMorePages) {
                                loadMoreBtn.style.display = 'none';
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            loadMoreBtn.innerHTML = 'Error loading posts. Try again';
                            loadMoreBtn.disabled = false;
                        });
                });
            }
        });
    </script>
    @endpush
</x-layout>