@extends('layouts.front')

@section('section', 'Dashboard Admin')

@section('page-title')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Pesanan Barang <span>| Hari ini</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $pesananToday }}</h6>
                        <span class="text-success small mt-0 fw-bold">12%</span> <span
                            class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Pelanggan <span>| Hari ini</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $pelangganToday }}</h6>
                        <span class="text-success small mt-0 fw-bold">12%</span> <span
                            class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <h5 class="card-title">Data Barang Terbaru <span>| Hari ini</span></h5>

                <table id="data-terbaru" class="table table-borderless datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Waktu (Lokal)</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">No. Resi</th>
                            <th scope="col">Jenis Pembayaran</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="projects-table-body">

                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('dashboard/js/date.format.js') }}"></script>
    <script>
        $('#data-terbaru').DataTable({
            searching: false,
            paging: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: 'get-barang-today'
            },
            columns: [{
                'mRender': function(data, type, full) {
                    return full.user.nama
                }
            }, {
                'mRender': function(data, type, full) {
                    let date = new Date(full.created_at);
                    dateFormat.masks.hammerTime = 'HH:MM:ss'

                    return date.format("hammerTime")
                }
            }, {
                data: 'nama_barang'
            }, {
                data: 'no_resi'
            }, {
                data: 'jenis_pembayaran'
            }, {
                'mRender': function(data, type, full) {
                    if (full.status_barang == 'Diproses') {
                        return '<span class="badge bg-danger">' + full.status_barang + '</span>'
                    } else {
                        return '<span class="badge bg-warning">' + full.status_barang + '</span>'
                    }
                }
            }],
        });
    </script>
@endsection
