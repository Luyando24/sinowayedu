@extends('layouts.app')

@section('title', 'Programs')

@section('content')
    <x-program-list :filteredPrograms="$filteredPrograms" :universities="$universities" :cities="$cities" :englishPrograms="$englishPrograms" :bachelorPrograms="$bachelorPrograms" :allPrograms="$allPrograms" :masterPrograms="$masterPrograms" :phdPrograms="$phdPrograms"/>
@endsection
