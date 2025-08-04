<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nama');
            $table->enum('role', ['super admin', 'admin', 'pelanggan']); // Diubah di sini
            $table->string('no_meter')->nullable()->unique();
            $table->text('alamat')->nullable();
            $table->unsignedBigInteger('tarif_daya_id')->nullable();
            $table->timestamps();

            $table->foreign('tarif_daya_id')
                ->references('id_tarif')
                ->on('tarif_daya')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
