<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('id_tagihan');
            $table->date('tanggal_bayar');
            $table->decimal('biaya_admin', 12, 2); // ✅ Tambahkan kolom ini
            $table->decimal('total_bayar', 12, 2);
            $table->unsignedBigInteger('id_admin');
            $table->timestamps();

            $table->foreign('id_tagihan')->references('id_tagihan')->on('tagihan')->cascadeOnDelete();
            $table->foreign('id_admin')->references('id_user')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
