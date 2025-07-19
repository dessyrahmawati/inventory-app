<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    protected $table = 'tbl_cabang';

    protected $fillable = [
        'nama_cabang',
        'alamat_cabang',
        'no_telp',
    ];
    public function stok_keluar()
    {
        return $this->hasMany(\App\Models\StokKeluar::class, 'cabang_id');
    }
}
