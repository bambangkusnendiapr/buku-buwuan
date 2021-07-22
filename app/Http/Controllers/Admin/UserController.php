<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Role;
use App\Models\Santri;
use App\Models\Guru;
use App\Models\Master\Surat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAbleTo('pengguna-read')) {
            $users = User::get();
            $roles = Role::get();
            return view('admin.user.index', compact('users', 'roles'));
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
        return $this->_akses();
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::find($request->role_id);

        $user->attachRole($role);

        $user_akhir = User::latest()->first();

        DB::table('profil_tb')->insert(
            ['user_id' => $user_akhir->id]
        );

        return redirect()->route('user.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->_akses();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->_akses();
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
            $user = User::find($id);
            if(!empty($user)) {
                $this->validate($request, [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
                    'role_id' => ['required']
                ]);

                $user->name = $request->name;
                $user->email = $request->email;

                $user->save();
    
                // $user->update([
                //     'name' => $request->name,
                //     'email' => $request->email
                // ]);
    
                $roles = $user->roles;
    
                foreach ($roles as $role) {
                    $user->detachRole($role);
                }
    
                $role = Role::find($request->role_id);
    
                $user->attachRole($role);
    
                return redirect()->route('user.index')->with('success', 'Data Berhasil Diedit');
            }
            return redirect()->route('user.index')->with('warning', 'Data Tidak Ditemukan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $user = User::find($id);  
            $local = "images/".$user->image;
            File::delete($local);          
            if(!empty($user)) {
                $roles = $user->roles;

                foreach ($roles as $role) {
                    $user->detachRole($role);
                }

                $user->delete();

                return redirect()->route('user.index')->with('success', 'Data Berhasil Dihapus');
            }
            return redirect()->route('user.index')->with('warning', 'Data Tidak Ditemukan');
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.profile.index', compact('user'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $user = User::find($id);
        if(!empty($user)) {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
                'filefoto' => 'mimes:jpeg,jpg,png,gif|max:2000' // max 2000kb/2mb
            ],
            [
                'filefoto.mimes' => 'harus diisi file gambar',
                'filefoto.max' => 'maksimal 2 MB'
            ]);

            $user->name = $request->name;
            $user->email = $request->email;

            if($request->hasFile('filefoto') == true)
            {
                $file = $request->file('filefoto');
                $filefoto = time()."".$file->getClientOriginalName();
                $file_ext  = $file->getClientOriginalExtension();

                $local_gambar = "images/".$user->image;
                $tujuan_upload = 'images/';
                
                if(File::exists($local_gambar))
                {
                    File::delete($local_gambar);
                }

                
                $file->move($tujuan_upload,$filefoto);
                $user->image = $filefoto;
            }

            $user->save();

            return redirect()->route('profile')->with('success', 'Data Berhasil Diedit');
        }

        return redirect()->route('dashboard')->with('warning', 'Data Tidak Ditemukan');
    }

    public function profilePassword(Request $request, $id)
    {
        $user = User::find($id);
        if(!empty($user)) {

            $this->validate($request, [
                'password' => ['required', 'string', 'min:8', 'confirmed',]
            ],
            [
                'password.required' => 'Password Harus diisi',
                'password.min' => 'Panjang password minimal 8 karakter',
                'password.confirmed' => 'Password tidak cocok'
            ]);

            $user->update([
                'password' => Hash::make($request->password),
            ]);

            if($request->user == 'user') {
                return redirect()->route('user.index')->with('success', 'Password Berhasil Diganti');
            }

            return redirect()->route('profile')->with('success', 'Password Berhasil Diganti');
        }
        return redirect()->route('dashboard')->with('warning', 'Data Tidak Ditemukan');
    }

    public function daftar(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'umur' => ['required', 'max:255'],
            'jk' => ['required'],
            'no' => ['required'],
            'alamat' => ['required']
        ],
        [
            'email.email' => 'Isi dengan format email',
            'email.unique' => 'Email ini sudah digunakan',
            'password.min' => 'Minimal password 8 karakter',
            'password.confirmed' => 'Password tidak cocok',
            'umur.required' => 'Umur Harus Diisi',
            'no.required' => 'Nomor HP/WA Harus Diisi'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->attachRole('user');

        $user_id = User::orderBy('id','desc')->first();

        $santri = new Santri;
        $santri->santri_umur        = $request->umur;
        $santri->santri_jk          = $request->jk;
        $santri->santri_hafal       = $request->hafalan;
        $santri->santri_no          = $request->no;
        $santri->santri_alamat      = $request->alamat;
        $santri->user_id            = $user_id->id;
        $santri->kelas_id           = 1;
        $santri->surat_id           = 1;
        $santri->save();

        return redirect()->route('login')->with('success', 'Pendaftaran Berhasil! Silahkan Login!');
    }

    private function _akses() {
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }
}
