<?php

namespace App\Http\Controllers\Admin\Master;

use App\Models\Master\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAbleTo('kategori-read')) {
            $kategori = Kategori::get();
            return view('admin.kategori.index', compact('kategori'));
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
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
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

        $kategori = new Kategori;
        $kategori->kategori_nama = $request->nama;
        $kategori->kategori_ket = $request->ket;
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
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
        $kategori = Kategori::find($id);
        if(!empty($kategori)) {
            $this->validate($request, [
                'nama' => ['required', 'string', 'max:255' . $id],
            ]);

            $kategori->kategori_nama = $request->nama;
            $kategori->kategori_ket = $request->ket;
            $kategori->save();

            return redirect()->route('kategori.index')->with('success', 'Data Berhasil Diedit');
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
        $kategori = Kategori::find($id);
        if(!empty($kategori)) {
            $kategori->delete();
            
            return redirect()->route('kategori.index')->with('success', 'Data Berhasil Dihapus');
        }
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }
}
