@extends('layouts.front')

@section('section', 'Tambah Data Barang')

@section('page-title')
    <div class="pagetitle">
        <h1>Tambah Data Barang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('barang') }}">Data Barang</a></li>
                <li class="breadcrumb-item active">Tambah Data Barang</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Data Barang</h5>
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Pemilik</label>
                            <select name="pemilik" id="pelanggan">
                                <option value="" disabled selected hidden>Pilih pemilik barang!</option>
                                @foreach ($pelanggans as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama barang!"
                                name="nama_barang" value="{{ old('nama_barang') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_resi">No. Resi</label>
                            <input type="text" class="form-control" placeholder="Masukkan nomor resi!" name="no_resi"
                                value="{{ old('no_resi') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jenis-pembayaran">Jenis Pembayaran</label>
                            <select name="jenis-pembayaran" id="pembayaran">
                                <option value="" disabled selected hidden>Pilih jenis pembayaran!</option>
                                <option value="COD">COD</option>
                                <option value="Non-COD">Non-COD</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('custom-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#pelanggan").selectize({
            sortField: 'text'
        });
        $("#pembayaran").selectize({
            sortField: 'text'
        });
    </script>
@endsection
