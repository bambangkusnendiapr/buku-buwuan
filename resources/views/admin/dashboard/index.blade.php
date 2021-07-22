@extends('layouts.admin.master')
@section('dashboard', 'active')
@section('title', 'Dashboard')
@section('content')
@php
use App\Models\Master\Profil;
$profil = Profil::find(1);
@endphp
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    
    <div class="row">
      <div class="col-12">
        <!-- Magang Duit -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Magang Duit</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">

              <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-primary">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 1)->count() }}</h3>

                    <p>Magang Duit</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-primary">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Lunas')->count() }}</h3>

                    <p>Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-primary">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Belum Lunas')->count() }}</h3>

                    <p>Belum Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fab fa-creative-commons-nc"></i>
                  </div>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-primary">
                  <div class="inner">
                    <h3>Rp. {{ number_format($buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah')) }}</h3>

                    <p>Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-primary">
                  <div class="inner">
                    <h3>Rp. {{ number_format($buwuan->where('kategori_id', 1)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah')) }}</h3>

                    <p>Belum Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fab fa-creative-commons-nc"></i>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Magang Pari -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Magang Pari</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">

              <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-success">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 2)->count() }}</h3>

                    <p>Magang Pari</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-success">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Lunas')->count() }}</h3>

                    <p>Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-box-open"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-success">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Belum Lunas')->count() }}</h3>

                    <p>Belum Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-box"></i>
                  </div>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-success">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah') }} KG</h3>

                    <p>Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-box-open"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-success">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 2)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah') }} KG</h3>

                    <p>Belum Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-box"></i>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Utang Duit -->
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Utang Duit</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">

              <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-secondary">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 3)->count() }}</h3>

                    <p>Utang Duit</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-secondary">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Lunas')->count() }}</h3>

                    <p>Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-secondary">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Belum Lunas')->count() }}</h3>

                    <p>Belum Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fab fa-creative-commons-nc"></i>
                  </div>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-secondary">
                  <div class="inner">
                    <h3>Rp. {{ number_format($buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah')) }}</h3>

                    <p>Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-secondary">
                  <div class="inner">
                    <h3>Rp. {{ number_format($buwuan->where('kategori_id', 3)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah')) }}</h3>

                    <p>Belum Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fab fa-creative-commons-nc"></i>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Utang Pari -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Utang Pari</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">

              <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-danger">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 4)->count() }}</h3>

                    <p>Utang Pari</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-danger">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Lunas')->count() }}</h3>

                    <p>Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-box-open"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-danger">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Belum Lunas')->count() }}</h3>

                    <p>Belum Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-box"></i>
                  </div>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-danger">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Lunas')->sum('buwuan_jumlah') }} KG</h3>

                    <p>Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-box-open"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-danger">
                  <div class="inner">
                    <h3>{{ $buwuan->where('kategori_id', 4)->where('buwuan_lunas', 'Belum Lunas')->sum('buwuan_jumlah') }} KG</h3>

                    <p>Belum Lunas</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-box"></i>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Download Data</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row">
                <div class="col-md-4 pt-2 pb-2">
                  <a href="{{ route('export.buwuan') }}" class="btn w-100 btn-success"><i class="fas fa-file-excel"></i> Download Excel</a>
                </div>
                <div class="col-md-4 pt-2 pb-2">
                  <a href="{{ route('pdf.print') }}" target="_blank" class="btn w-100 btn-danger"><i class="fas fa-file-pdf"></i> Download PDF</a>
                </div>
                <div class="col-md-4 pt-2 pb-2">
                  <a href="{{ route('pdf.print') }}" target="_blank" class="btn w-100 btn-secondary"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->



@endsection