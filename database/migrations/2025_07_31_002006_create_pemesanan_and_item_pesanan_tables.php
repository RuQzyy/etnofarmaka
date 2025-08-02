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
        // Tabel utama untuk setiap pesanan
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->dateTime('tanggal_pesan');
            $table->decimal('total_harga', 15, 2)->default(0); // Total harga pesanan
            $table->enum('status', ['pending', 'menunggu_pembayaran', 'diproses', 'selesai', 'dibatalkan'])->default('pending');
            $table->timestamps();
        });

        // Tabel untuk setiap item dalam sebuah pesanan
        Schema::create('item_pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemesanan')->constrained('pemesanan')->onDelete('cascade');
            $table->foreignId('id_obat')->constrained('obat')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('harga_satuan', 15, 2); // Simpan harga saat checkout
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_pesanan');
        Schema::dropIfExists('pemesanan');
    }
};