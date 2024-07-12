<?php

namespace App\Http\Controllers;

use App\Models\Sekertaris;
use Illuminate\Http\Request;
use App\Models\Surat; 
use App\Models\Notadinas; 

class KabagSDIController extends Controller
{
    public function tambahsurat()
    {
        $notadinas = Notadinas::all();
        return view('SDI.tambahsurat', compact('notadinas'));
    }

    public function show()
    {
        $notadinas = Notadinas::whereIn('pengirim', ['Kepala Bagian SDI'])->get();
        return view('SDI.infosuratnotadinas', compact('notadinas'));
    
    }

    public function showSDI()
    {
        $sekertaris = Sekertaris::whereIn('teruskan', ['Kepala Bagian SDI'])->get();
        return view('SDI.infosurat', compact('sekertaris'));
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
        
    
        return redirect()->route('SDI.tambahsurat')->with('success', 'Nota Dinas berhasil dibuat.');
    }

    public function viewdisposdi($id)
    {
        $direktur = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$direktur) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/disposisi/{$direktur->file}");
        return response()->file($filepath);
    }
    
    
        public function downloadhumas($id)
        {
            $direktur = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
            if (!$direktur) {
                return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
            }
        
            $filepath = storage_path("app/disposisi/{$direktur->file}");
            return response()->download($filepath);
        }
}
