<?php

namespace App\Http\Controllers\Admin;

use App\Imports\BuwuanImport;
use App\Models\Buwuan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\BuwuanExport;
use App\Exports\TemplateExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Models\Master\Profil;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(Carbon::now()->format('Y-m-d'));
        if(Auth::user()->hasRole('superadmin')) {
            return view('admin.dashboard.index', [
                'buwuan' => Buwuan::get(),
            ]);
        }

        return view('admin.dashboard.index', [
            'buwuan' => Buwuan::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    public function exportBuwuan() 
    {
        return Excel::download(new BuwuanExport, 'buwuan.xlsx');
    }

    public function pdfprint()
    {
        if(Auth::user()->hasRole('superadmin')) {
            $buwuan = Buwuan::all();
        } else {
            $buwuan = Buwuan::where('user_id', Auth::user()->id)->get();
        }

        return view('admin.laporan.pdfprint', [
            'buwuan' => $buwuan,
            'profil' => Profil::where('user_id', Auth::user()->id)->first(),
        ]);
    }

    public function importbuwuan(Request $request) 
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        // menangkap file excel
		$file = $request->file('file');

        // membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
		$file->move('file_buwuan',$nama_file);

        // import data
        Excel::import(new BuwuanImport, public_path('/file_buwuan/'.$nama_file));
        
        return redirect()->route('buwuan')->with('success', 'Data Berhasil Diimport');
    }

    public function template() 
    {
        return Excel::download(new TemplateExport, 'template_buwuan.xlsx');
    }
}
