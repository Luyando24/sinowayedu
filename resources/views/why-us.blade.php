@extends('layouts.app')

@section('title', 'Why Choose Us')

@section('content')
<section class="container my-5">
    <h2 class="mb-4 text-center heading">Why Choose Us</h2>

    <!-- Key Features Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <div class="col">
                    <div class="card shadow-sm rounded-4 border-0 text-center">
                        <img src="{{ asset('images/feature1.webp') }}" class="card-img-top" alt="Feature 1" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">Expert Guidance</h5>
                            <p class="text-muted">Our team of experts offers personalized counseling to guide you through every step of your study abroad journey.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm rounded-4 border-0 text-center">
                        <img src="{{ asset('images/feature2.png') }}" class="card-img-top" alt="Feature 2" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">Diverse Programs</h5>
                            <p class="text-muted">We partner with top universities to offer a wide range of programs in various fields to match your career goals.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm rounded-4 border-0 text-center">
                        <img src="{{ asset('images/feature3.webp') }}" class="card-img-top" alt="Feature 3" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">Global Network</h5>
                            <p class="text-muted">We have a vast network of global university partners, ensuring you have the best opportunities in your field of study.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Our Partners Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="mb-4 text-center heading">Our Partners</h2>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4 justify-content-center">
            @php
                $partners = [
                    ['name' => 'GlobalEdu Alliance', 'image' => 'feature1.webp'],
                    ['name' => 'StudyWorld Co.', 'image' => 'feature2.png'],
                    ['name' => 'BrightFutures Ltd.', 'image' => 'feature3.webp'],
                    ['name' => 'EduBridge Partners', 'image' => 'feature1.webp'],
                    ['name' => 'CareerLink Global', 'image' => 'feature2.png'],
                    ['name' => 'NextGen Learning', 'image' => 'feature3.webp'],
                ];
            @endphp

            @foreach ($partners as $partner)
                <div class="col text-center">
                    <div class="card shadow-sm border-0 rounded-4 h-100">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/' . $partner['image']) }}" alt="{{ $partner['name'] }}" class="mb-3" style="width: 80px; height: 80px; object-fit: contain;">
                            <h6 class="text-muted mb-0">{{ $partner['name'] }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

