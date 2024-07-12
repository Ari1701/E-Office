<?php

namespace App\Http\Controllers;

use App\Models\Sekertaris;
use Illuminate\Http\Request;
use App\Models\Surat; 
use App\Models\Notadinas; 

class ITController extends Controller
{
    public function tambahsurat()
    {
        $notadinas = Notadinas::all();
        return view('it.tambahsurat', compact('notadinas'));
    }

    public function show()
    {
        $notadinas = Notadinas::whereIn('pengirim', ['TIM IT'])->get();
        return view('it.infosuratnotadinas', compact('notadinas'));
    
    }

    public function showIT()
    {
        $sekertaris = Sekertaris::whereIn('teruskan', ['TIM IT'])->get();
        return view('it.infosurat', compact('sekertaris'));
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
        
    
        return redirect()->route('it.tambahsurat')->with('success', 'Nota Dinas berhasil dibuat.');
    }

    public function viewdispo($id)
    {
        $direktur = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$direktur) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/disposisi/{$direktur->file}");
        return response()->file($filepath);
    }
    
    
        public function downloadit($id)
        {
            $direktur = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
            if (!$direktur) {
                return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
            }
        
            $filepath = storage_path("app/disposisi/{$direktur->file}");
            return response()->download($filepath);
        }
}
