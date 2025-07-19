<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokKeluarDetail extends Model
{
    use HasFactory;
    protected $table = 'stok_keluar_details';
    protected $fillable = [
        'stok_keluar_id',
        'barang_id',
        'jumlah'
    ];

    public function stokKeluar()
    {
        return $this->belongsTo(StokKeluar::class);
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
