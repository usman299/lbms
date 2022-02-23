<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InvoicesExport implements FromView
{
    
    public function view(): View
    {
        return view('admin.patient.export', [
            'patients' =>   User::latest()->where('role', '2')->get()
        ]);
    }
}
