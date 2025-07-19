<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stok_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kurir_id')->constrained('tbl_kurir')->onDelete('cascade');
            $table->foreignId('cabang_id')->constrained('tbl_cabang')->onDelete('cascade');
            $table->date('tanggal_keluar');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::create('stok_keluar_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stok_keluar_id')->constrained('stok_keluar')->onDelete('cascade');
            $table->foreignId('barang_id')->constrained('tbl_barang')->onDelete('cascade');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stok_keluar_details');
        Schema::dropIfExists('stok_keluar');
    }
};
