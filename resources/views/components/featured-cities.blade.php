<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h4 class="mb-0 heading">Popular Cities</h4>
            </div>
            <div class="col-auto">
                <h4 class="mb-0 heading"><a href="{{url('cities')}}" class="text-decoration-none heading">All</a></h4>
            </div>
        </div></div>
    <div class="container text-center">
        
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($cities as $city)
                <div class="col">
                    <div class="card shadow-sm border-0 rounded-4">
                        <img src="{{ asset('storage/' . $city->image) }}" class="card-img-top" alt="{{ $city->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $city->name }}</h5>
                            <p class="card-text">{{ Str::limit($city->description, 100) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
