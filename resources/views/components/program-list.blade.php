<section class="container my-5">
    <h2 class="mb-4 heading text-center">Top Recommended Programs</h2>

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
                <button type="submit" class="btn" style="background-color: #3EA2A4; color: #FFDD02;">Filter</button>
            </div>
        </div>
    </form>

    {{-- Access Notices --}}
   {{-- @include('components.program-access-notices')--}}

    {{-- Program Categories --}}
    <div class="row">
        <div class="col-12">
            {{-- Make tabs scrollable on mobile --}}
            <nav class="overflow-auto">
                <div class="nav nav-tabs flex-nowrap" id="program-tabs" role="tablist" style="border-bottom-color: #3EA2A4;">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#english" type="button" style="color: #3EA2A4;">English Taught</button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#chinese" type="button" style="color: #3EA2A4;">Chinese Taught</button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#bachelor" type="button" style="color: #3EA2A4;">Bachelor's</button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#master" type="button" style="color: #3EA2A4;">Master's</button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#phd" type="button" style="color: #3EA2A4;">PhD</button>
                </div>
            </nav>

            <div class="tab-content pt-4" id="program-content">
                {{-- English Taught Programs Tab --}}
                <div class="tab-pane fade show active" id="english" role="tabpanel">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-md-4">
                        @foreach($englishPrograms as $program)
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">{{ $program->name }}</h5>
                                        @if($program->degree)
                                            <p class="card-subtitle mb-2 text-muted">{{ $program->degree->name }}</p>
                                        @endif
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="badge bg-primary">{{ $program->language }}</span>
                                            <a href="{{ route('program', $program->id) }}" class="btn btn-sm" style="background-color: #3EA2A4; color: #FFDD02;">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Repeat the same structure for other tabs --}}
                {{-- Bachelor's Programs Tab --}}
                <div class="tab-pane fade" id="bachelor" role="tabpanel">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-md-4">
                        @foreach($bachelorPrograms as $program)
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">{{ $program->name }}</h5>
                                        @if($program->degree)
                                            <p class="card-subtitle mb-2 text-muted">{{ $program->degree->name }}</p>
                                        @endif
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="badge bg-primary">{{ $program->language }}</span>
                                            <a href="{{ route('program', $program->id) }}" class="btn btn-sm" style="background-color: #3EA2A4; color: #FFDD02;">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Master's Programs Tab --}}
                <div class="tab-pane fade" id="master" role="tabpanel">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-md-4">
                        @foreach($masterPrograms as $program)
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">{{ $program->name }}</h5>
                                        @if($program->degree)
                                            <p class="card-subtitle mb-2 text-muted">{{ $program->degree->name }}</p>
                                        @endif
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="badge bg-primary">{{ $program->language }}</span>
                                            <a href="{{ route('program', $program->id) }}" class="btn btn-sm" style="background-color: #3EA2A4; color: #FFDD02;">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- PhD Programs Tab --}}
                <div class="tab-pane fade" id="phd" role="tabpanel">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-md-4">
                        @foreach($phdPrograms as $program)
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">{{ $program->name }}</h5>
                                        @if($program->degree)
                                            <p class="card-subtitle mb-2 text-muted">{{ $program->degree->name }}</p>
                                        @endif
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="badge bg-primary">{{ $program->language }}</span>
                                            <a href="{{ route('program', $program->id) }}" class="btn btn-sm" style="background-color: #3EA2A4; color: #FFDD02;">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
    <section class="container my-5">
    <h2 class="mb-4 heading text-center">All Programs</h2>
    {{-- Subscription Notice for Normal Users --}}
    @if(!auth()->check() || (auth()->check() && auth()->user()->usertype === 'normal'))
    <div class="alert alert-warning mb-4" style="background-color: #3EA2A4; color: white; border: none;">
        <div class="d-flex align-items-center">
            <i class="fas fa-info-circle me-2"></i>
            <div>
                <strong>Note:</strong> You're signed in as a student. Please contact us to apply. Are you an agent? <a href="{{ url('payment-instructions') }}" style="color: #FFDD02;">Upgrade</a> your account to see university info. 
                @if(!auth()->check())
                <a href="{{ route('register') }}" class="alert-link" style="color: #FFDD02;">Register</a> or 
                <a href="{{ route('login') }}" class="alert-link" style="color: #FFDD02;">login</a> to continue.
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
                    @if(!auth()->check() || (auth()->check() && auth()->user()->usertype === 'normal'))
                    <th class="d-none d-md-table-cell"></th>
                    @else
                    <th class="d-none d-md-table-cell">University</th>
                    @endif
                    <th class="d-none d-md-table-cell">Language</th>
                    <th class="d-none d-lg-table-cell">Duration</th>
                    <th class="d-none d-lg-table-cell">Tuition Fee</th>
                    <th class="d-none d-lg-table-cell">Deadline</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($allPrograms as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                            @if($item->degree)
                                <small class="text-muted d-block">({{ $item->degree->name }})</small>
                            @endif
                        </td>
                        <td class="d-none d-md-table-cell">
                            @if(!auth()->check() || (auth()->check() && auth()->user()->usertype === 'normal'))
                            <!--<span class="text-muted">Subscribe to view</span>-->
                            @else
                                {{ $item->university->name }}
                            @endif
                        </td>
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
</section>
