<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    use HasFactory;

    protected $table = 'tbl_kurir';

    protected $fillable = [
        'nama_kurir',
        'alamat_kurir',
        'no_telp',
        'jenis_kendaraan',
        'plat_nomor',
        'status',
        'cabang_id',
        'photo'
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }
}
