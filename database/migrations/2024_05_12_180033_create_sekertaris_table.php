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
        Schema::create('sekertaris', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_surat');
            $table->string('status_surat');
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->date('tanggal_diterima');
            $table->string('perihal');
            $table->string('departemen');
            $table->string('pengirim');
            $table->string('dikirim ke')->default('Direktur Utama');
            $table->string('teruskan')->default('Direktur Utama');
            $table->string('file');
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekertaris');
    }
};
