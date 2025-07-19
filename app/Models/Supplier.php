<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'tbl_supplier';

    protected $fillable = [
        'nama_supplier',
        'alamat_supplier',
        'no_telp',
    ];
    public function stok_masuk()
    {
        return $this->hasMany(\App\Models\StokMasuk::class, 'supplier_id');
    }
}
