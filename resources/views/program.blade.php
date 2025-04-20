@extends('layouts.app')

@section('title', $program->name)

@section('content')
<x-program-details :program="$program" :universities="$universities" :cities="$cities" />

@endsection
