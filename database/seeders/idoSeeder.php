<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Role;
use App\Models\Saldo;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class idoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = Role::create(["name" => "Bank"]);
        $canteen = Role::create(["name" => "Canteen"]);
        $student = Role::create(["name" => "Student"]);

        
        User::create([
            "name" => "fani",
            "email" => "fani@gmail.com",
            "password" => Hash::make("fani"),
            "role_id" => $bank->id
        ]);

        User::create([
            "name" => "cika",
            "email" => "cika@gmail.com",
            "password" => Hash::make("cika"),
            "role_id" => $canteen->id
        ]);

        $andi = User::create([
            "name" => "dixy",
            "email" => "dixy@gmail.com",
            "password" => Hash::make("dixy"),
            "role_id" => $student->id
        ]);

        $pucuk = Barang::create([
            "name" => "Teh Pucuk",
            "image" => "pucuk.jpg",
            "price" => 3500,
            "stock" => 10,
            "desc" => "Minuman teh"
        ]);

        Saldo::create([
            "user_id" => $andi->id,
            "saldo" => 300000
        ]);

        //Isi Saldo
        Transaksi::create([
            "user_id" => $andi->id,
            "barang_id" => null,
            "jumlah" => 500000,
            "invoice_id" => "SAL_001",
            "type" => 1,
            "status" => 3
        ]);

        //Belanja
        // Transaksi::create([
        //     "user_id" => $septy->id,
        //     "barang_id" => $pucuk->id,
        //     "jumlah" => 2,
        //     "invoice_id" => "INV_001",
        //     "type" => 2,
        //     "status" => 1
        // ]);

        // Transaksi::create([
        //     "user_id" => $septy->id,
        //     "barang_id" => $risol->id,
        //     "jumlah" => 2,
        //     "invoice_id" => "INV_001",
        //     "type" => 2,
        //     "status" => 1
        // ]);
    }
}
