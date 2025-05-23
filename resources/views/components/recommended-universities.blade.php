@php
use Illuminate\Support\Str;
@endphp

<section class="recommended-universities py-5 bg-light">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h4 class="mb-0 heading">Recommended Universities</h4>
            </div>
            <div class="col-auto">
                <h4 class="mb-0 heading"><a href="{{ url('universities') }}" class="text-decoration-none heading">View All</a></h4>
            </div>
        </div>
        
        @if($recommendedUniversities->isEmpty())
            <div class="alert alert-info">
                No recommended universities available at the moment.
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($recommendedUniversities as $university)
                    <div class="col">
                        <a href="{{ url('university.details', $university->id) }}" class="text-decoration-none text-dark">
                            <div class="card university-card h-100 shadow-sm border-0 rounded-4">
                                <img 
                                    src="{{ asset('storage/' . $university->photo) }}" 
                                    class="card-img-top rounded-top-4" 
                                    alt="{{ $university->name }}"
                                    style="height: 180px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $university->name }}</h5>
                                    <p class="card-text small text-muted mb-1">
                                        <i class="fas fa-map-marker-alt me-1"></i> {{ $university->city->name ?? 'N/A' }}
                                    </p>
                                    <p class="card-text small text-muted">
                                        <i class="fas fa-award me-1"></i> QS Rank: {{ $university->qs_rank ?? 'N/A' }}
                                    </p>
                                    <p class="card-text">{{ Str::limit(strip_tags($university->description), 80) }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-0 text-end">
                                    <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill px-3 py-2">
                                        <i class="fas fa-thumbs-up me-1"></i> Recommended
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>