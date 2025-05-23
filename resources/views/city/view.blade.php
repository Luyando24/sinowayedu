@extends('layouts.app')

@section('title', 'City Details')

@section('content')
    <x-city-details :city="$city" />
@endsection