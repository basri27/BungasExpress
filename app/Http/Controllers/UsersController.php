<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard() {
        $today = Barang::whereDate('created_at', Carbon::now())->get();
        $yesterday = Barang::whereDate('created_at', Carbon::yesterday())->get();
        $pesananToday = $today->count();
        $pelangganToday = $today->groupBy('user_id')->count();
        $pesananYesterday = $yesterday->count();
        $pelangganYesterday = $yesterday->groupBy('user_id')->count();
        $totalBarang = Barang::count();
        $totalPelanggan = User::where('role', 'pelanggan')->count();
        if($pesananToday != 0 && $pesananYesterday != 0) {
            $percentagePesanan = ($pesananToday-$pesananYesterday)/$pesananYesterday*100;
        }elseif ($pesananToday == 0 && $pesananYesterday !=0) {
            $percentagePesanan = ($pesananToday-$pesananYesterday)/$pesananYesterday*100;
        }elseif ($pesananYesterday == 0) {
            $percentagePesanan = $pesananToday*100;
        }

        if($pelangganToday != 0 && $pelangganYesterday != 0) {
            $percentagePelanggan = ($pelangganToday-$pelangganYesterday)/$pelangganYesterday*100;
        }elseif ($pelangganToday == 0 && $pelangganYesterday !=0) {
            $percentagePelanggan = ($pelangganToday-$pelangganYesterday)/$pelangganYesterday*100;
        }elseif ($pelangganYesterday == 0) {
            $percentagePelanggan = $pelangganToday*100;
        }

        if (Auth::user()->role == "admin") {
            return view('admins.dashboard', compact('pesananToday', 'pelangganToday', 'percentagePesanan', 'percentagePelanggan'));
        } elseif (Auth::user()->role == "pelanggan") {
            return view('users.dashboard', compact('user', 'totalBarang', 'totalPelanggan'));
        }
        
    }

    public function barangToday(){
        $query = Barang::with('user')->whereDate('created_at', Carbon::now());
        $today = $query->orderBy('created_at', 'DESC')->take(5)->get();
        $totalRecord = $today->count();

        return response()->json([
            'data' => $today,
            'recordsTotal' => $totalRecord,
            'recordsFiltered' => $totalRecord
        ]);
    }

    public function profile() {
        $user = Auth::user();

        return view('layouts.profile', compact('user'));
    }

    public function dataBarang() {
        $barangs = Barang::with('user')->get();
        $pelanggan = User::where('role', 'pelanggan')->get();

        return view('admins.barang', compact('barangs', 'pelanggan'));
    }

    public function allBarang() {
        $query = Barang::with('user')->orderBy('id')->get();
        $totalRecord = $query->count();

        return response()->json([
            'data' => $query,
            'recordsTotal' => $totalRecord,
            'recordsFiltered' => $totalRecord
        ]);
    }

    public function dataPelanggan() {
        $pelanggans = User::where('role', 'pelanggan')->get();

        return view('admins.pelanggan', compact('pelanggans'));
    }

    public function allPelanggan() {
        $query = User::where('role', 'pelanggan')->get();
        $totalRecord = $query->count();

        return response()->json([
            'data' => $query,
            'recordsTotal' => $totalRecord,
            'recordsFiltered' => $totalRecord
        ]);
    }

    public function tambahBarang() {
        $pelanggans = User::where('role', 'pelanggan')->get();

        return view('admins.add-barang', compact('pelanggans'));
    }

    public function editBarang($resiBarang) {
        $pelanggans = User::where('role', 'pelanggan')->get();
        $barang = Barang::with('user')->where('no_resi', $resiBarang)->first();

        return view('admins.edit-barang', compact('pelanggans', 'barang'));
    }

    public function lokasiBarang($resiBarang) {
        $barang = Barang::with('user')->where('no_resi', $resiBarang)->first();
        $lokasis = Lokasi::where('barang_id', $barang->id)->orderBy('created_at', 'desc')->get();

        return view('admins.lokasi-barang', compact('barang', 'lokasis'));
    }

    public function addDataPelanggan(Request $request) {
        $this->validate($request, [
            'username' => 'required|unique:users,username',
            'no_hp' => 'required|numeric',
            'nama' => "required|regex:/^[a-zA-Z.,'Ññ\s]+$/",
        ], [
            'username.required' => 'Data username tidak boleh kosong!',
            'nama.required' => 'Data nama tidak boleh kosong!',
            'no_hp.required' => 'Data nomor hp tidak boleh kosong!',
            'nama.regex' => 'Format nama yang Anda masukkan tidak valid atau tidak boleh mengandung angka!',
            'no_hp.numeric' => 'Nomor handphone '. $request->input('no_hp') .' tidak valid!',
            'username.unique' => 'Username ' . $request->input('username') . ' telah digunakan',
        ]);

        User::create([
            'username' => $request->input('username'),
            'nama' => $request->input('nama'),
            'no_hp' => $request->input('no_hp'),
            'password' => Hash::make('11223344'),
            'role' => 'pelanggan'
        ]);

        return response()->json(['data' => $request->all()]);
    }
}
