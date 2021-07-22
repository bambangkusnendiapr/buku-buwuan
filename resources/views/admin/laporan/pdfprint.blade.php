<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Print Buwuan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="content">

    <div class="container">

      <br>
      <br>
      <br>

        <div style="display: flex;justify-content: center;">
            @if($profil->profil_logo)
                <img style="width:500px;" class="img-fluid img-circle" src="{{ asset('images/profil/'.$profil->profil_logo) }}" alt="User profile picture">
            @else
                <img style="width:500px;" class="img-fluid img-circle" src="{{ asset('images/logo.png') }}" alt="User profile picture">
            @endif
        </div>


      <br>
      <br>
      <br>

      <h1 style="text-align:center;">{{ Auth::user()->name }}</h1>

      <div style="break-after:page"></div>

      <br>

      <h1 style="text-align: center;"><strong>PERHITUNGAN TOTAL</strong></h1>

      <hr>

      <br>

      <div class="row">
        <div class="col-12">
          <!-- COUNT MAGANG DUIT -->
          <table style="border:1px solid black;" width="100%">
              <tr>
                  <td colspan="4" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#c5d9f1;">MAGANG DUIT</td>
                  <td colspan="2" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#c5d9f1;">{{ $buwuan->where('kategori_id', 1)->count() }}</td>
                  <td style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#c5d9f1;">Orang</td>
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
                  <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ number_format($buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah')) }}</td>
                  <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</td>
              </tr>
              <tr>
                  <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">BELUM LUNAS</td>
                  <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ number_format($buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah')) }}</td>
                  <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</td>
              </tr>
          </table>
        </div>
      </div>

      <br>
      <br>

      <div class="row">
        <div class="col-12">
          <!-- COUNT MAGANG PARI -->
          <table style="border:1px solid black;" width="100%">
              <tr>
                  <td colspan="4" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#94d050;">MAGANG PARI</td>
                  <td colspan="2" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#94d050;">{{ $buwuan->where('kategori_id', 2)->count() }}</td>
                  <td style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#94d050;">Orang</td>
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
        </div>
      </div>

      <br>
      <br>

      <!-- COUNT UTANG DUIT -->
      <table style="border:1px solid black;" width="100%">
          <tr>
              <td colspan="4" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#d6d6c2;">UTANG DUIT</td>
              <td colspan="2" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#d6d6c2;">{{ $buwuan->where('kategori_id', 3)->count() }}</td>
              <td style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#d6d6c2;">Orang</td>
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
              <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ number_format($buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah')) }}</td>
              <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</td>
          </tr>
          <tr>
              <td colspan="4" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">BELUM LUNAS</td>
              <td colspan="2" style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">{{ number_format($buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah')) }}</td>
              <td style="border:1px solid black;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</td>
          </tr>
      </table>

      <br>
      <br>

      <!-- COUNT UTANG PARI -->
      <table style="border:1px solid black;" width="100%">
          <tr>
              <td colspan="4" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#eb7c7a;">UTANG PARI</td>
              <td colspan="2" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#eb7c7a;">{{ $buwuan->where('kategori_id', 4)->count() }}</td>
              <td style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#eb7c7a;">Orang</td>
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

      <div style="break-after:page"></div>

      <br>

      <h1 style="text-align: center;"><strong>REKAPITULASI RINCIAN</strong></h1>

      <hr>

      <br>

      <!-- MAGANG DUIT LUNAS -->
      <table style="border:1px solid black;" width="100%">
          <thead>
              <tr>
                  <th colspan="7" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#c5d9f1;">MAGANG DUIT - LUNAS</th>
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
                  <td style="border:1px solid black;">{{ number_format($data->buwuan_jumlah) }}</td>
                  <td style="border:1px solid black;">{{ $data->buwuan_ket }}</td>
                  <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_lunas_tgl)->format('d/M/Y') }}</td>
              </tr>
          @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th colspan="4" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
                  <th colspan="2" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">{{ number_format($buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah')) }}</th>
                  <th colspan="1" style="border:1px solid black;padding:10px;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</th>
              </tr>
          </tfoot>
      </table>

      <br>

      <!-- MAGANG DUIT BELUM LUNAS -->
      <table style="border:1px solid black;" width="100%">
          <thead>
              <tr>
                  <th colspan="8" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#c5d9f1;">MAGANG DUIT - BELUM LUNAS</th>
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
                  <td style="border:1px solid black;">{{ number_format($data->buwuan_jumlah) }}</td>
                  <td style="border:1px solid black;">{{ $data->buwuan_ket }}</td>
                  <td style="border:1px solid black;">{{ $data->buwuan_lunas }}</td>
                  <td style="border:1px solid black;">&nbsp;</td>
              </tr>
          @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th colspan="4" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
                  <th colspan="3" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">{{ number_format($buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah')) }}</th>
                  <th colspan="1" style="border:1px solid black;padding:10px;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</th>
              </tr>
          </tfoot>
      </table>

      <div style="break-after:page"></div>

      <!-- MAGANG PARI LUNAS -->
      <table style="border:1px solid black;" width="100%">
          <thead>
              <tr>
                  <th colspan="7" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#94d050;">MAGANG PARI - LUNAS</th>
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
                  <th colspan="4" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
                  <th colspan="2" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">{{ $buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah') }}</th>
                  <th colspan="1" style="border:1px solid black;padding:10px;text-align: center;font-size: 14px;font-weight: bold;">Kilogram</th>
              </tr>
          </tfoot>
      </table>

      <br>

      <!-- MAGANG PARI BELUM LUNAS -->
      <table style="border:1px solid black;" width="100%">
          <thead>
              <tr>
                  <th colspan="8" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#94d050;">MAGANG PARI - BELUM LUNAS</th>
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
                  <th colspan="4" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
                  <th colspan="3" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">{{ $buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah') }}</th>
                  <th colspan="1" style="border:1px solid black;padding:10px;text-align: center;font-size: 14px;font-weight: bold;">Kilogram</th>
              </tr>
          </tfoot>
      </table>

      <div style="break-after:page"></div>

      <!-- UTANG DUIT LUNAS -->
      <table style="border:1px solid black;" width="100%">
          <thead>
              <tr>
                  <th colspan="7" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#d6d6c2;">UTANG DUIT - LUNAS</th>
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
                  <td style="border:1px solid black;">{{ number_format($data->buwuan_jumlah) }}</td>
                  <td style="border:1px solid black;">{{ $data->buwuan_ket }}</td>
                  <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_lunas_tgl)->format('d/M/Y') }}</td>
              </tr>
          @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th colspan="4" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
                  <th colspan="2" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">{{ number_format($buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah')) }}</th>
                  <th colspan="1" style="border:1px solid black;padding:10px;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</th>
              </tr>
          </tfoot>
      </table>

      <br>

      <!-- UTANG DUIT BELUM LUNAS -->
      <table style="border:1px solid black;" width="100%">
          <thead>
              <tr>
                  <th colspan="8" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#d6d6c2;">UTANG DUIT - BELUM LUNAS</th>
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
                  <td style="border:1px solid black;">{{ number_format($data->buwuan_jumlah) }}</td>
                  <td style="border:1px solid black;">{{ $data->buwuan_ket }}</td>
                  <td style="border:1px solid black;">{{ $data->buwuan_lunas }}</td>
                  <td style="border:1px solid black;">&nbsp;</td>
              </tr>
          @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th colspan="4" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
                  <th colspan="3" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">{{ number_format($buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah')) }}</th>
                  <th colspan="1" style="border:1px solid black;padding:10px;text-align: center;font-size: 14px;font-weight: bold;">Rupiah</th>
              </tr>
          </tfoot>
      </table>

      <div style="break-after:page"></div>

      <!-- UTANG PARI LUNAS -->
      <table style="border:1px solid black;" width="100%">
          <thead>
              <tr>
                  <th colspan="7" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#eb7c7a;">UTANG PARI - LUNAS</th>
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
                  <td style="border:1px solid black;">{{ number_format($data->buwuan_jumlah) }}</td>
                  <td style="border:1px solid black;">{{ $data->buwuan_ket }}</td>
                  <td style="border:1px solid black;">{{ Carbon\Carbon::parse($data->buwuan_lunas_tgl)->format('d/M/Y') }}</td>
              </tr>
          @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th colspan="4" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
                  <th colspan="2" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">{{ number_format($buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah')) }}</th>
                  <th colspan="1" style="border:1px solid black;padding:10px;text-align: center;font-size: 14px;font-weight: bold;">Kilogram</th>
              </tr>
          </tfoot>
      </table>

      <!-- UTANG PARI BELUM LUNAS -->
      <table style="border:1px solid black;" width="100%">
          <thead>
              <tr>
                  <th colspan="8" style="border:1px solid black;padding:10px;text-align: center;font-size: 24px;font-weight: bold;background-color:#eb7c7a;">UTANG PARI - BELUM LUNAS</th>
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
                  <th colspan="4" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">TOTAL</th>
                  <th colspan="3" style="border:1px solid black;padding:10px;text-align: center;font-size: 16px;font-weight: bold;">{{ $buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah') }}</th>
                  <th colspan="1" style="border:1px solid black;padding:10px;text-align: center;font-size: 14px;font-weight: bold;">Kilogram</th>
              </tr>
          </tfoot>
      </table>

    </div>

  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>