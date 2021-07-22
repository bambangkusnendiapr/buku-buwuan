<?php

namespace App\Http\Controllers\Admin\Master;

use App\Models\Master\Blok;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAbleTo('blok-read')) {
            $blok = Blok::get();
            return view('admin.blok.index', compact('blok'));
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
        $this->validate($request, [
            'nama' => ['required', 'string', 'max:255'],
        ]);

        $blok = new Blok;
        $blok->blok_nama = $request->nama;
        $blok->blok_ket = $request->ket;
        $blok->save();

        return redirect()->route('blok.index')->with('success', 'Data Berhasil Disimpan');
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
        $blok = Blok::find($id);
        if(!empty($blok)) {
            $this->validate($request, [
                'nama' => ['required', 'string', 'max:255' . $id],
            ]);

            $blok->blok_nama = $request->nama;
            $blok->blok_ket = $request->ket;
            $blok->save();

            return redirect()->route('blok.index')->with('success', 'Data Berhasil Diedit');
        }
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blok = Blok::find($id);
        if(!empty($blok)) {
            $blok->delete();
            
            return redirect()->route('blok.index')->with('success', 'Data Berhasil Dihapus');
        }
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }
}
