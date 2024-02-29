<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;

class PetugasExport implements FromCollection, WithTitle
{
    public function title(): string
    {
        return 'Petugas Users';
    }

    public function collection()
    {
        return User::where('akses', 'petugas')->get();
    }
}
