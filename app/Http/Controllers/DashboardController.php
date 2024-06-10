<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {   $today = Carbon::today();
        $startOfWeek = Carbon::now()->startOfWeek();
        $startOfMonth = Carbon::now()->startOfMonth();
        $startOfYear = Carbon::now()->startOfYear();

        $patientsToday = Patient::whereDate('created_at', $today)->count();
        $patientsThisWeek = Patient::whereDate('created_at', '>=', $startOfWeek)->count();
        $patientsThisMonth = Patient::whereDate('created_at', '>=', $startOfMonth)->count();
        $patientsThisYear = Patient::whereDate('created_at', '>=', $startOfYear)->count();

        return view('home', compact('patientsToday', 'patientsThisWeek', 'patientsThisMonth', 'patientsThisYear'));
    }
}
