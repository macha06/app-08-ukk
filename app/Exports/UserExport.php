<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UserExport implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {
        $sheets = [
            'Admin' => new UserSheetView('admin'),
            'Petugas' => new UserSheetView('petugas'),
            'Peminjam' => new UserSheetView('peminjam'),
        ];

        return $sheets;
    }
}

class UserSheetView implements FromView
{
    public $akses;

    public function __construct($akses)
    {
        $this->akses = $akses;
    }

    public function view(): View
    {
        return view('exports_user', [
            'users' => User::where('akses', $this->akses)->get(),
            'akses' => $this->akses,
        ]);
    }
}

