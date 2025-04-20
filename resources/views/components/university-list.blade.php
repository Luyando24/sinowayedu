<section class="container my-5">
    <h2 class="mb-4 heading">Universities</h2>

    {{-- Search & Filter Form --}}
    <form method="GET" action="{{ url('universities') }}" class="mb-4">
        <div class="row g-3 align-items-end">
            {{-- University Name --}}
            <div class="col-md-5">
                <label for="name" class="form-label">University Name</label>
                <input type="text" id="name" name="name" value="{{ request('name') }}" class="form-control" placeholder="e.g. Tsinghua">
            </div>

            {{-- City --}}
            <div class="col-md-5">
                <label for="city" class="form-label">City</label>
                <select id="city" name="city_id" class="form-select">
                    <option value="">All Cities</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Submit --}}
            <div class="col-md-2 mt-3 d-grid">
                <button type="submit" class="btn btn-dark">Search</button>
            </div>
        </div>
    </form>

    {{-- Universities Grid --}}
    <div class="row row-cols-2 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach($universities as $university)
            <div class="col">
                <a href="{{ url('university.details', $university->id) }}" class="text-decoration-none text-dark">
                    <div class="card university-card shadow-lg rounded-4 border-0 h-100">
                        <img 
                            src="{{ asset('storage/' . $university->photo) }}" 
                            class="card-img-top" 
                            alt="{{ $university->name }} photo" 
                            style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ $university->name }}</h5>
                            <p class="mb-1 text-muted">
                                <strong>QS Rank:</strong> {{ $university->qs_rank ?? 'N/A' }}
                            </p>
                            <p class="mb-0 text-muted">
                                <strong>City:</strong> {{ $university->city->name ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $universities->withQueryString()->links() }}
    </div>
</section>