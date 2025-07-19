<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokKeluar extends Model
{
    use HasFactory;
    protected $table = 'stok_keluar';
    protected $fillable = [
        'kurir_id',
        'cabang_id',
        'tanggal_keluar',
        'keterangan'
    ];

    public function kurir()
    {
        return $this->belongsTo(Kurir::class);
    }
    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }
    public function details()
    {
        return $this->hasMany(StokKeluarDetail::class);
    }
}
