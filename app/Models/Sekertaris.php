<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekertaris extends Model
{
    protected $table = 'sekertaris';
    use HasFactory;

    protected $fillable = [
        'jenis_surat',
        'status_surat',
        'nomor_surat',
        'tanggal_surat',
        'tanggal_diterima',
        'perihal',
        'pengirim',
        'departemen',
        'dikirim ke',
        'teruskan',
        'file',
    ];
}
