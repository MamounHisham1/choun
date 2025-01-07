@foreach($blogs as $blog)
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
@endforeach