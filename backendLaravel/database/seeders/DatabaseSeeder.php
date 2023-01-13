<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aksesoris;
use App\Models\Pulsa;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     "id" => "3",
        //     "role" => "Toko B",
        //     "username" => "simaster2",
        //     "password" => bcrypt("12345"),
        //     "created_at" => date("Y-m-d H:i:s"),
        //     "updated_at" => date("Y-m-d H:i:s")
        // ]);

        // Voucher::create([
        //     'id' => 2,
        //     'id_user' => 1,
        //     'namaVoucher' => "XL",
        //     'harga' => 15000,
        //     'quantity' => 50,
        //     'terjual' => 1,
        //     'catatan' => "Oke Bosku",
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")
        // ]);

        // Aksesoris::create([
        //     'id' => 2,
        //     'id_user' => 1,
        //     'namaAksesoris' => "Kabel Data",
        //     'jenisAksesoris' => "Kabel",
        //     'harga' => 15000,
        //     'quantity' => 50,
        //     'terjual' => 1,
        //     'catatan' => "Oke Bosku",
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")
        // ]);

        Pulsa::create([
            'id' => 2,
            'id_user' => 1,
            'saldo' => 1000000,
            'terjual' => 60000,
            'catatan' => "Oke Bosku",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
