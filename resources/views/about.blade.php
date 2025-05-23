@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-4">About Us</h1>
            <p class="lead">SinoWay Education is dedicated to helping international students navigate their educational journey in China.</p>
            
            <h2 class="mt-5 mb-3">Our Mission</h2>
            <p>Our mission is to provide accessible educational opportunities and guidance to international students, helping them navigate their study abroad journey with ease.</p>
            
            <h2 class="mt-5 mb-3">Our Vision</h2>
            <p>To be the leading educational consultancy connecting international students with quality education in China.</p>
            
            <h2 class="mt-5 mb-3">Our Values</h2>
            <ul>
                <li><strong>Excellence</strong> - We strive for excellence in all our services</li>
                <li><strong>Integrity</strong> - We operate with honesty and transparency</li>
                <li><strong>Student-Centered</strong> - We put students' needs and success first</li>
                <li><strong>Cultural Bridge</strong> - We facilitate cultural understanding and exchange</li>
            </ul>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('images/mission.webp') }}" class="img-fluid rounded-4 shadow-sm" alt="Our Mission">
        </div>
    </div>
</div>
@endsection
