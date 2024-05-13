<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat; 
use App\Models\Notadinas; 

class KeperawatanController extends Controller
{
    public function tambahsurat()
    {
        $notadinas = Notadinas::all();
        return view('keperawatan.tambahsurat', compact('notadinas'));
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
        
        $notadinas = Notadinas::whereIn('pengirim', ['Koordinator Kep. IGD','Koordinator Kep. Rawat Jalan','Koordinator Kep. Rawat Inap 3','Koordinator Kep. Rawat Inap 4','Koordinator Kep. Rawat Inap 5','Koordinator Kep. Anestesi & Perawatan Intensif','Koordinator Kep. Hemodialisis','Koordinator Kep. Bedah Sentral','Koordinator Kep. Kamar Bersalin & Perinatal'

        ])->get();
        return view('keperawatan.infosuratnotadinas', compact('notadinas'));
    
    }

    public function showkeperawatan(Request $request)
    {
        $direktur = Surat::query();

        if ($request->has('search')) {
            // Jika ada pencarian, tambahkan kondisi ke kueri
            $direktur->where(function ($query) use ($request) {
                $query->where('jenis_surat', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('perihal', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('departemen', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('pengirim', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('penerima', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('file', 'like', '%' . $request->input('search') . '%');
            });

        }

        $direktur = Surat::whereIn('departemen', ['Koordinator Kep. IGD','Koordinator Kep. Rawat Jalan','Koordinator Kep. Rawat Inap 3','Koordinator Kep. Rawat Inap 4','Koordinator Kep. Rawat Inap 5','Koordinator Kep. Anestesi & Perawatan Intensif','Koordinator Kep. Hemodialisis','Koordinator Kep. Bedah Sentral','Koordinator Kep. Kamar Bersalin & Perinatal'

        ])->get();
        return view('keperawatan.infosurat', compact('direktur'));
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
        
    
        return redirect()->route('keperawatan.tambahsurat')->with('success', 'Nota Dinas berhasil dibuat.');
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
