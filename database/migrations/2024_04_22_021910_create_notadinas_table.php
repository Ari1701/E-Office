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
        Schema::create('notadinas', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_surat');
            $table->string('perihal');
            $table->date('tanggal_surat');
            $table->string('departemen')->default('Direktur Umum');
            $table->string('pengirim');
            $table->string('approval_manajer')->default('Belum Disetujui');
            $table->string('approval_direktur')->default('Belum Disetujui');
            $table->string('pesan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notadinas');
    }
};
