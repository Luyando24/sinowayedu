<section class="container my-5">
    {{-- University Banner --}}
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <img src="{{ asset('storage/' . $university->photo) }}" class="w-100" style="height: 300px; object-fit: cover;" alt="{{ $university->name }} image">
                <div class="card-body bg-white">
                    <h2 class="mb-2">
                        @if(!auth()->check() || (auth()->check() && auth()->user()->usertype === 'normal'))
                            University in {{ $university->city->name }}
                        @else
                            {{ $university->name }}
                        @endif
                    </h2>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <strong>QS Rank:</strong> {{ $university->qs_rank ?? 'N/A' }}
                        </div>
                        <div class="col-md-4 mb-2">
                            <strong>City:</strong> {{ $university->city->name ?? 'N/A' }}
                        </div>
                        <div class="col-md-4 mb-2">
                            <strong>Province:</strong> {{ $university->city->province->name ?? 'N/A' }}
                        </div>
                    </div>
                    @if($university->description)
                        <p class="mt-3 text-muted">
                            @if(!auth()->check() || (auth()->check() && auth()->user()->usertype === 'normal'))
                                This university offers various programs for international students.
                            @else
                                {{ strip_tags($university->description) }}
                            @endif
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Programs Offered --}}
    <div class="mb-4">
        <h3 class="mb-3">
            @if(!auth()->check() || (auth()->check() && auth()->user()->usertype === 'normal'))
                Programs Offered at this University
            @else
                Programs Offered at {{ $university->name }}
            @endif
        </h3>

        @if($university->programs->isEmpty())
            <div class="alert alert-info">
                No programs available for this university.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Program</th>
                            <th class="d-none d-md-table-cell">Language</th>
                            <th class="d-none d-lg-table-cell">Duration</th>
                            <th class="d-none d-lg-table-cell">Tuition Fee</th>
                            <th class="d-none d-lg-table-cell">Deadline</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(auth()->check() && auth()->user()->canAccessUniversityDetails())
                            @foreach($university->programs as $program)
                                <tr>
                                    <td>{{ $program->name }}</td>
                                    <td class="d-none d-md-table-cell">{{ $program->language ?? 'N/A' }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $program->duration ?? 'N/A' }}</td>
                                    <td class="d-none d-lg-table-cell">¥{{ number_format($program->tuition_fee) }}</td>
                                    <td class="d-none d-lg-table-cell">
                                        {{ $program->application_deadline ? \Carbon\Carbon::parse($program->application_deadline)->format('M d, Y') : 'N/A' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('program', $program->id) }}" class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">
                                    <p class="mb-2">
                                        @if(!auth()->check())
                                            Please <a href="{{ route('register') }}">register</a> or <a href="{{ route('login') }}">login</a> as a partner to view university details.
                                        @else
                                            Normal users cannot access university details. Please contact us to upgrade your account to partner status.
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</section>


