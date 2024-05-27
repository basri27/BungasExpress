<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'posisi'
    ];

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
