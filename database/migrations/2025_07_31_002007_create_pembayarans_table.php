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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemesanan')->constrained('pemesanan')->onDelete('cascade');
            $table->decimal('jumlah_bayar', 15, 2);
            $table->string('metode_pembayaran'); // misal: 'Transfer Bank', 'GoPay', dll.
            $table->enum('status_pembayaran', ['pending', 'sukses', 'gagal'])->default('pending');
            $table->timestamp('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
