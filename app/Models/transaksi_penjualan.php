<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi_penjualan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function detail_penjualan()
    {
        return $this->hasMany(detail_penjualan::class);
    }
}
