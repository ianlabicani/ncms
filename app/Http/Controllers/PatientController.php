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

    // Apply filters based on the presence of query parameters
    if ($filterDate = $request->input('filter_date')) {
        $query->whereDate('registration_date', $filterDate);
    }

    if ($searchName = $request->input('search_name')) {
        $query->where(function ($q) use ($searchName) {
            $q->where('first_name', 'like', '%' . $searchName . '%')
              ->orWhere('last_name', 'like', '%' . $searchName . '%');
        });
        }

        // Get the filtered or non-filtered list of patients
        $patients = $query->get();
        $noRecordsMessage = $patients->isEmpty() && $request->input('search_name') ? 'No records found for the name ' . ($searchName ?? '') . '.' : 'No records found.';

    // Prepare the message for no records found

    // Pass the patients list and the no records message to the view
    return view('patients.index', compact('patients', 'noRecordsMessage'));
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
