<!-- resources/views/people/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Create Person</h2>

    <form method="post" action="{{ route('people.store') }}">
        @csrf

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required>

        <label for="street">Street:</label>
        <input type="text" name="street" required>

        <label for="city">City:</label>
        <input type="text" name="city" required>

        <label for="country">Country:</label>
        <input type="text" name="country" required>

        <label for="apartment_number">Apartment Number:</label>
        <input type="text" name="apartment_number">

        <button type="submit">Create Person</button>
    </form>
@endsection
