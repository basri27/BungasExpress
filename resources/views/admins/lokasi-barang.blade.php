@extends('layouts.front')

@section('section', 'Update Lokasi Barang')

@section('page-title')
    <div class="pagetitle">
        <h1>Update Lokasi Barang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('barang') }}">Data Barang</a></li>
                <li class="breadcrumb-item active">Update Lokasi Barang</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update Lokasi Barang</h5>
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="no_resi">No. Resi</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="btnGroupAddon">
                                        <a href="#infoBarang" data-bs-toggle="modal"><i class="bi bi-info-square"></i></a>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="no_resi" value="{{ $barang->no_resi }}"
                                    disabled>
                            </div>

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="posisi_barang">Posisi Barang</label>
                            {{-- <input type="text" class="form-control" placeholder="Masukkan lokasi barang"
                                name="lokasi_barang" value="{{ old('lokasi_barang') }}"> --}}
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="lokasi">{{ old('lokasi') }}</textarea>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('barang') }}" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                <hr>
                <div class="activity">
                    @foreach ($lokasis as $item)
                        <div class="activity-item d-flex">

                            @if ($loop->last)
                                <div class="activite-label col-4 text-end">
                                    {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                    <br>
                                    {{ Carbon\Carbon::parse($item->created_at)->format('H:i') }}
                                </div>

                                <i class="bi bi-circle-fill activity-badge text-success align-self-center"></i>
                                <div class="activity-content align-self-center">
                                    {{ $item->posisi }}
                                </div>
                            @else
                                <div class="activite-label col-4 text-end ">
                                    {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                    <br>
                                    {{ Carbon\Carbon::parse($item->created_at)->format('H:i') }}
                                </div>

                                <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                                <div class="activity-content">
                                    {{ $item->posisi }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('custom-modal')
    <div class="modal fade" id="infoBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Detail Barang</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="pemilik">Pemilik</label>
                            <input type="text" name="pemilik" class="form-control" value="{{ $barang->user->nama }}"
                                disabled>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="no_resi">No. Resi</label>
                            <input type="text" name="no_resi" class="form-control" value="{{ $barang->no_resi }}"
                                disabled>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control"
                                value="{{ $barang->nama_barang }}" disabled>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="jenis_pembayaran">Jenis Pembayaran</label>
                            <input type="text" name="jenis_pembayaran" class="form-control"
                                value="{{ $barang->jenis_pembayaran }}" disabled>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="created_at">Tanggal</label>
                            <input type="text" class="form-control"
                                value="{{ Carbon\Carbon::parse($barang->created_at)->format('d F Y | H:i:s') }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')

@endsection
