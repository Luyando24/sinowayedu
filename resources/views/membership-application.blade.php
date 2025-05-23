@extends('layouts.app')

@section('title', 'Apply for Membership - Sinowayedu')

@section('content')
<section class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="shadow rounded-4 p-4 bg-white">
        <h2 class="heading text-center mb-3">Join the Sinowayedu Network</h2>
        <p class="text-center mb-4 text-muted">
          Sign up to access exclusive resources for international student recruitment and stay ahead in the digital age
        </p>
        @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


        <form method="POST" action="{{ route('membership.submit') }}">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="col-md-6">
              <label for="partner" class="form-label">Name of Company/Agency</label>
              <input type="text" class="form-control" id="partner" name="company_name" required>
            </div>

            <div class="col-md-6">
              <label for="country" class="form-label">Country of Residence</label>
              <input type="text" class="form-control" id="country" name="country" required>
            </div>

            <div class="col-md-6">
              <label for="city" class="form-label">City of Residence</label>
              <input type="text" class="form-control" id="city" name="city" required>
            </div>

            <div class="col-md-6">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="col-md-6">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="col-12">
              <button type="submit" class="btn primary-button w-100">Submit Application</button>
            </div>
          </div>
        </form>

        <p class="text-center mt-3 text-muted">Already have an account? <a href="{{ route('login') }}">Log in here</a></p>
      </div>
    </div>
  </div>
</section>
@endsection
