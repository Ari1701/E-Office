<?php

namespace App\Http\Controllers;

use App\Models\Sekertaris;
use Illuminate\Http\Request;
use App\Models\Surat; 
use App\Models\Notadinas; 

class DirmedController extends Controller
{
    public function showDirmed()
    {
        $direktur = Surat::whereIn('departemen', ['Direktur Medis','Kepala Instalasi Gawat Darurat','Kepala Instalasi Rawat Jalan','Kepala Instalasi Rawat Inap','Kepala Instalasi Anestesi & Perawatan Instensif','Kepala Instalasi Hemodialisis','Kepala Instalasi Bedah Sentral','Kepala Instalasi Kamar Bersalin & Perinatal','Kepala Instalasi Farmasi','Kepala Instalasi Rekam Medis','Kepala Instalasi Gizi','Kepala Instalasi Laboratprium','Kepala Instalasi Radiologi','Koordinator Kep. IGD','Koordinator Kep. Rawat Jalan','Koordinator Kep. Rawat Inap 3','Koordinator Kep. Rawat Inap 4','Koordinator Kep. Rawat Inap 5','Koordinator Kep. Anestesi & Perawatan Intensif','Koordinator Kep. Hemodialisis','Koordinator Kep. Bedah Sentral','Koordinator Kep. Kamar Bersalin & Perinatal'])->get();
        return view('dirmed.infosurat', compact('direktur'));
    }

    public function showNotadinasDirmed()
    {
        $notadinas = Notadinas::whereIn('pengirim', ['Kepala Instalasi Gawat Darurat','Kepala Instalasi Rawat Jalan','Kepala Instalasi Rawat Inap','Kepala Instalasi Anestesi & Perawatan Instensif','Kepala Instalasi Hemodialisis','Kepala Instalasi Bedah Sentral','Kepala Instalasi Kamar Bersalin & Perinatal','Kepala Instalasi Farmasi','Kepala Instalasi Rekam Medis','Kepala Instalasi Gizi','Kepala Instalasi Laboratprium','Kepala Instalasi Radiologi','Koordinator Kep. IGD','Koordinator Kep. Rawat Jalan','Koordinator Kep. Rawat Inap 3','Koordinator Kep. Rawat Inap 4','Koordinator Kep. Rawat Inap 5','Koordinator Kep. Anestesi & Perawatan Intensif','Koordinator Kep. Hemodialisis','Koordinator Kep. Bedah Sentral','Koordinator Kep. Kamar Bersalin & Perinatal'])->get();
        return view('dirmed.infosuratnotadinasdirmed', compact('notadinas'));
    }
}
