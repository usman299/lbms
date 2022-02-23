<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{

    public function view(): View
    {
        return view('admin.patient.export', [
            'users' =>   User::latest()->where('role', '2')->get()
        ]);
    }
}
