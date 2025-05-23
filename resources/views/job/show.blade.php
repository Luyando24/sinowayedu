@extends('layouts.app')

@section('title', $job->title . ' - Careers at ZGF')

@section('content')
<section class="container my-5">
  <div class="mb-4">
    <a href="{{ route('careers') }}" class="text-decoration-none text-muted">
      ← Back to Job Listings
    </a>
  </div>

  <div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
      <h2 class="fw-bold mb-2 heading">{{ $job->title }}</h2>
      <div class="mb-3">
        <span class="badge rounded-pill" style="background: #61A534">{{ $job->type }}</span>
        <span class="badge bg-light text-dark border">{{ $job->category }}</span>
        <span class="ms-3 text-muted"><strong>Location:</strong> {{ $job->city ?? 'China' }}</span>
      </div>

      <div class="mb-4 text-muted small">
        Posted on {{ $job->created_at->format('F j, Y') }}
      </div>
      <div class="mb-4 text-muted small">
        <strong>Application deadline:</strong> {{ \Carbon\Carbon::parse($job->application_deadline)->format('F j, Y') }}
<span class="text-muted">({{ \Carbon\Carbon::parse($job->application_deadline)->diffForHumans() }})</span>

      </div>

      <hr>

      <div class="mb-4">
        <h5 class="fw-semibold">Job Description</h5>
        <div class="text-muted">{!! nl2br($job->description) !!}</div>
      </div>

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



<h4 class="mt-5 mb-3">Apply for this Position</h4>
<form action="{{ route('job.apply', ['career' => $career->slug]) }}" enctype="multipart/form-data" method="POST">
  @csrf
  <input type="hidden" name="career_id" value="{{ $career->id }}">

  <!-- Name -->
  <div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>

  <!-- Email -->
  <div class="mb-3">
    <label for="email" class="form-label">Email Address</label>
    <input type="email" name="email" class="form-control" required>
  </div>

  <!-- Phone -->
  <div class="mb-3">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="text" name="phone" class="form-control" required>
  </div>

  <!-- Cover Letter -->
  <div class="mb-3">
    <label for="cover_letter" class="form-label">Cover Letter</label>
    <textarea name="cover_letter" class="form-control" rows="5" required></textarea>
  </div>

  <!-- CV Upload -->
  <div class="mb-3">
    <label for="cv" class="form-label">Upload CV (PDF)</label>
    <input type="file" name="cv" class="form-control" accept="application/pdf" required>
  </div>

  <!-- Submit Button -->
  <button type="submit" class="btn btn-primary" style="background: #61A534; border-color: #61A534">
    Submit Application
  </button>
</form>


    </div>
  </div>
</section>
@endsection
