<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard() {
        $today = Barang::whereDate('created_at', 'Carbon::now()')->get();
        $pesananToday = $today->count();
        $pelangganToday = $today->groupBy('user_id')->count();

        if (Auth::user()->role == "admin") {
            return view('admins.dashboard', compact('pesananToday', 'pelangganToday'));
        } elseif (Auth::user()->role == "pelanggan") {
            return view('users.dashboard', compact('user'));
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
}
