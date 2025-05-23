@extends('layouts.app')

@section('title', 'Career Opportunities for International Students - Sinowayedu')
@php
use Illuminate\Support\Str;
@endphp

@section('content')
<section class="container my-5">
  <div class="text-center mb-5">
    <h2 class="heading">Career Opportunities in China</h2>
    <p class="text-muted">
      Find your dream job after graduation and transition smoothly from student visa to work permit
    </p>
  </div>

  <!-- Filter Card -->
  <div class="card border-0 shadow rounded-4 mb-5">
    <div class="card-body">
      <form method="GET" action="{{ route('careers') }}" class="row g-3 align-items-end">
        <div class="col-md-4">
          <label class="form-label fw-semibold">Job Title</label>
          <input type="text" name="title" value="{{ request('title') }}" class="form-control" placeholder="e.g. English Teacher">
        </div>
        <div class="col-md-3">
          <label class="form-label fw-semibold">Category</label>
          <select name="category" class="form-select">
            <option value="">All Categories</option>
            <option value="Education" {{ request('category') == 'Education' ? 'selected' : '' }}>Education</option>
            <option value="IT" {{ request('category') == 'IT' ? 'selected' : '' }}>IT & Technology</option>
            <option value="Business" {{ request('category') == 'Business' ? 'selected' : '' }}>Business & Finance</option>
            <option value="Engineering" {{ request('category') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
            <option value="Healthcare" {{ request('category') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label fw-semibold">Location</label>
          <input type="text" name="location" value="{{ request('location') }}" class="form-control" placeholder="e.g. Beijing">
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn primary-button w-100">
            <i class="bi bi-search"></i> Search
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Visa Support Info -->
  <div class="card border-0 shadow rounded-4 mb-5" style="border-left: 5px solid #3EA2A4 !important;">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-md-2 text-center mb-3 mb-md-0">
          <i class="fas fa-passport fa-3x primary-color"></i>
        </div>
        <div class="col-md-10">
          <h5 class="heading">Visa Support Guarantee</h5>
          <p class="mb-0">Sinowayedu provides comprehensive assistance in transitioning from a student visa to a work permit. Our dedicated team will guide you through the entire process, from job application to visa conversion, ensuring a smooth transition into your professional career in China.</p>
        </div>
      </div>
    </div>
  </div>

  @if($jobs->count())
    <div class="row g-4">
      @foreach($jobs as $job)
        <div class="col-md-6 col-lg-6">
          <div class="card shadow-sm h-100 border-0 rounded-4">
            <div class="card-body d-flex flex-column justify-content-between">
              <div>
                <h5 class="card-title fw-bold heading">{{ $job->title }}</h5>
                <div class="mb-2">
                  <span class="badge rounded-pill" style="background: #3EA2A4">{{ $job->type }}</span>
                  <span class="badge bg-light text-dark border">{{ $job->category }}</span>
                </div>
                <p class="text-muted small">
                  {{ Str::limit(strip_tags($job->description), 120, '...') }}
                </p>
              </div>

              <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted"><strong>Location:</strong> {{ $job->city ?? 'China' }}</small>
                <a href="{{ route('job.show', $job->slug) }}" class="btn btn-sm primary-button px-3">
                  View Details & Apply
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="mt-5 d-flex justify-content-center">
      {{ $jobs->links() }}
    </div>
  @else
    <div class="text-center mt-5">
      <p class="text-muted fs-5">There are currently no open positions. Please check back later.</p>
    </div>
  @endif

  <!-- Additional Information -->
  <div class="row mt-5 pt-4 border-top">
    <div class="col-md-6 mb-4">
      <div class="card h-100 border-0 shadow-sm rounded-4">
        <div class="card-body">
          <h5 class="heading">Work Permit Requirements</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item border-0 ps-0"><i class="fas fa-check-circle primary-color me-2"></i> Bachelor's degree or higher</li>
            <li class="list-group-item border-0 ps-0"><i class="fas fa-check-circle primary-color me-2"></i> Two years of relevant work experience</li>
            <li class="list-group-item border-0 ps-0"><i class="fas fa-check-circle primary-color me-2"></i> Valid passport with at least 12 months validity</li>
            <li class="list-group-item border-0 ps-0"><i class="fas fa-check-circle primary-color me-2"></i> Clean criminal record</li>
            <li class="list-group-item border-0 ps-0"><i class="fas fa-check-circle primary-color me-2"></i> Health certificate from authorized hospital</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="card h-100 border-0 shadow-sm rounded-4">
        <div class="card-body">
          <h5 class="heading">How Sinowayedu Helps You</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item border-0 ps-0"><i class="fas fa-star secondary-color me-2"></i> Job matching based on your skills and qualifications</li>
            <li class="list-group-item border-0 ps-0"><i class="fas fa-star secondary-color me-2"></i> Resume and interview preparation</li>
            <li class="list-group-item border-0 ps-0"><i class="fas fa-star secondary-color me-2"></i> Documentation assistance for work permit application</li>
            <li class="list-group-item border-0 ps-0"><i class="fas fa-star secondary-color me-2"></i> Translation services for required documents</li>
            <li class="list-group-item border-0 ps-0"><i class="fas fa-star secondary-color me-2"></i> Direct coordination with employers for visa sponsorship</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
