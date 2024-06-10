<?php

namespace App\Http\Controllers;

use App\Models\PatientVisit;
use Illuminate\Http\Request;

class PatientVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'visit_date' => 'required|date',
            'purpose' => 'required|string|max:255',
        ]);

        $patientVisit = new PatientVisit();
        $patientVisit->patient_id = $request->input('id');
        $patientVisit->visit_date = $request->input('visit_date');
        $patientVisit->purpose = $request->input('purpose');
        // Add more fields as necessary
        $patientVisit->save();

        return redirect()->route('patients.show', $request->id)->with('success', 'Patient visit record added successfully.');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
