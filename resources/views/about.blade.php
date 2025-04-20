@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<section class="container my-5">
    <h2 class="mb-4 text-center heading">About Us</h2>

    <!-- Mission Section -->
    <div class="row mb-5">
        <div class="col-lg-6 mb-4">
            <h3 class="mb-3">Our Mission</h3>
            <p class="text-muted">
                Our mission is to provide accessible educational opportunities and guidance to international students, helping them navigate their study abroad journey with ease.
            </p>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('images/mission.webp') }}" class="img-fluid rounded-4 shadow-sm" alt="Our Mission">
        </div>
    </div>

    <!-- Vision Section -->
    <div class="row mb-5">
        <div class="col-lg-6 mb-4">
            <h3 class="mb-3">Our Vision</h3>
            <p class="text-muted">
                Our vision is to become the leading platform for international students by partnering with universities worldwide, creating a diverse educational community.
            </p>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('images/vision.jpg') }}" class="img-fluid rounded-4 shadow-sm" alt="Our Vision">
        </div>
    </div>

    <!-- History Section -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="mb-3">Our History</h3>
            <p class="text-muted">
                Founded in 2015, we started with a small group of passionate individuals dedicated to making study abroad opportunities accessible to students globally. Over the years, we've grown into a trusted partner for thousands of students and universities worldwide.
            </p>
        </div>
    </div>

    <!-- Values Section -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="mb-3">Our Values</h3>
            <ul class="list-unstyled">
                <li><strong>Integrity:</strong> We believe in being transparent, honest, and ethical in everything we do.</li>
                <li><strong>Innovation:</strong> We constantly seek new ways to improve the study abroad experience for students.</li>
                <li><strong>Collaboration:</strong> We work hand-in-hand with universities and partners to provide the best opportunities.</li>
                <li><strong>Excellence:</strong> We strive to provide the highest standard of service to students and partners alike.</li>
            </ul>
        </div>
    </div>

    <!-- Team Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h3 class="mb-4">Meet Our Team</h3>
            <div class="row g-4">
                <!-- Example Team Member 1 -->
                <div class="col-md-4">
                    <div class="card shadow-sm rounded-4 border-0">
                        <img src="{{ asset('images/steven.jpg') }}" class="card-img-top" alt="Team Member 1" style="object-fit: cover; height: 400px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Steven</h5>
                            <p class="text-muted">CEO & Founder</p>
                        </div>
                    </div>
                </div>
                <!-- Example Team Member 2 -->
                <div class="col-md-4">
                    <div class="card shadow-sm rounded-4 border-0">
                        <img src="{{ asset('images/team_member_2.jpg') }}" class="card-img-top rounded-circle" alt="Team Member 2" style="object-fit: cover; height: 250px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Jane Smith</h5>
                            <p class="text-muted">Chief Operations Officer</p>
                        </div>
                    </div>
                </div>
                <!-- Example Team Member 3 -->
                <div class="col-md-4">
                    <div class="card shadow-sm rounded-4 border-0">
                        <img src="{{ asset('images/team_member_3.jpg') }}" class="card-img-top rounded-circle" alt="Team Member 3" style="object-fit: cover; height: 250px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Mark Lee</h5>
                            <p class="text-muted">Marketing Director</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection