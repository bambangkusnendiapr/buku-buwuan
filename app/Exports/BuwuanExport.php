<?php

namespace App\Exports;

use App\Models\Buwuan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;

class BuwuanExport implements FromView
{
    public function view(): View
    {
        if(Auth::user()->hasRole('superadmin')) {
            $data['buwuan'] = Buwuan::all();
        } else {
            $data['buwuan'] = Buwuan::where('user_id', Auth::user()->id);
        }
        return view('admin.laporan.buwuan', $data);
    }
}
