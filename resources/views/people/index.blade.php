
@extends('layouts.app')

@section('content')
    <h2>People List</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    @if(isset($people) && count($people) > 0)
        <ul>
            @foreach($people as $person)
                <li>
                    {{ $person->first_name }} {{ $person->last_name }}
                    <form method="post" action="{{ route('people.destroy', $person->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Error: 404 no records found</p>
    @endif

    <a href="{{ route('people.create') }}">Create New Person</a>
@endsection
