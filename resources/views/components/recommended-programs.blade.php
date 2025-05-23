<section class="recommended-programs py-5 bg-white">
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
            <div class="row row-cols-2 row-cols-md-2 row-cols-lg-4 g-4">
                @foreach($recommendedPrograms as $program)
                    <div class="col">
                        <a href="{{ route('program', $program->id) }}" class="text-decoration-none text-dark">
                            <div class="card program-card h-100 shadow-sm border-0 rounded-4">
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-bold mb-3">{{ $program->name }}</h5>
                                    <div class="program-details">
                                        <p class="card-text small text-muted mb-2">
                                            <i class="fas fa-university me-2"></i> {{ $program->university->name }}
                                        </p>
                                        <p class="card-text small text-muted mb-2 d-none d-md-block">
                                            <i class="fas fa-graduation-cap me-2"></i> {{ $program->degree->name ?? 'N/A' }}
                                        </p>
                                        <p class="card-text small text-muted mb-2">
                                            <i class="fas fa-language me-2"></i> {{ $program->language }}
                                        </p>
                                        <p class="card-text small text-muted mb-2 d-none d-md-block">
                                            <i class="fas fa-clock me-2"></i> {{ $program->duration }}
                                        </p>
                                        <p class="card-text small text-muted mb-0">
                                            <i class="fas fa-yuan-sign me-2"></i> {{ number_format($program->tuition_fee) }} RMB
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center p-3">
                                    <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill px-3 py-2">
                                        <i class="fas fa-thumbs-up me-1"></i> Recommended
                                    </span>
                                    <span class="text-danger small">
                                        <i class="fas fa-calendar-alt me-1"></i> 
                                        <span class="d-none d-md-inline">Deadline: </span>
                                        {{ \Carbon\Carbon::parse($program->application_deadline)->format('M d, Y') }}
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

<style>
.program-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #ffffff;
    border-left: 4px solid #3EA2A4 !important;
}

.program-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.program-details {
    padding-left: 10px;
    border-left: 2px solid #f0f0f0;
}

@media (max-width: 767.98px) {
    .program-card {
        margin-bottom: 15px;
    }
    
    .card-footer {
        flex-direction: column;
        align-items: flex-start !important;
    }
    
    .card-footer .badge {
        margin-bottom: 8px;
    }
}

.recommended-programs {
    background-color: #f8f9fa;
}
</style>


