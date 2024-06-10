<?php

namespace App\Exports;

use App\Models\Patient;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportData implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        return Patient::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'First Name',
            'Last Name',
            'Date of Birth',
            'Gender',
            'Contact Number',
            'Email',
            'Address',
            'Registration Date',
            'Created At',
            'Updated At',
        ];
    }
    public function map($patient): array
    {
        return [
            $patient->id,
            $patient->first_name,
            $patient->last_name,
            Carbon::parse($patient->date_of_birth)->format('F j Y'), // Format date as "March 12 2003"
            $patient->gender,
            $patient->contact_number,
            $patient->email,
            $patient->address,
            // $patient->registration_date,
            Carbon::parse($patient->registration_date)->format('F j Y'),
        ];
    }
}
