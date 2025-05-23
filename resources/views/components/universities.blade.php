@php
use Illuminate\Support\Str;
@endphp

<section class="featured-universities py-5">
    <div class="container">
        <h2 class="section-title mb-4">Featured Universities</h2>
        <p class="section-description mb-5">Discover top universities offering quality education and diverse programs.</p>

    <div class="row">
        @foreach($featuredUniversities as $university)
            <div class="col-md-4 mb-4">
                <a href="{{ url('university.details', $university->id) }}" class="text-decoration-none text-dark">
                    <div class="card university-card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/' . $university->photo) }}" class="card-img-top" alt="{{ $university->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $university->name }}</h5>
                            <p class="card-text d-none d-md-block">{{ Str::limit(strip_tags($university->description), 100) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>

