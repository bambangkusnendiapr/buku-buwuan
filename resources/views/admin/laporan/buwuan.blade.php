<!DOCTYPE html>
<html>
<head>
</head>
<body>

<!-- COUNT MAGANG DUIT -->
<table style="border:1px solid black;">
    <tr>
        <td colspan="4" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#c5d9f1;">MAGANG DUIT</td>
        <td colspan="2" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#c5d9f1;">{{ $buwuan->where('kategori_id', 1)->count() }}</td>
        <td style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#c5d9f1;">Orang</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Lunas')->count() }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Orang</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">BELUM LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Belum Lunas')->count() }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Orang</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah') }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">BELUM LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah') }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</td>
    </tr>
</table>

<!-- COUNT MAGANG PARI -->
<table style="border:1px solid black;">
    <tr>
        <td colspan="4" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#94d050;">MAGANG PARI</td>
        <td colspan="2" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#94d050;">{{ $buwuan->where('kategori_id', 2)->count() }}</td>
        <td style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#94d050;">Orang</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Lunas')->count() }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Orang</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">BELUM LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Belum Lunas')->count() }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Orang</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah') }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Kilogram</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">BELUM LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah') }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Kilogram</td>
    </tr>
</table>

<!-- COUNT UTANG DUIT -->
<table style="border:1px solid black;">
    <tr>
        <td colspan="4" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#d6d6c2;">UTANG DUIT</td>
        <td colspan="2" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#d6d6c2;">{{ $buwuan->where('kategori_id', 3)->count() }}</td>
        <td style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#d6d6c2;">Orang</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Lunas')->count() }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Orang</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">BELUM LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Belum Lunas')->count() }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Orang</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah') }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">BELUM LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah') }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</td>
    </tr>
</table>

<!-- COUNT UTANG PARI -->
<table style="border:1px solid black;">
    <tr>
        <td colspan="4" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#eb7c7a;">UTANG PARI</td>
        <td colspan="2" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#eb7c7a;">{{ $buwuan->where('kategori_id', 4)->count() }}</td>
        <td style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#eb7c7a;">Orang</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Lunas')->count() }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Orang</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">BELUM LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Belum Lunas')->count() }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Orang</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah') }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Kilogram</td>
    </tr>
    <tr>
        <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">BELUM LUNAS</td>
        <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ $buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah') }}</td>
        <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Kilogram</td>
    </tr>
</table>

<br>
<br>

<table>
    <tr>
        <th colspan="8" style="padding:50px;text-align: center;font-size: 24px;font-weight: bold;">RINCIAN BUKU BUWUAN</th>
    </tr>
</table>

<!-- MAGANG DUIT LUNAS -->
<table style="border:1px solid black;">
    <thead>
        <tr>
            <th colspan="7" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#c5d9f1;">MAGANG DUIT - LUNAS</th>
        </tr>
        <tr>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NO</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NAMA</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">BLOK</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">JUMLAH</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">KETERANGAN</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL LUNAS</th>
        </tr>
    </thead>
    <tbody>
    @foreach($buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Lunas') as $data)
        <tr>
            <td style="border:1px solid black;">{{ $loop->iteration }}</td>
            <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_tgl)->format('d/M/Y') }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_nama }}</td>
            <td style="border:1px solid black;">{{ $data->blok_id }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_jumlah }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_ket }}</td>
            <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_lunas_tgl)->format('d/M/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
            <th colspan="2" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">{{ $buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah') }}</th>
            <th colspan="1" style="border:1px solid black;padding:50px;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</th>
        </tr>
    </tfoot>
</table>

<!-- MAGANG DUIT BELUM LUNAS -->
<table style="border:1px solid black;">
    <thead>
        <tr>
            <th colspan="8" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#c5d9f1;">MAGANG DUIT - BELUM LUNAS</th>
        </tr>
        <tr>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NO</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NAMA</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">BLOK</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">JUMLAH</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">KETERANGAN</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">PELUNASAN</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL LUNAS</th>
        </tr>
    </thead>
    <tbody>
    @foreach($buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Belum Lunas') as $data)
        <tr>
            <td style="border:1px solid black;">{{ $loop->iteration }}</td>
            <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_tgl)->format('d/M/Y') }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_nama }}</td>
            <td style="border:1px solid black;">{{ $data->blok_id }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_jumlah }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_ket }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_lunas }}</td>
            <td style="border:1px solid black;">&nbsp;</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
            <th colspan="3" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">{{ $buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah') }}</th>
            <th colspan="1" style="border:1px solid black;padding:50px;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</th>
        </tr>
    </tfoot>
</table>

<br>

