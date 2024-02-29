<?php

namespace App\Exports;

use App\Models\Buku;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BukuExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports_buku', [
            'buku' => Buku::all(),
        ]);
    }
}
