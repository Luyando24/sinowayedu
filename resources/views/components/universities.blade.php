<section class="container my-5">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h4 class="mb-0 heading">Featured Universities</h4>
        </div>
        <div class="col-auto">
            <h4 class="mb-0 heading"><a href="#" class="text-decoration-none heading">All</a></h4>
        </div>
    </div>

    <div class="row">
        @foreach($featuredUniversities as $university)
            <div class="col-md-4 mb-4">
                <a href="{{ url('university.details', $university->id) }}" class="text-decoration-none text-dark">
                    <div class="card university-card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/' . $university->photo) }}" class="card-img-top" alt="{{ $university->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $university->name }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($university->description), 100) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>