<!-- MAGANG PARI LUNAS -->
<table style="border:1px solid black;">
    <thead>
        <tr>
            <th colspan="7" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#94d050;">MAGANG PARI - LUNAS</th>
        </tr>
        <tr>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NO</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NAMA</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">BLOK</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">JUMLAH</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">KETERANGAN</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL LUNAS</th>
        </tr>
    </thead>
    <tbody>
    @foreach($buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Lunas') as $data)
        <tr>
            <td style="border:1px solid black;">{{ $loop->iteration }}</td>
            <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_tgl)->format('d/M/Y') }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_nama }}</td>
            <td style="border:1px solid black;">{{ $data->blok_id }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_jumlah }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_ket }}</td>
            <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_lunas_tgl)->format('d/M/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
            <th colspan="2" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">{{ $buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah') }}</th>
            <th colspan="1" style="border:1px solid black;padding:50px;text-align: center;font-size: 14px;font-weight: bold;">Kilogram</th>
        </tr>
    </tfoot>
</table>

<!-- MAGANG PARI BELUM LUNAS -->
<table style="border:1px solid black;">
    <thead>
        <tr>
            <th colspan="8" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#94d050;">MAGANG PARI - BELUM LUNAS</th>
        </tr>
        <tr>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NO</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NAMA</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">BLOK</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">JUMLAH</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">KETERANGAN</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">PELUNASAN</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL LUNAS</th>
        </tr>
    </thead>
    <tbody>
    @foreach($buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Belum Lunas') as $data)
        <tr>
            <td style="border:1px solid black;">{{ $loop->iteration }}</td>
            <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_tgl)->format('d/M/Y') }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_nama }}</td>
            <td style="border:1px solid black;">{{ $data->blok_id }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_jumlah }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_ket }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_lunas }}</td>
            <td style="border:1px solid black;">&nbsp;</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
            <th colspan="3" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">{{ $buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah') }}</th>
            <th colspan="1" style="border:1px solid black;padding:50px;text-align: center;font-size: 14px;font-weight: bold;">Kilogram</th>
        </tr>
    </tfoot>
</table>

<br>

<!-- UTANG DUIT LUNAS -->
<table style="border:1px solid black;">
    <thead>
        <tr>
            <th colspan="7" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#d6d6c2;">UTANG DUIT - LUNAS</th>
        </tr>
        <tr>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NO</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NAMA</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">BLOK</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">JUMLAH</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">KETERANGAN</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL LUNAS</th>
        </tr>
    </thead>
    <tbody>
    @foreach($buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Lunas') as $data)
        <tr>
            <td style="border:1px solid black;">{{ $loop->iteration }}</td>
            <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_tgl)->format('d/M/Y') }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_nama }}</td>
            <td style="border:1px solid black;">{{ $data->blok_id }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_jumlah }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_ket }}</td>
            <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_lunas_tgl)->format('d/M/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
            <th colspan="2" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">{{ $buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah') }}</th>
            <th colspan="1" style="border:1px solid black;padding:50px;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</th>
        </tr>
    </tfoot>
</table>

<!-- UTANG DUIT BELUM LUNAS -->
<table style="border:1px solid black;">
    <thead>
        <tr>
            <th colspan="8" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#d6d6c2;">UTANG DUIT - BELUM LUNAS</th>
        </tr>
        <tr>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NO</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NAMA</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">BLOK</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">JUMLAH</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">KETERANGAN</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">PELUNASAN</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL LUNAS</th>
        </tr>
    </thead>
    <tbody>
    @foreach($buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Belum Lunas') as $data)
        <tr>
            <td style="border:1px solid black;">{{ $loop->iteration }}</td>
            <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_tgl)->format('d/M/Y') }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_nama }}</td>
            <td style="border:1px solid black;">{{ $data->blok_id }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_jumlah }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_ket }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_lunas }}</td>
            <td style="border:1px solid black;">&nbsp;</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
            <th colspan="3" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">{{ $buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah') }}</th>
            <th colspan="1" style="border:1px solid black;padding:50px;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</th>
        </tr>
    </tfoot>
</table>

<br>

<!-- UTANG PARI LUNAS -->
<table style="border:1px solid black;">
    <thead>
        <tr>
            <th colspan="7" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#eb7c7a;">UTANG PARI - LUNAS</th>
        </tr>
        <tr>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NO</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NAMA</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">BLOK</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">JUMLAH</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">KETERANGAN</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL LUNAS</th>
        </tr>
    </thead>
    <tbody>
    @foreach($buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Lunas') as $data)
        <tr>
            <td style="border:1px solid black;">{{ $loop->iteration }}</td>
            <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_tgl)->format('d/M/Y') }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_nama }}</td>
            <td style="border:1px solid black;">{{ $data->blok_id }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_jumlah }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_ket }}</td>
            <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_lunas_tgl)->format('d/M/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
            <th colspan="2" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">{{ $buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah') }}</th>
            <th colspan="1" style="border:1px solid black;padding:50px;text-align: center;font-size: 14px;font-weight: bold;">Kilogram</th>
        </tr>
    </tfoot>
</table>

<!-- UTANG PARI BELUM LUNAS -->
<table style="border:1px solid black;">
    <thead>
        <tr>
            <th colspan="8" style="border:1px solid black;padding:50px;text-align: center;font-size: 24px;font-weight: bold;background-color:#eb7c7a;">UTANG PARI - BELUM LUNAS</th>
        </tr>
        <tr>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NO</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">NAMA</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">BLOK</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">JUMLAH</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">KETERANGAN</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">PELUNASAN</th>
            <th style="border:1px solid black;text-align: center;background-color:#d6d6c2;">TANGGAL LUNAS</th>
        </tr>
    </thead>
    <tbody>
    @foreach($buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Belum Lunas') as $data)
        <tr>
            <td style="border:1px solid black;">{{ $loop->iteration }}</td>
            <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_tgl)->format('d/M/Y') }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_nama }}</td>
            <td style="border:1px solid black;">{{ $data->blok_id }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_jumlah }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_ket }}</td>
            <td style="border:1px solid black;">{{ $data->buwuan_lunas }}</td>
            <td style="border:1px solid black;">&nbsp;</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
            <th colspan="3" style="border:1px solid black;padding:50px;text-align: center;font-size: 16px;font-weight: bold;">{{ $buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah') }}</th>
            <th colspan="1" style="border:1px solid black;padding:50px;text-align: center;font-size: 14px;font-weight: bold;">Kilogram</th>
        </tr>
    </tfoot>
</table>

</body>
</html>