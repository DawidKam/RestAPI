<!-- resources/views/people/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Edit Person</h2>

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <form method="post" action="{{ route('people.update', $person->id) }}">
        @csrf
        @method('PUT')

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="{{ $person->first_name }}" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="{{ $person->last_name }}" required>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" value="{{ $person->phone_number }}" required>

        <label for="street">Street:</label>
        <input type="text" name="street" value="{{ $person->street }}" required>

        <label for="city">City:</label>
        <input type="text" name="city" value="{{ $person->city }}" required>

        <label for="country">Country:</label>
        <input type="text" name="country" value="{{ $person->country }}" required>

        <label for="apartment_number">Apartment Number:</label>
        <input type="text" name="apartment_number" value="{{ $person->apartment_number }}" required>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('people.index') }}">Back to People List</a>
@endsection
