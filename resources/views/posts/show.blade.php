@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', $post->title)

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('news') }}" class="text-decoration-none">News</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($post->title, 40) }}</li>
                    </ol>
                </nav>

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    @if($post->featured_image)
                        <div class="featured-image-container" style="height: 400px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-100" style="object-fit: cover; height: 100%;" alt="{{ $post->title }}">
                        </div>
                    @endif

                    <div class="card-body p-4 p-md-5">
                        <!-- Post metadata -->
                        <div class="d-flex align-items-center mb-4">
                            <div class="post-meta">
                                <span class="text-muted">
                                    <i class="far fa-calendar-alt me-1"></i> {{ $post->created_at->format('F d, Y') }}
                                </span>
                                @if($post->category)
                                <span class="ms-3 badge bg-primary">{{ $post->category }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Post title -->
                        <h1 class="card-title heading mb-4">{{ $post->title }}</h1>

                        <!-- Post content -->
                        <div class="card-text post-content mb-5">
                            {!! $post->content !!}
                        </div>

                        <!-- Tags -->
                        @if(isset($post->tags) && count($post->tags) > 0)
                        <div class="post-tags mb-4">
                            <h5 class="heading">Tags</h5>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($post->tags as $tag)
                                <a href="#" class="badge bg-light text-dark text-decoration-none">{{ $tag }}</a>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Social sharing -->
                        <div class="social-sharing mb-4">
                            <h5 class="heading">Share This Post</h5>
                            <div class="d-flex gap-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fab fa-facebook-f"></i> Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                    <i class="fab fa-twitter"></i> Twitter
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                    <i class="fab fa-linkedin-in"></i> LinkedIn
                                </a>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="btn btn-sm btn-outline-success">
                                    <i class="fab fa-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                        </div>

                        <!-- Navigation buttons -->
                        <div class="post-navigation d-flex justify-content-between mt-5 pt-4 border-top">
                            <a href="{{ route('news') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to News
                            </a>
                            
                            @if(isset($nextPost))
                            <a href="{{ route('post.show', $nextPost->slug) }}" class="btn primary-button">
                                Next Post<i class="fas fa-arrow-right ms-2"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Related posts -->
                @if(isset($relatedPosts) && count($relatedPosts) > 0)
                <div class="related-posts mt-5">
                    <h3 class="heading mb-4">You May Also Like</h3>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach($relatedPosts as $relatedPost)
                        <div class="col">
                            <a href="{{ route('post.show', $relatedPost->slug) }}" class="text-decoration-none text-dark">
                                <div class="card h-100 shadow-sm border-0 rounded-4">
                                    @if($relatedPost->featured_image)
                                    <img src="{{ asset('storage/' . $relatedPost->featured_image) }}" class="card-img-top rounded-top-4" alt="{{ $relatedPost->title }}" style="height: 160px; object-fit: cover;">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ Str::limit($relatedPost->title, 60) }}</h5>
                                        <p class="card-text small text-muted">{{ $relatedPost->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>

<!-- Add custom styles for the post content -->
<style>
    .post-content {
        line-height: 1.8;
        font-size: 1.1rem;
    }
    
    .post-content h2, .post-content h3, .post-content h4 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        color: #1A4D4E;
    }
    
    .post-content p {
        margin-bottom: 1.2rem;
    }
    
    .post-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 1.5rem 0;
    }
    
    .post-content ul, .post-content ol {
        margin-bottom: 1.2rem;
        padding-left: 1.5rem;
    }
    
    .post-content blockquote {
        border-left: 4px solid #3EA2A4;
        padding-left: 1rem;
        margin-left: 0;
        color: #555;
        font-style: italic;
    }
    
    @media (max-width: 768px) {
        .post-content {
            font-size: 1rem;
        }
    }
</style>
@endsection
