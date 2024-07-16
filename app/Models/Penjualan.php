<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = [
        'kode_penjualan',
        'tanggal',
        'konsumen_id',
        'barang_id',
        'jumlah',
        'total',
        'status',
    ];
    protected $dates = ['tanggal'];


    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}