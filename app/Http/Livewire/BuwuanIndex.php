<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\Buwuan;
use App\Models\Master\Kategori;
use App\Models\Master\Blok;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class BuwuanIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $cobasaja = "coba Saja ya";

    public $state = [];

    public $paginate = 10;
    public $cari = "Semua";
    public $lunas = "Semua";
    public $blok_cari = "Semua";
    public $cariUser = "Semua";

    public $buwuanId;
    public $kategoriEdit;
    public $tglEdit;
    public $namaEdit;
    public $blokEdit;
    public $jumlahEdit;
    public $ketEdit;

    public $foo;
    public $search = '';
    public $page = 1;

    protected $queryString = [
        'foo',
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public $idHapusBuwuan = null;

    public $idPelunasan = null;
    public $pelunasanTgl;

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function addNew()
    {
        $this->dispatchBrowserEvent('show-form');
    }

    public function createBuwuan()
    {
        Validator::make($this->state, [
            'kategori' => 'required',
            'tgl' => 'required|date',
            'nama' => 'required',
            'blok' => 'required',
            'jumlah' => 'required',
        ])->validate();

        $buwuan = new Buwuan;
        $buwuan->kategori_id = $this->state['kategori'];
        $buwuan->buwuan_tgl = $this->state['tgl'];
        $buwuan->buwuan_nama = $this->state['nama'];
        $buwuan->blok_id = $this->state['blok'];
        $buwuan->buwuan_jumlah = str_replace('.','', $this->state['jumlah']);
        if(!empty($this->state['ket'])) {
            $buwuan->buwuan_ket = $this->state['ket'];
        }
        $buwuan->user_id = Auth::user()->id;
        $buwuan->save();

        $this->resetInput();

        $this->dispatchBrowserEvent('hide-form');
    }

    public function edit($id)
    {
        // $this->state = $data->toArray();

        $buwuan = Buwuan::find($id);

        $this->buwuanId        = $buwuan->id;
        $this->kategoriEdit    = $buwuan->kategori_id;
        $this->tglEdit         = $buwuan->buwuan_tgl;
        $this->namaEdit        = $buwuan->buwuan_nama;
        $this->blokEdit        = $buwuan->blok_id;
        $this->jumlahEdit      = $buwuan->buwuan_jumlah;
        $this->ketEdit         = $buwuan->buwuan_ket;

        $this->dispatchBrowserEvent('show-form-edit');
    }

    public function updateBuwuan()
    {
        Validator::make($this->state, [
            'tgl' => 'date',
        ])->validate();

        $buwuan = Buwuan::find($this->buwuanId);
        $buwuan->kategori_id    = $this->kategoriEdit;
        $buwuan->buwuan_tgl     = $this->tglEdit;
        $buwuan->buwuan_nama    = $this->namaEdit;
        $buwuan->blok_id        = $this->blokEdit;
        $buwuan->buwuan_jumlah  = str_replace('.','', $this->jumlahEdit);
        if(!empty($this->ketEdit)) {
            $buwuan->buwuan_ket = $this->ketEdit;
        }
        $buwuan->save();

        $this->resetInput();

        $this->dispatchBrowserEvent('hide-form-edit');
    }

    public function delete($id)
    {
        $this->idHapusBuwuan = $id;

        $this->dispatchBrowserEvent('show-form-delete');
    }

    public function deleteBuwuan()
    {
        $buwuan = Buwuan::find($this->idHapusBuwuan);

        $buwuan->delete();

        $this->dispatchBrowserEvent('hide-form-delete');
    }

    public function pelunasan($id)
    {
        $this->idPelunasan = $id;

        $this->dispatchBrowserEvent('show-form-pelunasan');
    }

    public function updatePelunasan()
    {
        $buwuan = Buwuan::find($this->idPelunasan);

        $buwuan->buwuan_lunas = 'Lunas';
        $buwuan->buwuan_lunas_tgl = $this->pelunasanTgl;

        $buwuan->save();

        $this->pelunasanTgl = null;

        $this->dispatchBrowserEvent('hide-form-pelunasan');

    }

    public function render()
    {
        if(Auth::user()->hasRole('superadmin')) {

            //KOSONG
            //search = null & cari = Semua & lunas = Semua & blok_cari = Semua
            if($this->search === '' && $this->cari === 'Semua' && $this->lunas === 'Semua' && $this->blok_cari === 'Semua' && $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->paginate($this->paginate);
    
            //SATU
            //search != null & cari = Semua & lunas = Semua & blok_cari = Semua
            } else if($this->search != '' && $this->cari === 'Semua' && $this->lunas === 'Semua' && $this->blok_cari === 'Semua' &&  $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->paginate($this->paginate);
    
            //search = null & cari != Semua & lunas = Semua & blok_cari = Semua
            } else if($this->search === '' && $this->cari != 'Semua' && $this->lunas === 'Semua' && $this->blok_cari === 'Semua' && $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('kategori_id', $this->cari)->paginate($this->paginate);
    
            //search = null & cari = Semua & lunas != Semua & blok_cari = Semua
            } else if($this->search === '' && $this->cari === 'Semua' && $this->lunas != 'Semua' && $this->blok_cari === 'Semua' && $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_lunas', $this->lunas)->paginate($this->paginate);
    
            //search = null & cari = Semua & lunas = Semua & blok_cari != Semua
            } else if($this->search === '' && $this->cari === 'Semua' && $this->lunas === 'Semua' && $this->blok_cari != 'Semua' && $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('blok_id', $this->blok_cari)->paginate($this->paginate);

            //cariUser
            } else if ($this->search === '' && $this->cari === 'Semua' && $this->lunas === 'Semua' && $this->blok_cari === 'Semua' && $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('user_id', $this->cariUser)->paginate($this->paginate);
            
            //DUA
            //search dan kategori
            //search != null & cari != Semua & lunas = Semua & blok_cari = Semua
            } else if($this->search != '' && $this->cari != 'Semua' && $this->lunas === 'Semua' && $this->blok_cari === 'Semua' &&  $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('kategori_id', $this->cari)->paginate($this->paginate);
            
            //search dan lunas
            //search != null & cari = Semua & lunas != Semua & blok_cari = Semua
            } else if($this->search != '' && $this->cari === 'Semua' && $this->lunas != 'Semua' && $this->blok_cari === 'Semua' &&  $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('buwuan_lunas', $this->lunas)->paginate($this->paginate);
            
            //search dan blok
            //search != null & cari = Semua & lunas = Semua & blok_cari != Semua
            } else if($this->search != '' && $this->cari === 'Semua' && $this->lunas === 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('blok_id', $this->blok_cari)->paginate($this->paginate);

            //search dan user
            //search != null & cari = Semua & lunas = Semua & blok_cari = Semua & cariUse != semua
            } else if($this->search != '' && $this->cari === 'Semua' && $this->lunas === 'Semua' && $this->blok_cari === 'Semua' && $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('user_id', $this->cariUser)->paginate($this->paginate);
            
            //kategori dan lunas
            //search = null & cari != Semua & lunas != Semua & blok_cari = Semua
            } else if($this->search === '' && $this->cari != 'Semua' && $this->lunas != 'Semua' && $this->blok_cari === 'Semua' &&  $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('kategori_id', $this->cari)->where('buwuan_lunas', $this->lunas)->paginate($this->paginate);
            
            //kategori dan blok
            //search = null & cari != Semua & lunas = Semua & blok_cari != Semua
            } else if($this->search === '' && $this->cari != 'Semua' && $this->lunas === 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('kategori_id', $this->cari)->where('blok_id', $this->blok_cari)->paginate($this->paginate);

            //kategori dan user
            //search = null & cari != Semua & lunas = Semua & blok_cari = Semua & cariUser != semua
            } else if ($this->search === '' && $this->cari != 'Semua' && $this->lunas === 'Semua' && $this->blok_cari === 'Semua' &&  $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('kategori_id', $this->cari)->where('user_id', $this->cariUser)->paginate($this->paginate);
            
            //lunas dan blok
            //search = null & cari = Semua & lunas != Semua & blok_cari != Semua
            } else if($this->search === '' && $this->cari === 'Semua' && $this->lunas != 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_lunas', $this->lunas)->where('blok_id', $this->blok_cari)->paginate($this->paginate);

            //lunas dan user
            //search = null & cari = Semua & lunas != Semua & blok_cari = Semua & cariUser != semua
            } else if($this->search === '' && $this->cari === 'Semua' && $this->lunas != 'Semua' && $this->blok_cari === 'Semua' &&  $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_lunas', $this->lunas)->where('user_id', $this->cariUser)->paginate($this->paginate);

            //blok user
            //search = null & cari = Semua & lunas = Semua & blok_cari != Semua & cariUser != semua
            } else if($this->search === '' && $this->cari === 'Semua' && $this->lunas === 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('blok_id', $this->blok_cari)->where('user_id', $this->cariUser)->paginate($this->paginate);
            
            //TIGA
            //search kategori lunas
            //search != null & cari != Semua & lunas != Semua & blok_cari = Semua
            } else if($this->search != '' && $this->cari != 'Semua' && $this->lunas != 'Semua' && $this->blok_cari === 'Semua' &&  $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('kategori_id', $this->cari)->where('buwuan_lunas', $this->lunas)->paginate($this->paginate);
            
            //search kategori blok
            //search != null & cari != Semua & lunas = Semua & blok_cari != Semua
            } else if ($this->search != '' && $this->cari != 'Semua' && $this->lunas === 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('kategori_id', $this->cari)->where('blok_id', $this->blok_cari)->paginate($this->paginate);

            //search kategori user
            //search != null & cari != Semua & lunas = Semua & blok_cari = Semua & cariuser != semua
            } else if($this->search != '' && $this->cari != 'Semua' && $this->lunas === 'Semua' && $this->blok_cari === 'Semua' &&  $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('kategori_id', $this->cari)->where('user_id', $this->cariUser)->paginate($this->paginate);
            
            //search lunas blok
            //search != null & cari = Semua & lunas != Semua & blok_cari != Semua
            } else if($this->search != '' && $this->cari === 'Semua' && $this->lunas != 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('buwuan_lunas', $this->lunas)->where('blok_id', $this->blok_cari)->paginate($this->paginate);

            //search lunas user
            //search != null & cari = Semua & lunas != Semua & blok_cari = Semua & cariuser != semua
            } else if($this->search != '' && $this->cari === 'Semua' && $this->lunas != 'Semua' && $this->blok_cari === 'Semua' &&  $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('buwuan_lunas', $this->lunas)->where('user_id', $this->cariUser)->paginate($this->paginate);

            //sarch blok user
            //search != null & cari = Semua & lunas = Semua & blok_cari != Semua & cariuser != semua
            } else if($this->search != '' && $this->cari === 'Semua' && $this->lunas === 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('blok_id', $this->blok_cari)->where('user_id', $this->cariUser)->paginate($this->paginate);
            
            //kategori lunas blok
            //search = null & cari != Semua & lunas != Semua & blok_cari != Semua
            } else if ($this->search === '' && $this->cari != 'Semua' && $this->lunas != 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('kategori_id', $this->cari)->where('buwuan_lunas', $this->lunas)->where('blok_id', $this->blok_cari)->paginate($this->paginate);

            //kategori lunas user
            //search = null & cari != Semua & lunas != Semua & blok_cari = Semua & user !=semua
            } else if ($this->search === '' && $this->cari != 'Semua' && $this->lunas != 'Semua' && $this->blok_cari === 'Semua' &&  $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('kategori_id', $this->cari)->where('buwuan_lunas', $this->lunas)->where('user_id', $this->cariUser)->paginate($this->paginate);

            //kategori blok user
            //search = null & cari != Semua & lunas != Semua & blok_cari = Semua & user !=semua
            } else if($this->search === '' && $this->cari != 'Semua' && $this->lunas === 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('kategori_id', $this->cari)->where('blok_id', $this->blok_cari)->where('user_id', $this->cariUser)->paginate($this->paginate);

            //lunas blok user
            //search = null & cari = Semua & lunas != Semua & blok_cari != Semua & user !=semua
            } else if($this->search === '' && $this->cari === 'Semua' && $this->lunas != 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('blok_id', $this->blok_cari)->where('buwuan_lunas', $this->lunas)->where('user_id', $this->cariUser)->paginate($this->paginate);

            //EMPAT
            //tanpa USER
            //search != null & cari != Semua & lunas != Semua & blok_cari != Semua & user =semua
            } else if($this->search != '' && $this->cari != 'Semua' && $this->lunas != 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser === 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('kategori_id', $this->cari)->where('buwuan_lunas', $this->lunas)->where('blok_id', $this->blok_cari)->paginate($this->paginate);

            //tanpa blok
            //search != null & cari != Semua & lunas != Semua & blok_cari = Semua & user !=semua
            } else if($this->search != '' && $this->cari != 'Semua' && $this->lunas != 'Semua' && $this->blok_cari === 'Semua' &&  $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('kategori_id', $this->cari)->where('buwuan_lunas', $this->lunas)->where('user_id', $this->cariUser)->paginate($this->paginate);

            //tanpa SEARCH
            //search = null & cari != Semua & lunas != Semua & blok_cari != Semua & user !=semua
            } else if($this->search === '' && $this->cari != 'Semua' && $this->lunas != 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('blok_id', $this->blok_cari)->where('kategori_id', $this->cari)->where('buwuan_lunas', $this->lunas)->where('user_id', $this->cariUser)->paginate($this->paginate);

            //tanpa KATEGORI
            //search != null & cari = Semua & lunas != Semua & blok_cari != Semua & user !=semua
            } else if($this->search != '' && $this->cari === 'Semua' && $this->lunas != 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('blok_id', $this->blok_cari)->where('buwuan_lunas', $this->lunas)->where('user_id', $this->cariUser)->paginate($this->paginate);

            //tanpa LUNAS
            //search != null & cari != Semua & lunas = Semua & blok_cari != Semua & user !=semua
            } else if($this->search != '' && $this->cari != 'Semua' && $this->lunas === 'Semua' && $this->blok_cari != 'Semua' &&  $this->cariUser != 'Semua') {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('blok_id', $this->blok_cari)->where('kategori_id', $this->cari)->where('user_id', $this->cariUser)->paginate($this->paginate);
            
            } else {
                $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('kategori_id', $this->cari)->where('buwuan_lunas', $this->lunas)->where('blok_id', $this->blok_cari)->where('user_id', $this->cariUser)->paginate($this->paginate);
            }
    
            $kategori = Kategori::get();
            $blok = Blok::get();
            $users = User::get();
            return view('livewire.buwuan-index', compact('buwuan', 'kategori', 'blok', 'users'));
        }

        // USER
        //search = null & cari = Semua & lunas = Semua & blok_cari = Semua
        if($this->search === '' && $this->cari === 'Semua' && $this->lunas === 'Semua' && $this->blok_cari === 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->paginate($this->paginate);

        //search != null & cari = Semua & lunas = Semua & blok_cari = Semua
        } else if($this->search != '' && $this->cari === 'Semua' && $this->lunas === 'Semua' && $this->blok_cari === 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('user_id', Auth::user()->id)->paginate($this->paginate);

        //search = null & cari != Semua & lunas = Semua & blok_cari = Semua
        } else if($this->search === '' && $this->cari != 'Semua' && $this->lunas === 'Semua' && $this->blok_cari === 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('kategori_id', $this->cari)->where('user_id', Auth::user()->id)->paginate($this->paginate);

        //search = null & cari = Semua & lunas != Semua & blok_cari = Semua
        } else if($this->search === '' && $this->cari === 'Semua' && $this->lunas != 'Semua' && $this->blok_cari === 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_lunas', $this->lunas)->where('user_id', Auth::user()->id)->paginate($this->paginate);

        //search = null & cari = Semua & lunas = Semua & blok_cari != Semua
        } else if($this->search === '' && $this->cari === 'Semua' && $this->lunas === 'Semua' && $this->blok_cari != 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('blok_id', $this->blok_cari)->where('user_id', Auth::user()->id)->paginate($this->paginate);
        
        //search != null & cari != Semua & lunas = Semua & blok_cari = Semua
        } else if($this->search != '' && $this->cari != 'Semua' && $this->lunas === 'Semua' && $this->blok_cari === 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('kategori_id', $this->cari)->where('user_id', Auth::user()->id)->paginate($this->paginate);
        
        //search != null & cari = Semua & lunas != Semua & blok_cari = Semua
        } else if($this->search != '' && $this->cari === 'Semua' && $this->lunas != 'Semua' && $this->blok_cari === 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('buwuan_lunas', $this->lunas)->where('user_id', Auth::user()->id)->paginate($this->paginate);
        
        //search != null & cari = Semua & lunas = Semua & blok_cari != Semua
        } else if($this->search != '' && $this->cari === 'Semua' && $this->lunas === 'Semua' && $this->blok_cari != 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('blok_id', $this->blok_cari)->where('user_id', Auth::user()->id)->paginate($this->paginate);
        
        //search = null & cari != Semua & lunas != Semua & blok_cari = Semua
        } else if($this->search === '' && $this->cari != 'Semua' && $this->lunas != 'Semua' && $this->blok_cari === 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('kategori_id', $this->cari)->where('buwuan_lunas', $this->lunas)->where('user_id', Auth::user()->id)->paginate($this->paginate);
        
        //search = null & cari != Semua & lunas = Semua & blok_cari != Semua
        } else if($this->search === '' && $this->cari != 'Semua' && $this->lunas === 'Semua' && $this->blok_cari != 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('kategori_id', $this->cari)->where('blok_id', $this->blok_cari)->where('user_id', Auth::user()->id)->paginate($this->paginate);
        
        //search = null & cari = Semua & lunas != Semua & blok_cari != Semua
        } else if($this->search === '' && $this->cari === 'Semua' && $this->lunas != 'Semua' && $this->blok_cari != 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_lunas', $this->lunas)->where('blok_id', $this->blok_cari)->where('user_id', Auth::user()->id)->paginate($this->paginate);
        
        //search != null & cari != Semua & lunas != Semua & blok_cari = Semua
        } else if($this->search != '' && $this->cari != 'Semua' && $this->lunas != 'Semua' && $this->blok_cari === 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('kategori_id', $this->cari)->where('buwuan_lunas', $this->lunas)->where('user_id', Auth::user()->id)->paginate($this->paginate);
        
        //search != null & cari != Semua & lunas = Semua & blok_cari != Semua
        } else if ($this->search != '' && $this->cari != 'Semua' && $this->lunas === 'Semua' && $this->blok_cari != 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('kategori_id', $this->cari)->where('blok_id', $this->blok_cari)->where('user_id', Auth::user()->id)->paginate($this->paginate);
        
        //search != null & cari = Semua & lunas != Semua & blok_cari != Semua
        } else if($this->search != '' && $this->cari === 'Semua' && $this->lunas != 'Semua' && $this->blok_cari != 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->orWhere('blok_id', 'like', '%'.$this->search. '%')->where('buwuan_lunas', $this->lunas)->where('blok_id', $this->blok_cari)->where('user_id', Auth::user()->id)->paginate($this->paginate);
        
        //search = null & cari != Semua & lunas != Semua & blok_cari != Semua
        } else if ($this->search === '' && $this->cari != 'Semua' && $this->lunas != 'Semua' && $this->blok_cari != 'Semua') {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('kategori_id', $this->cari)->where('buwuan_lunas', $this->lunas)->where('blok_id', $this->blok_cari)->where('user_id', Auth::user()->id)->paginate($this->paginate);
        } else {
            $buwuan = Buwuan::orderBy('id', 'desc')->where('buwuan_nama', 'like', '%'.$this->search. '%')->where('kategori_id', $this->cari)->where('buwuan_lunas', $this->lunas)->where('blok_id', $this->blok_cari)->where('user_id', Auth::user()->id)->paginate($this->paginate);
        }

        $kategori = Kategori::get();
        $blok = Blok::get();
        return view('livewire.buwuan-index', compact('buwuan', 'kategori', 'blok'));
        
    }

    private function resetInput()
    {
        $this->state = null;
    }
}
