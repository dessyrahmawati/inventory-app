<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tbl_barang';

    protected $fillable = [
        'nama_barang',
        'jenis_barang',
        'stok',
        'photo',
        'harga',
        'keterangan',
    ];
    public function stok_masuk()
    {
        return $this->hasMany(\App\Models\StokMasuk::class, 'barang_id');
    }
    public function stok_keluar_details()
    {
        return $this->hasMany(\App\Models\StokKeluarDetail::class, 'barang_id');
    }
}
