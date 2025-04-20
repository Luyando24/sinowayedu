@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
<section class="container my-5">
  <h2 class="mb-4 heading text-center">Search Results</h2>

  @if($programs->count())
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      @foreach($programs as $program)
        <div class="col">
          <a href="{{ route('program', $program->id) }}" class="text-decoration-none text-dark">
            <div class="card program-card shadow-lg rounded-4 border-0 h-100">
              <div class="card-body text-center">
                <h5 class="card-title">{{ $program->name }}</h5>
                <p class="card-text">
                  {{ $program->scholarship }} - {{ $program->intake }}<br>
                  <i> <b>{{ $program->university->name }}</b></i><br>
                  Application ends {{ $program->application_deadline }}<br>
                  Duration: {{ $program->duration }}<br>
                  Tuition: {{ $program->tuition_fee }} RMB
                </p>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center">
      {{ $programs->links() }}
    </div>
  @else
    <p class="text-center">No programs match your search.</p>
  @endif
</section>
@endsection

<style>
    .program-card:hover{
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
    background-color: grey;
}
</style>