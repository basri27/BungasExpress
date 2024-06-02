<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function searchBarang(Request $request) {
        $barang = Barang::with('user')->with('lokasi')->where('no_resi', $request->input('resi'))->first();

        return response()->json([
            'data' => $barang
        ]);
    }
}
