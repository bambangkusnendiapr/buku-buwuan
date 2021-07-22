<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Profil;
use Illuminate\Support\Facades\Auth;
use File;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAbleTo('profil-read')) {
            $profil = Profil::where('user_id', Auth::user()->id)->first();
            return view('admin.profil.index', compact('profil'));
        }
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama'      => ['required', 'string', 'max:255'],
            'filelogo'  => 'mimes:jpeg,jpg,png,gif|max:2000', // max 2000kb
        ],
        [
            'nama.required'     => 'Nama Harus Diisi',
            'filelogo.mimes'    => 'harus diisi file gambar jpeg,jpg,png,gif',
            'filelogo.max'      => 'maksimal 2 MB'
        ]);

        $profil = Profil::find($id);
        $profil->profil_nama = $request->nama;

        //cek logo
        if($request->hasFile('filelogo') == true)
        {
            $file = $request->file('filelogo');
            $filefoto = "logo".time()."".$file->getClientOriginalName();
            $file_ext  = $file->getClientOriginalExtension();
            
            $local_gambar = "images/profil/".$profil->profil_logo;
            if(File::exists($local_gambar))
            {
                File::delete($local_gambar);
            }

            $tujuan_upload = 'images/profil/';
            $file->move($tujuan_upload,$filefoto);
            $profil->profil_logo = $filefoto;
        }

        $profil->save();

        return redirect()->route('profil.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
