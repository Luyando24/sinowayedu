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

            <div class="col-md-2">
                <button type="submit" class="btn primary-button w-100">Search</button>
            </div>
        </div>
    </form>

    {{-- Access Notice for Normal Users --}}
    @if(!auth()->check() || (auth()->check() && auth()->user()->usertype === 'normal'))
    <div class="alert alert-warning mb-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-info-circle me-2"></i>
            <div>
                <strong>Limited Access:</strong> You're viewing a limited selection of universities with restricted details.
                @if(!auth()->check())
                <a href="{{ route('register') }}" class="alert-link">Register as a partner</a> for more access.
                @else
                Contact us to upgrade your account to partner status for full access.
                @endif
            </div>
        </div>
    </div>
    @endif

    {{-- Subscription Notice for Limited Results --}}
    @if(auth()->check() && auth()->user()->usertype === 'partner' && !auth()->user()->subscribed())
    <div class="alert alert-info mb-4" style="background-color: #3EA2A4; color: white; border: none;">
        <div class="d-flex align-items-center">
            <i class="fas fa-info-circle me-2"></i>
            <div>
                <strong>Limited Access:</strong> You're viewing 10 out of {{ $universities->total() }} available universities. 
                <a href="/payment-instructions" class="alert-link" style="color: #FFDD02;">Subscribe now</a> for full access.
            </div>
        </div>
    </div>
    @endif

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
                            <h5 class="card-title mb-2">
                                @if(!auth()->check() || (auth()->check() && auth()->user()->usertype === 'normal'))
                                    University in {{ $university->city->name }}
                                @else
                                    {{ $university->name }}
                                @endif
                            </h5>
                            <p class="mb-1 text-muted">
                                <strong>QS Rank:</strong> {{ $university->qs_rank ?? 'N/A' }}
                            </p>
                            <p class="mb-0 text-muted d-none d-md-block">
                                <strong>City:</strong> {{ $university->city->name ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
        @if(auth()->check() && auth()->user()->usertype === 'partner')
            {{ $universities->withQueryString()->links() }}
        @endif
    </div>
</section>

