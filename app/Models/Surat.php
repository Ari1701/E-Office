<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'direktur';
    use HasFactory;

    protected $fillable = [
        'jenis_surat',
        'status_surat',
        'tanggal_surat',
        'tanggal_diterima',
        'perihal',
        'departemen',
        'pengirim',
        'file',

    ];
}
