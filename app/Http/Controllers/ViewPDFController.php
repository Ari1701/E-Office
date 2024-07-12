<?php

namespace App\Http\Controllers;

use App\Models\Sekertaris;
use Illuminate\Http\Request;
use App\Models\Surat; 
use App\Models\Notadinas;

class ViewPDFController extends Controller
{
public function ViewSekertarisPDF($id)
    {
        $sekertaris = Sekertaris::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$sekertaris) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/disposisi/{$sekertaris->file}");
        return response()->file($filepath);
    }

    public function ViewNotadinasPDF($id)
    {
        $notadinas = Notadinas::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$notadinas) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/notadinas/{$notadinas->pesan}");
        return response()->file($filepath);
    }

    public function ViewDisposisiPDF($id)
    {
        $disposisi = Sekertaris::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$disposisi) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/disposisi/{$disposisi->file}");
        return response()->file($filepath);
    }

}
