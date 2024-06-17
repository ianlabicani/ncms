<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        $data = ActivityLog::all();
        return view('activity-log', compact('data'));
    }
}
