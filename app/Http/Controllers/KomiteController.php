<?php

namespace App\Http\Controllers;
use App\Models\Surat;
use App\Models\Sekertaris;

use Illuminate\Http\Request;

class KomiteController extends Controller
{
    public function show()
    {
        $sekertaris = Sekertaris::whereIn('teruskan', ['Komite & Tim'])->get();
        return view('komitetim.infosurat', compact('sekertaris'));
    
    }

    public function showAdministrasi()
    {
        $direktur = Surat::whereIn('departemen', ['Manajer Adm & Keu'])->get();
        return view('manajer.adm&keu.infosurat', compact('direktur'));
    }

    public function showDirmed()
    {
        $direktur = Surat::whereIn('departemen', ['Direktur Medis'])->get();
        return view('dirmed.infosurat', compact('direktur'));
    }

    public function showDirum()
    {
        $direktur = Surat::whereIn('departemen', ['Direktur Umum', 'Manajer SDI & Umum', 'Manajer ADM. & Keuangan', 'Tim Khusus IT', 'TIM IT'])->get();
        return view('dirum.infosurat', compact('direktur'));
    }

    public function PDF($id)
{
    $surat = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
    if (!$surat) {
        return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
    }

    $filepath = storage_path("app/disposisi/{$surat->file}");
    return response()->file($filepath);
}

    public function download($id)
    {
        $surats = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$surats) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/pdfs/{$surats->file}");
        return response()->download($filepath);
    }

}
