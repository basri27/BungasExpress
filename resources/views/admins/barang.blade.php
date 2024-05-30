@extends('layouts.front')

@section('section', 'Data Barang')

@section('page-title')
    <div class="pagetitle">
        <h1>Data Barang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Page</li>
                <li class="breadcrumb-item active">Data Barang</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <h5 class="card-title">Data Barang</h5>
                <table id="data-barang" class="table table-borderless datatable" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">No. Resi</th>
                            <th scope="col">Jenis Pembayaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">No. Resi</th>
                            <th scope="col">Jenis Pembayaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('custom-modal')
    @foreach ($barangs as $item)
        <div class="modal fade" id="hapus{{ $item->no_resi }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Anda yakin ingin menghapus data ini?</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="pemilik">Pemilik</label>
                                <input type="text" name="pemilik" class="form-control" value="{{ $item->user->nama }}"
                                    disabled>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="no_resi">No. Resi</label>
                                <input type="text" name="no_resi" class="form-control" value="{{ $item->no_resi }}"
                                    disabled>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control"
                                    value="{{ $item->nama_barang }}" disabled>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="jenis_pembayaran">Jenis Pembayaran</label>
                                <input type="text" name="jenis_pembayaran" class="form-control"
                                    value="{{ $item->jenis_pembayaran }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Yakin</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('custom-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"
        integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
    <script>
        var encrypted = CryptoJS.AES.encrypt("Message", "Secret Passphrase");
        new DataTable('#data-barang', {
            processing: true,
            ajax: {
                url: '{{ route('allBarang') }}'
            },
            columns: [{
                'mRender': function(data, type, full) {
                    return full.user.nama
                }
            }, {
                data: 'nama_barang'
            }, {
                data: 'no_resi'
            }, {
                data: 'jenis_pembayaran'
            }, {
                data: 'status_barang'
            }, {
                "mRender": function(data, type, full) {
                    return '<a class="btn btn-warning btn-sm m-1" href=data-barang/edit-barang/' + full
                        .no_resi + '>' + '<i class="bi bi-pencil-square"></i>' +
                        '</a><a data-bs-toggle="modal" class="btn btn-danger btn-sm m-1" href=#hapus' +
                        full.no_resi + '>' +
                        '<i class="bi bi-trash"></i>' +
                        '</a><a class="btn btn-secondary btn-sm m-1" href=data-barang/lokasi-barang/' +
                        full.no_resi + '>' + '<i class="bi bi-pin-map"></i>' + '</a>';
                }
            }],
            layout: {
                topStart: {
                    buttons: [{
                        text: 'Tambah',
                        action: function(e, dt, node, config) {
                            window.location.href = 'data-barang/tambah-barang'
                            // $('#tambahPelanggan').modal('show')
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

        // $('.js-example-basic-single').select2()
        // $("#edit-barang").select2({
        //     placeholder: "Pilih barang yang ingin diubah",
        //     allowClear: true
        // });
        // $("#hapus-barang").select2({
        //     placeholder: "Pilih barang yang ingin dihapus",
        //     allowClear: true
        // });
        // $("#lokasi-barang").select2({
        //     placeholder: "Pilih barang yang ingin diupdate lokasinya",
        //     allowClear: true
        // });
    </script>
@endsection
