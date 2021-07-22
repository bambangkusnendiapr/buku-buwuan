<?php

namespace App\Imports;

use App\Models\Buwuan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BuwuanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Buwuan([
            'kategori_id'   => $row['id_kategori'],
            'buwuan_tgl'    => Carbon::now()->format('Y-m-d'),
            'buwuan_nama'   => $row['nama'],
            'blok_id'       => $row['blok'],
            'buwuan_jumlah' => $row['jumlah'],
            'buwuan_ket'    => $row['keterangan'],
            'user_id'       => Auth::user()->id,
        ]);
    }
}
