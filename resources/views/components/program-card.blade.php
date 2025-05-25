<div class="col">
    <div class="card h-100 shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            <h5 class="card-title">{{ $program->name }}</h5>
            @if($program->degree)
                <p class="card-text text-primary mb-2">
                    <i class="fas fa-graduation-cap me-2"></i>{{ $program->degree->name }}
                </p>
            @endif
            <p class="card-text small text-muted mb-2">
                @if(!auth()->check() || (auth()->check() && auth()->user()->usertype === 'normal'))
                    <i class="fas fa-university me-2"></i>Subscribe to view
                @else
                    <i class="fas fa-university me-2"></i>{{ $program->university->name }}
                @endif
            </p>
            <p class="card-text small text-muted mb-2">
                <i class="fas fa-clock me-2"></i>{{ $program->duration }}
            </p>
            <p class="card-text small text-muted">
                <i class="fas fa-yuan-sign me-2"></i>¥{{ number_format($program->tuition_fee) }}
            </p>
        </div>
        <div class="card-footer bg-transparent border-0 p-4 pt-0">
            <a href="{{ route('program', $program->id) }}" class="btn btn-primary w-100" style="background-color: #3EA2A4; border: none;">
                View Details
            </a>
        </div>
    </div>
</div>