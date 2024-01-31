
@extends('layouts.app')

@section('content')
    @if(isset($person))
        <h2>{{ $person->first_name }} {{ $person->last_name }}</h2>
        <p>Phone Number: {{ $person->phone_number }}</p>
        <p>Street: {{ $person->street }}</p>
        <p>City: {{ $person->city }}</p>
        <p>Country: {{ $person->country }}</p>
        <p>Apartment Number: {{ $person->apartment_number }}</p>
    @else
        <p>Error: 404 person not found</p>
    @endif
@endsection
