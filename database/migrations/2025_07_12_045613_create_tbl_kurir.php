<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_kurir', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kurir', 100);
            $table->string('alamat_kurir', 100);
            $table->string('no_telp', 15);
            $table->string('jenis_kendaraan', 50);
            $table->string('plat_nomor', 20);
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('
Aktif');
            $table->string('photo', 100);
            $table->foreignId('cabang_id')->constrained('tbl_cabang')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_kurir');
    }
};
