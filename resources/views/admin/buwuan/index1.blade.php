@extends('layouts.admin.master')
@section('buwuan', 'sidebar-collapse')
@section('buwuan-uang', 'active')
@section('title', 'Buwuan')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Buwuan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Buwuan</li>
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
        <!-- Default box -->
        <div class="card card-outline card-success">
          <div class="card-header">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
              <i class="fas fa-plus"></i> Tambah Buwuan
            </button>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
          <table id="example1" class="table table-sm table-striped table-bordered">
            <thead>
            <tr class="text-center">
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
            </thead>
            <thead>
            <tr class="text-center">
              <th>#</th>
              <th>Kategori</th>
              <th>Tanggal</th>
              <th>Nama</th>
              <th>Blok</th>
              <th>Nominal</th>
              <th>Keterangan</th>
              <th>Pelunasan</th>
              <th>Tgl_Lunas</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach($buwuan as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->kategori_id }}</td>
                <td>{{ $data->buwuan_tgl }}</td>
                <td>{{ $data->buwuan_nama }}</td>
                <td>{{ $data->blok_id }}</td>
                <td>Rp. {{ $data->buwuan_jumlah }}</td>
                <td>{{ $data->buwuan_ket }}</td>
                <td class="align-middle text-center bg-danger">
                {{ $data->buwuan_lunas }}
                </td>
                <td>{{ $data->buwuan_lunas_tgl }}</td>
                <td class="align-middle text-center">
                  <a href="#" data-target="#modal-lunas" class="btn btn-info btn-sm" data-toggle="modal">lunas</a>
                  <a href="#" data-target="#modal-edit" class="btn btn-warning btn-sm" data-toggle="modal"><i class="fas fa-edit"></i></a>
                  <a href="#" data-target="#modal-hapus" class="btn btn-danger btn-sm" data-toggle="modal"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
<!-- /.content -->

<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">Tambah Buwuan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('buwuan.store') }}" method="POST" id="form-tambah">
        @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <!-- Kategori -->
                <div class="form-group">
                  <label for="kategori">Kategori</label>@error('kategori') <span class="text-danger">{{ $message }}</span> @enderror
                  <select name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror">
                    @foreach($kategori as $data)
                      <option value="{{ $data->id }}">{{ $data->kategori_nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <!-- Tanggal -->
                <div class="form-group">
                  <label for="tgl">Tanggal</label>@error('tgl') <span class="text-danger">{{ $message }}</span> @enderror
                  <input type="date" required name="tgl" class="form-control @error('tgl') is-invalid @enderror" id="tgl">
                </div>
              </div>

              <div class="col-md-4">
                <!-- Nama -->
                <div class="form-group">
                  <label for="nama">Nama</label>@error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                  <input type="text" required name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama">
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-4">
                <!-- Blok -->
                <div class="form-group">
                  <label for="blok">Blok</label>@error('blok') <span class="text-danger">{{ $message }}</span> @enderror
                  <select name="blok" id="blok" class="form-control select2bs4 @error('blok') is-invalid @enderror">
                    @foreach($blok as $data)
                      <option value="{{ $data->id }}">{{ $data->blok_nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <!-- jumlah -->
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>@error('jumlah') <span class="text-danger">{{ $message }}</span> @enderror
                  <input type="number" required name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Masukan nominal">
                </div>
              </div>

              <div class="col-md-4">
                <!-- Keterangan -->
                <div class="form-group">
                  <label for="ket">Keterangan</label>@error('ket') <span class="text-danger">{{ $message }}</span> @enderror
                  <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" id="ket" placeholder="Masukan keterangan">
                </div>
              </div>

            </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-success btn-simpan">Simpan</button>
          </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- Modal Hapus Data -->
<div class="modal fade" id="modal-hapus">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Hapus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="post" class="d-inline" id="id_form">
        @method('delete')
        @csrf
          <div class="modal-body">
            <input type="hidden" value="" id="">
            <p>Yakin ingin dihapus ?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">Tambah Buwuan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('menu.store') }}" method="POST">
        @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <!-- Kategori -->
                <div class="form-group">
                  <label for="kategori">Kategori</label>@error('kategori') <span class="text-danger">{{ $message }}</span> @enderror
                  <select name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror">
                          <option value="Ronggeng">Ronggeng</option>
                          <option value="Desa Lor">Desa Lor</option>
                          <option value="Plawad">Plawad</option>
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <!-- Tanggal -->
                <div class="form-group">
                  <label for="tgl">Tanggal</label>@error('tgl') <span class="text-danger">{{ $message }}</span> @enderror
                  <input type="date" required name="tgl" class="form-control @error('tgl') is-invalid @enderror" id="tgl">
                </div>
              </div>

              <div class="col-md-4">
                <!-- Nama -->
                <div class="form-group">
                  <label for="nama">Nama</label>@error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                  <input type="text" required name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama">
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-4">
                <!-- Blok -->
                <div class="form-group">
                  <label for="blok">Blok</label>@error('blok') <span class="text-danger">{{ $message }}</span> @enderror
                  <select name="blok" id="blok" class="form-control @error('blok') is-invalid @enderror">
                          <option value="Ronggeng">Ronggeng</option>
                          <option value="Desa Lor">Desa Lor</option>
                          <option value="Plawad">Plawad</option>
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <!-- jumlah -->
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>@error('jumlah') <span class="text-danger">{{ $message }}</span> @enderror
                  <input type="number" required name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Masukan nominal">
                </div>
              </div>

              <div class="col-md-4">
                <!-- Keterangan -->
                <div class="form-group">
                  <label for="ket">Keterangan</label>@error('ket') <span class="text-danger">{{ $message }}</span> @enderror
                  <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" id="ket" placeholder="Masukan keterangan">
                </div>
              </div>

            </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Edit</button>
          </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- modal lunas -->
<div class="modal fade" id="modal-lunas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title">Pelunasan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="POST">
      @method('PATCH')
      @csrf
        <div class="modal-body">
          <!-- Tanggal -->
          <div class="form-group">
            <label for="tgl_lunas">Tanggal Pelunasan</label>@error('tgl_lunas') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="date" required name="tgl_lunas" class="form-control @error('tgl_lunas') is-invalid @enderror" id="tgl_lunas">
            <input type="hidden" name="lunas" value="Lunas">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Lunas</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('css')
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@push('script')
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false, "lengthChange": true, "autoWidth": false, "scrollX": true,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      initComplete: function () {
          this.api().columns([1, 4, 7]).every( function () {
              var column = this;
              var select = $('<select><option value=""></option></select>')
                  .appendTo( $(column.header()).empty() )
                  .on( 'change', function () {
                      var val = $.fn.dataTable.util.escapeRegex(
                          $(this).val()
                      );

                      column
                          .search( val ? '^'+val+'$' : '', true, false )
                          .draw();
                  } );

              column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
              } );
          } );
      }
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    $('.btn-simpan').on('click', function() {
      let formData = $('#form-tambah').serialize();
      // console.log(formData)
      $.ajax({
        url: `/admin/buwuan`,
        type: "POST",
        data: formData,
        success: function(response) {
            $('#modal-default').modal('hide');
        },
        error: function(response) {
          $('#titleError').text(response.responseJSON.errors.title);
          $('#descriptionError').text(response.responseJSON.errors.description);
        }
      });
    });
  });
</script>
@endpush

@endsection