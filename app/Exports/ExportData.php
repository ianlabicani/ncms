<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportData implements FromCollection, WithHeadings
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
}
