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
                    {{-- <thead>
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
                    </tfoot> --}}
                </table>
            </div>
        </div>
    </div>
@endsection

@section('custom-modal')
    <div class="modal fade" id="tambahPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="javascript:void(0)" id="form-add" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelanggan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control">
                                {{-- <div class="invalid-feedback" id="error-username"></div> --}}
                            </div>
                            <div class="col-md-12">
                                <label for="no_hp">No. Handphone</label>
                                <input type="text" id="no-hp" name="no_hp" class="form-control">
                                {{-- <div class="invalid-feedback" id="error-no-hp"></div> --}}
                            </div>
                            <div class="col-md-12">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control">
                                {{-- <div class="invalid-feedback" id="error-nama"></div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button id="btn-add" type="submit" class="btn btn-primary">Simpan</button>
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
    <div id="edit-section"></div>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Pemberitahuan!</h5>
                </div>
                <div class="modal-body" id="info-success">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Oke!</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        window.onload = loadDataPelanggan();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var dataPelanggan = new DataTable('#data-pelanggan');

        function loadDataPelanggan() {
            new DataTable('#data-pelanggan', {
                processing: true,
                ajax: {
                    url: '{{ route('allPelanggan') }}'
                },
                columns: [{
                    title: "Username",
                    "mRender": function(data, type, full) {
                        return '<b><span class="text-primary">' + full.username + '</span></b>'
                    }
                }, {
                    title: "Nama Pelanggan",
                    data: 'nama'
                }, {
                    title: "No. Handphone",
                    data: 'no_hp'
                }, {
                    title: "Aksi",
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
            });
        }

        $('#form-add').validate({
            submitHandler: function() {
                var username = $('#username').val();
                var no_hp = $('#no-hp').val();
                var nama = $('#nama').val();;
                var btn = document.getElementById('btn-add');
                var errorUsername = document.getElementById('error-username')
                var errorNoHP = document.getElementById('error-no_hp')
                var errorNama = document.getElementById('error-nama')
                if (errorUsername != null) {
                    errorUsername.innerHTML = ""
                }
                if (errorNoHP != null) {
                    errorNoHP.innerHTML = ""
                }
                if (errorNama != null) {
                    errorNama.innerHTML = ""
                }

                btn.innerHTML = "";
                btn.disabled = true;
                $('#btn-add').append(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;Loading...'
                );
                setTimeout(() => {
                    btn.innerHTML = "Simpan";
                    btn.disabled = false;
                }, 1500);
                setTimeout(() => {
                    $.ajax({
                        url: "{{ route('addDataPelanggan') }}",
                        type: 'POST',
                        dataType: "json",
                        data: {
                            username: username,
                            no_hp: no_hp,
                            nama: nama
                        },
                        success: function(data) {
                            $('#tambahPelanggan').modal('hide')
                            $('#staticBackdrop').modal('show')
                            document.getElementById('info-success').innerHTML =
                                "Data berhasil ditambahkan!";
                            let rowData = Object.values(data);

                            var ubah = $(document).find('[id = edit-section]');
                            ubah.after($('<div class="modal fade" id="edit' +
                                rowData[0]['username'] +
                                '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
                                '<div class="modal-dialog">' +
                                '<div class="modal-content">' +
                                '<form action="#" method="POST">' +
                                '<div class="modal-header">' +
                                '<h5 class="modal-title" id="exampleModalLabel">Edit Data Pelanggan</h5>' +
                                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
                                '</div>' +
                                '<div class="modal-body">' +
                                '<div class="row">' +
                                '<div class="col-md-12 mb-2">' +
                                '<label for="username">Username</label>' +
                                '<input type="text" id="username-edit" name="username" class="form-control" value="' +
                                rowData[0]['username'] + '">' +
                                '</div>' +
                                '<div class="col-md-12 mb-2">' +
                                '<label for="no_hp">No. Handphone</label>' +
                                '<input type="text" id="no-hp-edit" name="no_hp" class="form-control" value="' +
                                rowData[0]['no_hp'] + '">' +
                                '</div>' +
                                '<div class="col-md-12 mb-2">' +
                                '<label for="nama">Nama</label>' +
                                '<input type="text" id="nama-edit" name="nama" class="form-control" value="' +
                                rowData[0]['nama'] + '">' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="modal-footer">' +
                                '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>' +
                                '<button type="button" class="btn btn-primary">Simpan</button>' +
                                '</div>' +
                                '</form>' +
                                '</div>' +
                                '</div>' +
                                '</div>'));
                            dataPelanggan.ajax.reload();
                            document.getElementById('form-add').reset()
                        },
                        error: function(err) {
                            if (err.status == 422) {
                                $.each(err.responseJSON.errors, function(i,
                                    error) {
                                    var el = $(document).find(
                                        '[name="' + i + '"]');
                                    el.after($('<span id="error-' + i +
                                        '" style="color: red;"><small>' +
                                        error[0] +
                                        '</small></span>'));
                                });
                            } else if (err.status == 419) {
                                $.each(err.responseJSON.errors, function(i,
                                    error) {
                                    var el = $(document).find(
                                        '[name="' + i + '"]');
                                    el.after($('<span id = "error-' +
                                        i +
                                        '" style="color: red;"><small>' +
                                        error[0] +
                                        '</small></span>'));
                                });
                            }
                        }
                    })
                }, 1000);
            }
        });
    </script>
@endsection
