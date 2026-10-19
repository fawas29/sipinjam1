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
    Schema::create('barangs', function (Blueprint $table) {
        $table->id(); // Membuat kolom ID otomatis
        $table->string('nama_barang'); // Kolom nama barang (teks)
        $table->integer('stok'); // Kolom stok (angka)
        $table->string('kondisi'); // Kolom kondisi barang
        $table->timestamps(); // Membuat kolom otomatis (created_at & updated_at)
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
