<div>
    <button id="tombol">klik</button>

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($statusUpdate)
        <livewire:contact-update></livewire:contact-update>
    @else
        <livewire:contact-create></livewire:contact-create>
    @endif

    <hr>

    <div class="row">
        <div class="col">
            <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>

        <div class="col">
            <select wire:model="cari" name="" id="" class="form-control form-control-sm w-auto">
                <option value="all">all</option>
                @foreach($kategori as $data)
                <option value="{{ $data->id }}">{{ $data->kategori_nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="col">
            <input wire:model="search" type="text" class="form-control form-control-sm w-100" placeholder="Search">
        </div>
    </div>

    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Kategori</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->kategori->kategori_nama }}</td>
                <td>
                    <button wire:click="getContact({{$contact->id}})" class="btn btn-sm btn-info">Edit</button>
                    <button wire:click="destroy({{$contact->id}})" class="btn btn-sm btn-danger">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        {{ $contacts->links() }}
    </nav>
</div>
