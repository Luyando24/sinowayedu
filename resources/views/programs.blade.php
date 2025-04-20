@extends('layouts.app')

@section('title', 'Programs')

@section('content')
    <x-program-list :programs="$programs" :universities="$universities" :cities="$cities"/>
@endsection
