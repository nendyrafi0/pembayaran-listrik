<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id('id_tagihan');
            $table->unsignedBigInteger('id_penggunaan');
            $table->integer('jumlah_meter'); // GANTI dari total_kwh ke jumlah_meter agar cocok dengan seeder
            $table->decimal('jumlah_tagihan', 12, 2);
            $table->enum('status', ['Belum Bayar', 'Sudah Bayar']);
            $table->timestamps();

            $table->foreign('id_penggunaan')->references('id_penggunaan')->on('penggunaan')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
