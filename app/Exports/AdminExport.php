<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class AdminExport implements FromCollection, WithTitle
{
    
    public function title(): string
    {
        return 'Admin_Users';
    }
    public function collection()
    {
        return User::where('akses', 'admin')->get();
    }
}
