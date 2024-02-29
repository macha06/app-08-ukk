<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserExport implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {
        
        $sheets = [
            'Admin' => new UserSheetView('admin', 'Admin'),
            'Petugas' => new UserSheetView('petugas', 'Petugas'),
            'Peminjam' => new UserSheetView('peminjam', 'Peminjam'),
        ];
        

        return $sheets;
    }
    
}

class UserSheetView implements FromView, WithTitle
{
    public $akses;
    public $sheetName;

    public function __construct($akses, $sheetName)
    {
        $this->akses = $akses;
        $this->sheetName = $sheetName;
    }

    public function title(): string
    {
        return $this->sheetName;
    }

    public function view(): View
    {
        return view('exports_user', [
            'users' => User::where('akses', $this->akses)->get(),
            'akses' => $this->akses,
        ]);
    }
}

