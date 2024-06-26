<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Patient extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'contact_number',
        'email',
        'address',
        'registration_date',
    ];

    public function getAgeWithMonthsAttribute()
    {
        $dob = Carbon::parse($this->attributes['date_of_birth']);
        $years = $dob->diffInYears(Carbon::now());
        $months = $dob->diffInMonths(Carbon::now()) % 12;
        return "{$years} years {$months} months";
    }

    public function patientVisits()
    {
        return $this->hasMany(PatientVisit::class, 'patient_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        //   return LogOptions::defaults()->logOnly(['*']);
        return LogOptions::defaults()->logOnly([
            'first_name',
            'last_name',
            'date_of_birth',
            'gender',
            'contact_number',
            'email',
            'address',
            'registration_date'
        ]);
    }
}
