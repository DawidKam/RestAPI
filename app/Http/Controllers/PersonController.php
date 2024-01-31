<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PersonController extends Controller
{
    public function index()
    {
        try {
            $people = Person::all();
            return view('people.index', compact('people'));
        } catch (ModelNotFoundException $e) {
            return view('people.index')->with('error', '404 no records found');
        }
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(Request $request)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'apartment_number' => 'nullable|string|max:255',
        ]);

        // Zapisanie nowej osoby do bazy danych
        Person::create($request->all());

        // Przekierowanie po udanym zapisie
        return redirect()->route('people.index')->with('success', 'Person created successfully');
    }

    public function show($id)
    {
        try {
            $person = Person::findOrFail($id);
            return view('people.show', compact('person'));
        } catch (ModelNotFoundException $e) {
            return view('people.show')->with('error', '404 person not found');
        }
    }

    public function edit($id)
    {
        try {
            $person = Person::findOrFail($id);
            return view('people.edit', compact('person'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('people.index')->with('error', '404 person not found');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $person = Person::findOrFail($id);
            $person->update($request->all());

            return redirect()->route('people.index')->with('success', 'Person updated successfully');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('people.index')->with('error', '404 person not found');
        }
    }

    public function destroy($id)
    {
        try {
            $person = Person::findOrFail($id);
            $person->delete();

            return redirect()->route('people.index')->with('success', 'Person deleted successfully');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('people.index')->with('error', '404 person not found');
        }
    }
}

