<section class="container my-5">
    {{-- University Banner --}}
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <img src="{{ asset('storage/' . $university->photo) }}" class="w-100" style="height: 300px; object-fit: cover;" alt="{{ $university->name }} image">
                <div class="card-body bg-white">
                    <h2 class="mb-2">{{ $university->name }}</h2>
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
                        <p class="mt-3 text-muted">{{ strip_tags($university->description) }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Programs Offered --}}
    <div class="mb-4">
        <h3 class="mb-3">Programs Offered at {{ $university->name }}</h3>

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
                            <th class="d-none d-md-table-cell">Degree</th>
                            <th class="d-none d-md-table-cell">Language</th>
                            <th class="d-none d-lg-table-cell">Duration</th>
                            <th class="d-none d-lg-table-cell">Tuition Fee</th>
                            <th class="d-none d-lg-table-cell">Deadline</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(auth()->check())
                            @foreach($university->programs as $program)
                                <tr>
                                    <td>{{ $program->name }}</td>
                                    <td class="d-none d-md-table-cell">{{ $program->degree->name ?? 'N/A' }}</td>
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
                                    <p class="mb-2">Please <a href="{{ route('membership-application') }}">register</a> or <a href="{{ route('login') }}">login</a> to view available programs.</p>
                                    <a href="{{ route('membership-application') }}" class="btn btn-primary btn-sm">Register Now</a>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</section>
