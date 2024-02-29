<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;

class PeminjamExport implements FromCollection, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function title(): string
    {
        return 'Peminjam Users';
    }

    public function collection()
    {
        return User::where('akses', 'peminjam')->get();
    }
}
