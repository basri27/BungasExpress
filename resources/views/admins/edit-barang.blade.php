@extends('layouts.front')

@section('section', 'Edit Data Barang')

@section('page-title')
    <div class="pagetitle">
        <h1>Edit Data Barang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('barang') }}">Data Barang</a></li>
                <li class="breadcrumb-item active">Edit Data Barang</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Data Barang</h5>
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Pemilik</label>
                            <select name="pemilik" id="pelanggan">
                                <option value="{{ $barang->user->id }}" selected hidden>
                                    {{ $barang->user->nama }}
                                </option>
                                @foreach ($pelanggans as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama barang" name="nama_barang"
                                value="{{ $barang->nama_barang }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_resi">No. Resi</label>
                            <input type="text" class="form-control" placeholder="Masukkan nomor resi" name="no_resi"
                                value="{{ $barang->no_resi }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jenis-pembayaran">Jenis Pembayaran</label>
                            <select name="jenis-pembayaran" id="pembayaran">
                                <option value="{{ $barang->jenis_pembayaran }}" selected hidden>
                                    {{ $barang->jenis_pembayaran }}</option>
                                <option value="COD">COD</option>
                                <option value="Non-COD">Non-COD</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('barang') }}" class="btn btn-danger">Batal</a>
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
