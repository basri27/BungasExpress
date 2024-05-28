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
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md mb-1">
                                <label for="pemilik-barang">Pemilik Barang</label>
                                <select id="pemilik-barang" style="width: 100%" name="state">
                                    <option value=""></option>
                                    @foreach ($pelanggan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="tambahPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md mb-1">
                            <label for="pemilik-barang">Pemilik Barang</label>
                            <select id="pemilik-barang" style="width: 100%" name="state">
                                <option value=""></option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
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
                    return '<a class="btn btn-warning btn-sm m-1" href=#edit' +
                        full.no_resi + '>' + '<i class="bi bi-pencil-square"></i>' +
                        '</a><a data-bs-toggle="modal" class="btn btn-danger btn-sm m-1" href=#hapus' +
                        full.no_resi + '>' +
                        '<i class="bi bi-trash"></i>' +
                        '</a><a class="btn btn-secondary btn-sm m-1" href=#ahapus' + full.no_resi +
                        '>' + '<i class="bi bi-pin-map"></i>' + '</a>';
                }
            }],
            layout: {
                topStart: {
                    buttons: [{
                        text: 'Tambah',
                        action: function(e, dt, node, config) {
                            window.location.href = 'tambah-barang'
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
