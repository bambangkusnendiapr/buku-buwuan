<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                <button wire:click.prevent="addNew" type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Buwuan
                </button>

                <button type="button" class="btn btn-success mr-5" data-toggle="modal" data-target="#importExcel">
                    <i class="fas fa-file-upload"></i> Upload Data Excel
                </button>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
                </div>
                <div class="card-body">
                    @role('superadmin')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select wire:model="cariUser" class="form-control form-control-sm">
                                    <option value="Semua">Semua User</option>
                                    @foreach($users as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @endrole

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Filter Pencarian</label>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:-20px;">
                        <div class="col">
                            <div class="form-group">
                                <select wire:model="cari" class="form-control form-control-sm">
                                    <option value="Semua">Semua Kategori</option>
                                    @foreach($kategori as $data)
                                    <option value="{{ $data->id }}">Kategori {{ $data->kategori_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <select wire:model="lunas" class="form-control form-control-sm">
                                    <option value="Semua">Semua Pelunasan</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                    <option value="Lunas">Lunas</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select wire:model="paginate" class="form-control form-control-sm">
                                    <option value="10">10 data per halaman</option>
                                    <option value="15">15 data per halaman</option>
                                    <option value="20">20 data per halaman</option>
                                    <option value="30">30 data per halaman</option>
                                    <option value="50">50 data per halaman</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 offset-md-4">
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Cari Nama / Blok">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                                <!-- <input  type="text" class="form-control form-control-sm w-100" placeholder="Cari Nama"> -->
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive-sm">
                        <table id="example1" class="table table-sm table-striped mt-1">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    @role('superadmin')
                                        <th>User</th>
                                    @endrole
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Blok</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th>Pelunasan</th>
                                    <th>Tanggal Lunas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($buwuan->isEmpty())
                                    <tr>
                                        @role('superadmin')
                                            <td colspan="11" class="text-center font-italic text-danger"><h5>-- Data Tidak Ditemukan --</h5></td>
                                        @endrole

                                        @role('user')
                                            <td colspan="10" class="text-center font-italic text-danger"><h5>-- Data Tidak Ditemukan --</h5></td>
                                        @endrole
                                    </tr>
                                @else
                                    @foreach($buwuan as $key => $data)
                                        <tr>
                                            <td class="text-center">{{ $buwuan->firstItem() + $key }}</td>
                                            @role('superadmin')
                                                <td class="text-center">{{ $data->user->name }}</td>
                                            @endrole
                                            <td class="text-center">{{ $data->kategori->kategori_nama }}</td>
                                            <td class="text-center">
                                                {{ Carbon\Carbon::parse($data->buwuan_tgl)->format('d/M/Y') }}
                                            </td>
                                            <td>{{ $data->buwuan_nama }}</td>
                                            <td class="text-center">{{ $data->blok_id }}</td>
                                            <td class="text-right">
                                            @if($data->kategori->id == 1 || $data->kategori->id == 3 ) Rp. @endif <strong>{{ number_format($data->buwuan_jumlah) }}</strong> @if($data->kategori->id == 2 || $data->kategori->id == 4 ) KG @endif
                                            </td>
                                            <td class="text-center">{{ $data->buwuan_ket }}</td>
                                            <td class="text-center @if($data->buwuan_lunas == 'Belum Lunas') bg-danger @endif">{{ $data->buwuan_lunas }}</td>
                                            <td class="text-center">
                                                @if($data->buwuan_lunas_tgl)
                                                    {{ Carbon\Carbon::parse($data->buwuan_lunas_tgl)->format('d/M/Y') }}
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                @if($data->buwuan_lunas == 'Belum Lunas')
                                                <button wire:click.prevent="pelunasan({{ $data->id }})" class="btn btn-success btn-sm">Lunas</button>
                                                @endif
                                                <button wire:click.prevent="edit({{ $data->id }})" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                                <button wire:click.prevent="delete({{ $data->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                        <br>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{ $buwuan->links() }}
                            </ul>
                        </nav>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
        </div>

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="modal-default" wire:ignore.self>
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Tambah Buwuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form wire:submit.prevent="createBuwuan">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Kategori -->
                                <div class="form-group">
                                <label for="kategori">Kategori</label>@error('kategori') <span class="text-danger">{{ $message }}</span> @enderror
                                <select wire:model.defer="state.kategori" required name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror">
                                    <option value="">Pilih Kategori</option> 
                                    @foreach($kategori as $data)
                                    <option value="{{ $data->id }}">{{ $data->kategori_nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <!-- Tanggal -->
                                <div class="form-group">
                                <label for="tgl">Tanggal</label>@error('tgl') <span class="text-danger">{{ $message }}</span> @enderror
                                <input wire:model.defer="state.tgl" type="date" required name="tgl" class="form-control @error('tgl') is-invalid @enderror" id="tgl">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Nama -->
                                <div class="form-group">
                                <label for="nama">Nama</label>@error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                                <input wire:model.defer="state.nama" type="text" required name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama" autocomplete="off">
                                </div>
                            </div>

                            </div>
                            <div class="row">
                            <div class="col-md-4">
                                <!-- Blok -->
                                <div class="form-group">
                                <label for="blok">Blok</label>@error('blok') <span class="text-danger">{{ $message }}</span> @enderror
                                <input wire:model.defer="state.blok" type="text" required name="blokEdit" class="form-control @error('blok') is-invalid @enderror" id="nama" placeholder="Masukan blok" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- jumlah -->
                                <div class="form-group">
                                <label for="jumlah">Jumlah</label>@error('jumlah') <span class="text-danger">{{ $message }}</span> @enderror
                                <input wire:model.defer="state.jumlah" type="text" required name="jumlah" class="form-control @error('jumlah') is-invalid @enderror uang" id="jumlah" placeholder="Masukan jumlah" autocomplete="off">
                                <h5 class="text-info" id="satuan"></h5>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Keterangan -->
                                <div class="form-group">
                                <label for="ket">Keterangan</label>@error('ket') <span class="text-danger">{{ $message }}</span> @enderror
                                <input wire:model.defer="state.ket" type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" id="ket" placeholder="Masukan keterangan" autocomplete="off">
                                </div>
                            </div>

                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>

        <!-- Modal Edit Data -->
        <div class="modal fade" id="modal-edit" wire:ignore.self>
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Edit Buwuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form wire:submit.prevent="updateBuwuan">
                    <div class="modal-body">
                        <input wire:model.defer="buwuanId" type="hidden">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Kategori -->
                                <div class="form-group">
                                <label for="kategori">Kategori</label>@error('kategori') <span class="text-danger">{{ $message }}</span> @enderror
                                <select wire:model.defer="kategoriEdit" required name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror">
                                    <option value="">Pilih Kategori</option> 
                                    @foreach($kategori as $data)
                                    <option value="{{ $data->id }}" {{ $kategoriEdit = $data->id ? 'selected':'' }}>{{ $data->kategori_nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Tanggal -->
                                <div class="form-group">
                                <label for="tgl">Tanggal</label>@error('tgl') <span class="text-danger">{{ $message }}</span> @enderror
                                <input wire:model.defer="tglEdit" type="date" required name="tgl" class="form-control @error('tgl') is-invalid @enderror" id="tgl">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Nama -->
                                <div class="form-group">
                                <label for="nama">Nama</label>@error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                                <input wire:model.defer="namaEdit" type="text" required name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama" autocomplete="off">
                                </div>
                            </div>

                            </div>
                            <div class="row">
                            <div class="col-md-4">
                                <!-- Blok -->
                                <div class="form-group">
                                <label for="blok">Blok</label>@error('blok') <span class="text-danger">{{ $message }}</span> @enderror
                                <input wire:model.defer="blokEdit" type="text" required name="blokEdit" class="form-control @error('blok') is-invalid @enderror" id="nama" placeholder="Masukan blok" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- jumlah -->
                                <div class="form-group">
                                <label for="jumlah">Jumlah</label>@error('jumlah') <span class="text-danger">{{ $message }}</span> @enderror
                                <input wire:model.defer="jumlahEdit" type="text" required name="jumlah" class="form-control @error('jumlah') is-invalid @enderror uang" id="jumlah" autocomplete="off">
                                <h5 class="text-info" id="satuan"></h5>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Keterangan -->
                                <div class="form-group">
                                <label for="ket">Keterangan</label>@error('ket') <span class="text-danger">{{ $message }}</span> @enderror
                                <input wire:model.defer="ketEdit" type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" id="ket" placeholder="Masukan keterangan" autocomplete="off">
                                </div>
                            </div>

                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>

        <!-- Modal Delete Data -->
        <div class="modal fade" id="modal-delete" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data Buwuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <h5>Yakin ingin hapus data buwuan ?</h5>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                        <button wire:click.prevent="deleteBuwuan" type="button" class="btn btn-outline-light">Lanjut Hapus</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>

        <!-- Modal pelunasan Data -->
        <div class="modal fade" id="modal-pelunasan" wire:ignore.self>
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Tanggal Pelunasan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="updatePelunasan">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pelunasanTgl">Tanggal Pelunasan</label>@error('pelunasanTgl') <span class="text-danger">{{ $message }}</span> @enderror
                            <input wire:model.defer="pelunasanTgl" required type="date" class="form-control @error('pelunasanTgl') is-invalid @enderror" placeholder="Masukan keterangan">
                        </div>
                        <p class="font-italic">*) Data yang LUNAS tidak bisa diganti lagi, yakin ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success" onclick="return confirm('Data yang LUNAS tidak bisa diganti lagi, yakin ?');">Lunas Simpan</button>
                    </div>
                </form>
                </div>
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>

        <!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="{{ route('import.buwuan') }}" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>

                            <hr>

                            <div class="form-group">
                                <a href="{{ route('template.buwuan') }}" class="btn btn-success"><i class="fas fa-download"></i> Download Template Excel</a>
                            </div>

                            <div class="form-group">
                                <p class="text-danger">Perhatian Penting!</p>
                                <p>isi kolom id_kategori dengan format angka sbb:</p>
                                <p>1 = Magang Duit</p>
                                <p>2 = Magang Pari</p>
                                <p>3 = Utang Duit</p>
                                <p>4 = Utang Pari</p>
                            </div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success"><i class="fas fa-file-upload"></i> Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>

        @push('css')
            <!-- SweetAlert2 -->
            <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
            <!-- Select2 -->
            <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
            <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
        @endpush

        @push('script')
            <!-- SweetAlert2 -->
            <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
            <!-- Select2 -->
            <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
            <!-- Sweet alert real rashid -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <script>
                $(function () {
                    $('.select2').select2()

                    //Initialize Select2 Elements
                    $('.select2bs4').select2({
                    theme: 'bootstrap4'
                    });

                    window.addEventListener('show-form', event => {
                        $('#modal-default').modal('show');
                    });

                    window.addEventListener('hide-form', event => {
                        $('#modal-default').modal('hide');

                        Swal.fire({
                            "title":"Sukses!",
                            "text":"Data Berhasil Ditambahkan",
                            "position":"top-end",
                            "timer":2000,
                            "width":"32rem",
                            "heightAuto":true,
                            "padding":"1.25rem",
                            "showConfirmButton":false,
                            "showCloseButton":false,
                            "icon":"success"
                        });

                        // var Toast = Swal.mixin({
                        //     toast: true,
                        //     position: 'top-end',
                        //     showConfirmButton: true,
                        //     timer: 8000
                        // });

                        //     Toast.fire({
                        //         icon: 'success',
                        //         title: 'Data buwuan berhasil disimpan'
                        //     })

                    });

                    $('#kategori').on('change', function() {
                        let kategoriData = $('#kategori').val();
                        if(kategoriData == 1 || kategoriData == 3) {
                            $('#satuan').html("<strong>Rupiah</strong>");
                        } else if(kategoriData == 2 || kategoriData == 4) {
                            $('#satuan').html("<strong>Kilogram</strong>");
                        } else {
                            $('#satuan').html("<strong>Pilih Kategori</strong>");
                        }
                    });

                    window.addEventListener('show-form-edit', event => {
                        $('#modal-edit').modal('show');
                    });

                    window.addEventListener('hide-form-edit', event => {
                        $('#modal-edit').modal('hide');

                        Swal.fire({
                            "title":"Sukses!",
                            "text":"Data Berhasil Diedit",
                            "position":"top-end",
                            "timer":2000,
                            "width":"32rem",
                            "heightAuto":true,
                            "padding":"1.25rem",
                            "showConfirmButton":false,
                            "showCloseButton":false,
                            "icon":"success"
                        });

                    });

                    window.addEventListener('show-form-delete', event => {
                        $('#modal-delete').modal('show');
                    });

                    window.addEventListener('hide-form-delete', event => {
                        $('#modal-delete').modal('hide');

                        Swal.fire({
                            "title":"Sukses!",
                            "text":"Data Berhasil Dihapus",
                            "position":"top-end",
                            "timer":2000,
                            "width":"32rem",
                            "heightAuto":true,
                            "padding":"1.25rem",
                            "showConfirmButton":false,
                            "showCloseButton":false,
                            "icon":"success"
                        });

                    });

                    window.addEventListener('show-form-pelunasan', event => {
                        $('#modal-pelunasan').modal('show');
                    });

                    window.addEventListener('hide-form-pelunasan', event => {
                        $('#modal-pelunasan').modal('hide');

                        Swal.fire({
                            "title":"Sukses!",
                            "text":"Telah Lunas",
                            "position":"top-end",
                            "timer":2000,
                            "width":"32rem",
                            "heightAuto":true,
                            "padding":"1.25rem",
                            "showConfirmButton":false,
                            "showCloseButton":false,
                            "icon":"success"
                        });

                    });
                });
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.uang').mask('000.000.000.000', {reverse: true});
                });
            </script>
        @endpush

    
</div>