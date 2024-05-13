<?php

namespace App\Http\Controllers;

use App\Models\Sekertaris;
use Illuminate\Http\Request;
use App\Models\Surat; 
use App\Models\Notadinas; 

class DownloadController extends Controller
{
    public function DownloadSekertarisPDF($id)
    {
        $sekertaris = Sekertaris::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$sekertaris) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/sekertaris/{$sekertaris->file}");
        return response()->download($filepath);
    }

    public function DownloadNotadinasPDF($id)
    {
        $notadinas = Notadinas::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$notadinas) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/notadinas/{$notadinas->pesan}");
        return response()->download($filepath);
    }

    public function DownloadDisposisiPDF($id)
    {
        $disposisi = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$disposisi) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/disposisi/{$disposisi->file}");
        return response()->download($filepath);
    }
}
