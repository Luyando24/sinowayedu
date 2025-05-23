@extends('layouts.app')

@section('title', 'Cities in China')

@section('content')
<section class="container my-5">
    <h2 class="mb-4 heading text-center">Explore Beautiful Cities in China</h2>
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($cities as $city)
        <a href="{{ route('city.view', $city->id) }}" class="text-decoration-none text-dark">
            <div class="col">
                <div class="card shadow-lg rounded-4 border-0">
                    <img 
                        src="{{ asset('storage/' . $city->image) }}" 
                        class="card-img-top" 
                        alt="{{ $city->name }} photo" 
                        style="object-fit: cover; height: 250px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $city->name }}</h5>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    {{-- Pagination Controls --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $cities->links() }}
    </div>
</section>
@endsection
