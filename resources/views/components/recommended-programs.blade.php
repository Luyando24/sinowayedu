<section class="recommended-programs py-5">
    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h4 class="mb-0 heading">Recommended Programs</h4>
            </div>
            <div class="col-auto">
                <h4 class="mb-0 heading"><a href="{{ url('programs') }}" class="text-decoration-none heading">View All</a></h4>
            </div>
        </div>
        
        @if($recommendedPrograms->isEmpty())
            <div class="alert alert-info">
                No recommended programs available at the moment.
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($recommendedPrograms as $program)
                    <div class="col">
                        <a href="{{ route('program', $program->id) }}" class="text-decoration-none text-dark">
                            <div class="card program-card h-100 shadow-sm border-0 rounded-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $program->name }}</h5>
                                    <p class="card-text small text-muted mb-1">
                                        <i class="fas fa-university me-1"></i> {{ $program->university->name }}
                                    </p>
                                    <p class="card-text small text-muted mb-1 d-none d-md-block">
                                        <i class="fas fa-graduation-cap me-1"></i> {{ $program->degree->name ?? 'N/A' }}
                                    </p>
                                    <p class="card-text small text-muted mb-1">
                                        <i class="fas fa-language me-1"></i> {{ $program->language }}
                                    </p>
                                    <p class="card-text small text-muted mb-1 d-none d-md-block">
                                        <i class="fas fa-clock me-1"></i> {{ $program->duration }}
                                    </p>
                                    <p class="card-text small text-muted">
                                        <i class="fas fa-yuan-sign me-1"></i> {{ number_format($program->tuition_fee) }} RMB
                                    </p>
                                </div>
                                <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center">
                                    <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill px-3 py-2">
                                        <i class="fas fa-thumbs-up me-1"></i> Recommended
                                    </span>
                                    <span class="text-danger small">
                                        <i class="fas fa-calendar-alt me-1"></i> Deadline: {{ \Carbon\Carbon::parse($program->application_deadline)->format('M d, Y') }}
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


