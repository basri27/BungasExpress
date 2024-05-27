<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'no_resi',
        'user_id',
        'jenis_pembayaran',
        'status_barang'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function lokasi(){
        return $this->hasMany(Lokasi::class);
    }
}
