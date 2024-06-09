<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Patient::query();

        // Check if 'filter_date' is present in the request
        if ($request->has('filter_date')) {
            $filterDate = $request->input('filter_date');
            $query->whereDate('registration_date', $filterDate);
        }

        // Get the filtered or non-filtered list of patients
        $patients = $query->get();

        // Pass the patients list to the view
        return view('patients.index', compact('patients'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.add-patient');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'contact_number' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'registration_date' => 'required|date',
        ]);

        Patient::create($validated);

        return redirect()->back()->with('successadded', 'Patient created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.update-patient', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'contact_number' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'registration_date' => 'required|date',
        ]);

        $patient->update($validated);

        return redirect()->route('patients.index')->with('successupdate', 'Patient updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
