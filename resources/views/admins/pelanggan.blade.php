@extends('layouts.front')

@section('section', 'Data Pelanggan')

@section('page-title')
    <div class="pagetitle">
        <h1>Data Pelanggan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Page</li>
                <li class="breadcrumb-item active">Data Pelanggan</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <h5 class="card-title">Data Pelanggan</h5>
                <table id="data-pelanggan" class="table table-borderless datatable" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">No. Handphone</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">No. Handphone</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('custom-modal')
    <div class="modal fade" id="tambahPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelanggan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="no_hp">No. Handphone</label>
                                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($pelanggans as $item)
        <div class="modal fade" id="edit{{ $item->username }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="#" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Pelanggan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control"
                                        value="{{ $item->username }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="no_hp">No. Handphone</label>
                                    <input type="text" name="no_hp" class="form-control" value="{{ $item->no_hp }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $item->nama }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="hapus{{ $item->username }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="#" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menghapus data ini?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control"
                                        value="{{ $item->username }}" disabled>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="no_hp">No. Handphone</label>
                                    <input type="text" name="no_hp" class="form-control"
                                        value="{{ $item->no_hp }}" disabled>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control"
                                        value="{{ $item->nama }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary">Yakin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="resetPW{{ $item->username }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="#" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Reset password pelanggan ini?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control"
                                        value="{{ $item->username }}" disabled>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="no_hp">No. Handphone</label>
                                    <input type="text" name="no_hp" class="form-control"
                                        value="{{ $item->no_hp }}" disabled>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control"
                                        value="{{ $item->nama }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary">Yakin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('custom-js')
    <script>
        new DataTable('#data-pelanggan', {
            processing: true,
            ajax: {
                url: '{{ route('allPelanggan') }}'
            },
            columns: [{
                "mRender": function(data, type, full) {
                    return '<b><span class="text-primary">' + full.username + '</span></b>'
                }
            }, {
                data: 'nama'
            }, {
                data: 'no_hp'
            }, {
                "mRender": function(data, type, full) {
                    return '<a data-bs-toggle="modal" class="btn btn-warning btn-sm m-1" href=#edit' +
                        full.username + '>' + '<i class="bi bi-pencil-square"></i>' +
                        '</a><a data-bs-toggle="modal" class="btn btn-danger btn-sm m-1" href=#hapus' +
                        full.username + '>' +
                        '<i class="bi bi-trash"></i>' +
                        '</a><a data-bs-toggle="modal" class="btn btn-success btn-sm m-1" href=#resetPW' +
                        full.username +
                        '>' + '<i class="bi bi-key-fill"></i>' + '</a>';
                }
            }],
            layout: {
                topStart: {
                    buttons: [{
                        text: 'Tambah',
                        action: function(e, dt, node, config) {
                            $('#tambahPelanggan').modal('show')
                        }
                    }, 'copy', 'csv', 'print', 'colvis'],
                    pageLength: {
                        menu: [5, 10, 25, 50, {
                            label: 'Semua',
                            value: -1
                        }]
                    }
                }
            },
            topEnd: {
                search: {
                    placeholder: 'Type search here'
                }
            },
            // bottomStart: pageLength: 10,
        });
    </script>
@endsection
