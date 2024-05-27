<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'basri27.m',
            'nama' => 'Admin',
            'no_hp' => '081234567890',
            'password' => Hash::make('123123'),
            'role' => 'admin'
        ]);
        User::create([
            'username' => 'pelanggan1',
            'nama' => 'Husain',
            'no_hp' => '081122334455',
            'password' => Hash::make('123123'),
            'role' => 'pelanggan'
        ]);
        User::create([
            'username' => 'pelanggan2',
            'nama' => 'Basri',
            'no_hp' => '081122334455',
            'password' => Hash::make('123123'),
            'role' => 'pelanggan'
        ]);

        Barang::create([
            'nama_barang' => 'Erigo Birthday T-Shirt Flora 2023',
            'no_resi' => 'FLR4APR23H',
            'user_id' => '2',
            'jenis_pembayaran' => 'COD',
            'status_barang' => 'Diproses'
        ]);
        Barang::create([
            'nama_barang' => 'Erigo Birthday T-Shirt Flora 2024',
            'no_resi' => 'FLR4APR23B',
            'user_id' => '3',
            'jenis_pembayaran' => 'Non-COD',
            'status_barang' => 'Selesai'
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
