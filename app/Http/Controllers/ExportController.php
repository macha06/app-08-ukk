<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportUsers()
    {
        return Excel::download(new UserExport(), 'Data_User_Perpustakaan_M-Puss.xlsx');
    }
}
