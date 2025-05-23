@extends('layouts.app')

@section('title', 'Subscription Required')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header" style="background-color: #3EA2A4; color: white;">
                    <h4 class="mb-0 heading" style="color: #fff">Access Restricted</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-lock fa-4x secondary-color mb-3"></i>
                        @if(!auth()->check())
                            <h5 class="heading">Please login or register to continue</h5>
                            <p class="text-muted">
                                You need to be logged in to access this content.
                            </p>
                            <div class="mt-4">
                                <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                            </div>
                        @elseif(auth()->user()->usertype === 'normal')
                            <h5 class="heading">University details are restricted</h5>
                            <p class="text-muted">
                                Normal users cannot access university details. Please contact us to upgrade your account to partner status.
                            </p>
                        @else
                            <h5 class="heading">This content requires an active subscription</h5>
                            <p class="text-muted">
                                To access all university and program details, please subscribe to our premium service.
                            </p>
                            
                            <div class="row mt-4">
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <h5 class="card-title heading">Free Plan</h5>
                                            <p class="card-text">Limited access to 10 universities and 10 programs</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100" style="border-color: #3EA2A4;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title heading">Premium Plan</h5>
                                            <p class="card-text">Full access to all universities and programs</p>
                                            <a href="{{ route('payment.instructions') }}" class="primary-button">Subscribe Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

