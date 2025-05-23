@extends('layouts.app')

@section('title', 'Restricted Access')

@section('content')
<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 text-center">
                    <h3 class="mb-4">Access Restricted</h3>

                    <p class="mb-4 text-muted">
                        You must be logged in to view available programs.
                    </p>

                    <div class="d-grid mb-3">
                        <a href="{{ route('login') }}" class="btn btn-primary primary-button">
                            Login
                        </a>
                    </div>

                    <div class="text-center mt-3">
                        <span>Don't have an account?</span>
                        <a href="{{ route('membership-application') }}" class="text-decoration-none fw-semibold">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
