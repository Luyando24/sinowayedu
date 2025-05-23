<section class="container my-5">
    <h2 class="mb-4 heading">Available Programs</h2>

    {{-- Filters --}}
    <form method="GET" action="{{ route('programs.index') }}" class="mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label for="city" class="form-label">City</label>
                <select name="city_id" id="city" class="form-select">
                    <option value="">All Cities</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="university" class="form-label">University</label>
                <select name="university_id" id="university" class="form-select">
                    <option value="">All Universities</option>
                    @foreach($universities as $university)
                        <option value="{{ $university->id }}" {{ request('university_id') == $university->id ? 'selected' : '' }}>
                            {{ $university->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label for="language" class="form-label">Language</label>
                <select name="language" id="language" class="form-select">
                    <option value="">All Languages</option>
                    <option value="English" {{ request('language') == 'English' ? 'selected' : '' }}>English</option>
                    <option value="Chinese" {{ request('language') == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="search" class="form-label">Search</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Program name..." value="{{ request('search') }}">
            </div>

            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-dark">Filter</button>
            </div>
        </div>
    </form>

    {{-- Subscription Notice for Limited Results --}}
    @if(auth()->check() && auth()->user()->usertype === 'partner' && !auth()->user()->subscribed())
    <div class="alert alert-info mb-4" style="background-color: #3EA2A4; color: white; border: none;">
        <div class="d-flex align-items-center">
            <i class="fas fa-info-circle me-2"></i>
            <div>
                <strong>Limited Access:</strong> You're viewing 10 out of {{ $programs->total() }} available programs. 
                <a href="/payment-instructions" class="alert-link" style="color: #FFDD02;">Subscribe now</a> for full access.
            </div>
        </div>
    </div>
    @endif

    {{-- University Access Notice for Normal Users --}}
    @if(!auth()->check() || (auth()->check() && auth()->user()->usertype === 'normal'))
    <div class="alert alert-warning mb-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-info-circle me-2"></i>
            <div>
                <strong>Note:</strong> Normal users can view all programs but cannot access university details. 
                @if(!auth()->check())
                <a href="{{ route('register') }}" class="alert-link">Register</a> or 
                <a href="{{ route('login') }}" class="alert-link">login</a> to continue.
                @endif
            </div>
        </div>
    </div>
    @endif

    {{-- Program Table --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark" style="background-color: #3EA2A4; color: #FFDD02;">
                <tr>
                    <th>Program</th>
                    <th class="d-none d-md-table-cell">University</th>
                    <th class="d-none d-md-table-cell">Language</th>
                    <th class="d-none d-lg-table-cell">Duration</th>
                    <th class="d-none d-lg-table-cell">Tuition Fee</th>
                    <th class="d-none d-lg-table-cell">Deadline</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($programs as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                            @if($item->degree)
                                <small class="text-muted d-block">({{ $item->degree->name }})</small>
                            @endif
                        </td>
                        <td class="d-none d-md-table-cell">{{ $item->university->name }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->language }}</td>
                        <td class="d-none d-lg-table-cell">{{ $item->duration }}</td>
                        <td class="d-none d-lg-table-cell">¥{{ number_format($item->tuition_fee) }}</td>
                        <td class="d-none d-lg-table-cell">
                            {{ \Carbon\Carbon::parse($item->application_deadline)->format('M d, Y') }}
                        </td>
                        <td>
                            <a href="{{ route('program', $item->id) }}" class="btn btn-sm" style="background-color: #3EA2A4; color: #FFDD02;">
                                View Details
                            </a>                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No programs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        @if(auth()->check() && auth()->user()->subscribed())
            {{ $programs->withQueryString()->links() }}
        @endif
    </div>
</section>

