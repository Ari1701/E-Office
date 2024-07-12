<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat; 
use App\Models\Notadinas;
use App\Models\Sekertaris;

class KainsController extends Controller
{
    public function tambahsurat()
    {
        $notadinas = Notadinas::all();
        return view('kains.tambahsurat', compact('notadinas'));
    }

    public function show(Request $request)
    {
        $notadinas = Notadinas::query();

        if ($request->has('search')) {
            // Jika ada pencarian, tambahkan kondisi ke kueri
            $notadinas->where('jenis_surat', 'like', '%' . $request->input('search') . '%')
            ->orWhere('perihal', 'like', '%' . $request->input('search') . '%')
            ->orWhere('departemen', 'like', '%' . $request->input('search') . '%')
            ->orWhere('pengirim', 'like', '%' . $request->input('search') . '%')
            ->orWhere('penerima', 'like', '%' . $request->input('search') . '%')
            ->orWhere('file', 'like', '%' . $request->input('search') . '%');
        }
        
        $notadinas = Notadinas::whereIn('pengirim', ['Kepala Instalasi Gawat Darurat','Kepala Instalasi Rawat Jalan','Kepala Instalasi Rawat Inap','Kepala Instalasi Anestesi & Perawatan Instensif','Kepala Instalasi Hemodialisis','Kepala Instalasi Bedah Sentral','Kepala Instalasi Kamar Bersalin & Perinatal','Kepala Instalasi Farmasi','Kepala Instalasi Rekam Medis','Kepala Instalasi Gizi','Kepala Instalasi Laboratprium','Kepala Instalasi Radiologi'
        ])->get();
        return view('kains.infosuratnotadinas', compact('notadinas'));
    
    }

    public function showkains(Request $request)
    {
        $sekertaris = Sekertaris::query();

        if ($request->has('search')) {
            // Jika ada pencarian, tambahkan kondisi ke kueri
            $sekertaris->where(function ($query) use ($request) {
                $query->where('jenis_surat', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('perihal', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('departemen', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('pengirim', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('penerima', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('file', 'like', '%' . $request->input('search') . '%');
            });

        }

        $sekertaris = Sekertaris::whereIn('teruskan', ['Kepala Instalasi Gawat Darurat','Kepala Instalasi Rawat Jalan','Kepala Instalasi Rawat Inap','Kepala Instalasi Anestesi & Perawatan Instensif','Kepala Instalasi Hemodialisis','Kepala Instalasi Bedah Sentral','Kepala Instalasi Kamar Bersalin & Perinatal','Kepala Instalasi Farmasi','Kepala Instalasi Rekam Medis','Kepala Instalasi Gizi','Kepala Instalasi Laboratprium','Kepala Instalasi Radiologi'
        ])->get();
        return view('kains.infosurat', compact('sekertaris'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_surat' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required|date',
            'pengirim' => 'required',
            'pesan' => 'required|file|mimes:pdf|max:2048',
        ]);

        $file = $request->file('pesan');
        $filename = $file->getClientOriginalName();
        $file->storeAs('notadinas', $filename);
    
        Notadinas::create([
            'jenis_surat' => $validatedData['jenis_surat'],
            'perihal' => $validatedData['perihal'],
            'tanggal_surat' => $validatedData['tanggal_surat'],
            'pengirim' => $validatedData['pengirim'],
            'pesan' => $filename,
        ]);
        
    
        return redirect()->route('kains.tambahsurat')->with('success', 'Nota Dinas berhasil dibuat.');
    }

    public function viewpdf($id)
    {
        $direktur = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$direktur) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/disposisi/{$direktur->file}");
        return response()->file($filepath);
    }

    public function viewpdfnotadinas($id)
    {
        $notadinas = Notadinas::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$notadinas) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/notadinas/{$notadinas->pesan}");
        return response()->file($filepath);
    }
    
    
        public function download($id)
        {
            $direktur = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
            if (!$direktur) {
                return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
            }
        
            $filepath = storage_path("app/disposisi/{$direktur->file}");
            return response()->download($filepath);
        }
}
