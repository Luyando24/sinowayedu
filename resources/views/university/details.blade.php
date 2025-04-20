@extends('layouts.app')

@section('title', 'University Details')

@section('content')
    <x-university-details :university="$universityDetails" :programs="$studyOptions" />
@endsection