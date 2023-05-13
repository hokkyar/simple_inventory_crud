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
    Schema::create('transaksis', function (Blueprint $table) {
      $table->id();
      $table->date('tanggal_transaksi');
      $table->enum('jenis_transaksi', ['masuk', 'keluar']);
      $table->unsignedBigInteger('id_barang');
      $table->unsignedBigInteger('id_karyawan');
      $table->unsignedBigInteger('jumlah_barang');
      $table->foreign('id_barang')->references('id')->on('barangs');
      $table->foreign('id_karyawan')->references('id')->on('karyawans');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('transaksis');
  }
};
