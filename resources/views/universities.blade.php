@extends('layouts.app')

@section('title', 'Universities')

@section('content')
<x-university-list :universities="$universities" :cities="$cities" />
@endsection