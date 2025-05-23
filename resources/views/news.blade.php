@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', 'Latest News')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h4 class="mb-0 heading">Latest News</h4>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($posts as $post)
                <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none text-dark">
                    <div class="col">
                        <div class="card shadow-sm border-0 rounded-4 h-100">
                            @if($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top rounded-top-4" alt="{{ $post->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ Str::limit($post->excerpt ?? strip_tags($post->body), 100) }}</p>
                                <small class="text-muted">{{ $post->created_at->format('F d, Y') }}</small>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <p>No news available at the moment.</p>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $posts->links() }} {{-- Laravel pagination --}}
        </div>
    </div>
</section>
@endsection
