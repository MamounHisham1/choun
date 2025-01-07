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
                <div class="row wow bounceIn">
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

                
            </div>
        </section>
    </main>
</x-layout>