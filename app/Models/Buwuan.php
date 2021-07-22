<?php

namespace App\Models;

use App\Models\Master\Kategori;
use App\Models\Master\Blok;
use Illuminate\Database\Eloquent\Model;

class Buwuan extends Model
{
    protected $table = 'tb_buwuan';

    protected $fillable = ['kategori_id','buwuan_tgl','buwuan_nama', 'blok_id', 'buwuan_jumlah', 'buwuan_ket', 'buwuan_lunas', 'buwuan_lunas_tgl', 'user_id'];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Master\Kategori');
    }

    public function blok()
    {
        return $this->belongsTo('App\Models\Master\Blok');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
