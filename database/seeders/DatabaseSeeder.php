<?php

namespace Database\Seeders;

use App\Models\akun;
use App\Models\barang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        akun::create([
            'no_account' => '1000',
            'name_account' => 'Aktiva Lancar',
            'is_header_account' => true,
        ]);

        akun::create([
            'no_account' => '1001',
            'name_account' => 'Kas',
            'header_account' => "1000",
        ]);

        barang::create([
            'no_barang' => 'BRG01',
            'name_barang' => 'Tas Guci',
            'stok' => 4,
            'harga_beli' => 300000,
            'harga_jual' => 400000,
        ]);
    }
}
