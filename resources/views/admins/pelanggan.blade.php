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
                            <div class="col-md-12 mb-2">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="no_hp">No. Handphone</label>
                                <input type="text" id="no-hp" name="no_hp" class="form-control">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control">
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
                    <form action="javascript:void(0)" id="form-edit{{ $item->username }}" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Pelanggan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="username">Username</label>
                                    <input type="text" name="username{{ $item->username }}" class="form-control"
                                        id="edit-username{{ $item->username }}" value="{{ $item->username }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="no_hp">No. Handphone</label>
                                    <input type="text" name="no_hp{{ $item->username }}" class="form-control"
                                        id="edit-nohp{{ $item->username }}" value="{{ $item->no_hp }}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama{{ $item->username }}" class="form-control"
                                        id="edit-nama{{ $item->username }}" value="{{ $item->nama }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button id="btn-edit{{ $item->username }}" type="submit"
                                class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="hapus{{ $item->username }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="javascript:void(0)" id="form-delete{{ $item->username }}" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menghapus data ini?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <b>Semua data yang berkaitan dengan pengguna ini seperti (data barang, data pribadi, dan
                                lain-lain) juga akan terhapus!</b>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control is-invalid" value="{{ $item->username }}"
                                        disabled>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="no_hp">No. Handphone</label>
                                    <input type="text" class="form-control is-invalid" value="{{ $item->no_hp }}"
                                        disabled>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control is-invalid" value="{{ $item->nama }}"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" id="btn-delete{{ $item->username }}"
                                class="btn btn-primary">Yakin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="reset{{ $item->username }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="javascript:void(0)" id="form-reset{{ $item->username }}" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin melakukan reset password
                                pelanggan ini?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control is-invalid" value="{{ $item->username }}"
                                        disabled>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="no_hp">No. Handphone</label>
                                    <input type="text" class="form-control is-invalid" value="{{ $item->no_hp }}"
                                        disabled>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control is-invalid" value="{{ $item->nama }}"
                                        disabled>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="nama">Password</label>
                                    <input type="password" placeholder="Masukkan password Anda" class="form-control"
                                        id="pw{{ $item->username }}" name="password{{ $item->username }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" id="btn-reset{{ $item->username }}"
                                class="btn btn-primary">Yakin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <div id="edit-section"></div>


    <!-- Notif Modal -->
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
                    <button type="button" class="btn btn-primary btn-sm" onClick="location.reload()">Oke!</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        window.onload = dataTablePelanggan();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var dataPelanggan = new DataTable('#data-pelanggan');

        function dataTablePelanggan() {
            new DataTable('#data-pelanggan', {
                processing: true,
                ajax: {
                    url: '{{ route('dataTablePelanggan') }}'
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
                            '</a><a data-bs-toggle="modal" class="btn btn-success btn-sm m-1" href=#reset' +
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
                var nama = $('#nama').val();
                var btn = document.getElementById('btn-add');
                var errorUsername = document.getElementById('error-username');
                var errorNoHP = document.getElementById('error-no_hp');
                var errorNama = document.getElementById('error-nama');

                if (errorUsername != null) {
                    errorUsername.innerHTML = "";
                }
                if (errorNoHP != null) {
                    errorNoHP.innerHTML = "";
                }
                if (errorNama != null) {
                    errorNama.innerHTML = "";
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
                            document.getElementById('info-success').innerHTML = data[
                                'success'];
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

        const pelanggans = <?php echo json_encode($pelanggans); ?>;
        let pelanggan = Object.values(pelanggans);
        pelanggan.forEach(item => {
            var usn = item['username'];

            $('#form-edit' + usn).validate({
                submitHandler: function() {
                    var username = $('#edit-username' + usn).val();
                    var no_hp = $('#edit-nohp' + usn).val();
                    var nama = $('#edit-nama' + usn).val();
                    var btn = document.getElementById('btn-edit' + usn);
                    var errorUsername = document.getElementById('error-username' + usn)
                    var errorNoHP = document.getElementById('error-no_hp' + usn)
                    var errorNama = document.getElementById('error-nama' + usn)
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
                    $('#btn-edit' + usn).append(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;Loading...'
                    );
                    setTimeout(() => {
                        btn.innerHTML = "Simpan";
                        btn.disabled = false;
                    }, 1500);
                    setTimeout(() => {
                        $.ajax({
                            url: "{{ route('editDataPelanggan') }}",
                            type: 'POST',
                            dataType: "json",
                            data: {
                                id: item['id'],
                                username: username,
                                no_hp: no_hp,
                                nama: nama
                            },
                            success: function(data, success) {
                                $('#edit' + usn).modal('hide')
                                $('#staticBackdrop').modal('show')
                                document.getElementById('info-success')
                                    .innerHTML =
                                    data['success'];
                                console.log(data);
                            },
                            error: function(err) {
                                if (err.status == 422) {
                                    $.each(err.responseJSON.errors, function(i,
                                        error) {
                                        var el = $(document).find(
                                            '[name="' + i + usn +
                                            '"]');
                                        el.after($('<span id="error-' +
                                            i +
                                            usn +
                                            '" style="color: red;"><small>' +
                                            error[0] +
                                            '</small></span>'));
                                    });
                                } else if (err.status == 419) {
                                    $.each(err.responseJSON.errors, function(i,
                                        error) {
                                        var el = $(document).find(
                                            '[name="' + i + usn +
                                            '"]');
                                        el.after($('<span id = "error-' +
                                            i + usn +
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

            $('#form-delete' + usn).validate({
                submitHandler: function() {

                    var btn = document.getElementById('btn-delete' + usn);

                    btn.innerHTML = "";
                    btn.disabled = true;
                    $('#btn-delete' + usn).append(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;Loading...'
                    );
                    setTimeout(() => {
                        btn.innerHTML = "Simpan";
                        btn.disabled = false;
                    }, 1500);
                    setTimeout(() => {
                        $.ajax({
                            url: "{{ route('deleteDataPelanggan') }}",
                            type: 'POST',
                            dataType: "json",
                            data: {
                                id: item['id']
                            },
                            success: function(data, success) {
                                $('#hapus' + usn).modal('hide')
                                $('#staticBackdrop').modal('show')
                                document.getElementById('info-success')
                                    .innerHTML =
                                    data['success'];
                                console.log(data);
                            },
                            error: function(err) {
                                if (err.status == 422) {
                                    $.each(err.responseJSON.errors, function(i,
                                        error) {
                                        var el = $(document).find(
                                            '[name="' + i + usn +
                                            '"]');
                                        el.after($('<span id="error-' +
                                            i +
                                            usn +
                                            '" style="color: red;"><small>' +
                                            error[0] +
                                            '</small></span>'));
                                    });
                                } else if (err.status == 419) {
                                    $.each(err.responseJSON.errors, function(i,
                                        error) {
                                        var el = $(document).find(
                                            '[name="' + i + usn +
                                            '"]');
                                        el.after($('<span id = "error-' +
                                            i + usn +
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

            $('#form-reset' + usn).validate({
                submitHandler: function() {
                    let pw = $('#pw' + usn).val();
                    var btn = document.getElementById('btn-reset' + usn);
                    var inpPW = document.getElementById('pw' + usn)
                    var errorPW = document.getElementById('error-password' + usn)
                    if (errorPW != null) {
                        errorPW.innerHTML = ""
                    }
                    inpPW.classList.remove('is-invalid')
                    btn.innerHTML = "";
                    btn.disabled = true;
                    $('#btn-reset' + usn).append(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;Loading...'
                    );
                    setTimeout(() => {
                        btn.innerHTML = "Simpan";
                        btn.disabled = false;
                    }, 1500);
                    setTimeout(() => {
                        $.ajax({
                            url: "{{ route('resetPWPelanggan') }}",
                            type: 'POST',
                            dataType: "json",
                            data: {
                                id: item['id'],
                                password: pw
                            },
                            success: function(data, success) {
                                let check = Object.values(data);
                                check.forEach(element => {
                                    if (element == false) {

                                        inpPW.classList.add("is-invalid");
                                        $('#pw' + usn).after($(
                                            '<span id="error-password' +
                                            usn +
                                            '" style="color: red;"><small>Password yang Anda masukkan salah!</small></span>'
                                        ));
                                    } else if (element == true) {
                                        $('#reset' + usn).modal('hide')
                                        $('#staticBackdrop').modal('show')
                                        document.getElementById(
                                                'info-success')
                                            .innerHTML =
                                            data['success'];
                                    }
                                });
                            },
                            error: function(err) {
                                if (err.status == 422) {
                                    $.each(err.responseJSON.errors, function(i,
                                        error) {
                                        var el = $(document).find(
                                            '[name="' + i + usn +
                                            '"]');
                                        inpPW.classList.add('is-invalid');
                                        el.after($('<span id="error-' +
                                            i +
                                            usn +
                                            '" style="color: red;"><small>' +
                                            error[0] +
                                            '</small></span>'));
                                    });
                                } else if (err.status == 419) {
                                    $.each(err.responseJSON.errors, function(i,
                                        error) {
                                        var el = $(document).find(
                                            '[name="' + i + usn +
                                            '"]');
                                        el.after($('<span id = "error-' +
                                            i + usn +
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
        });
    </script>
@endsection
