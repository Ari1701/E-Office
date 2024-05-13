<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notadinas extends Model
{
    protected $table = 'notadinas';
    use HasFactory;

    protected $fillable = [
        'jenis_surat',
        'perihal',
        'tanggal_surat',
        'departemen',
        'pengirim',
        'approval_manajer',
        'approval_direktur',
        'pesan',
    ];
}
