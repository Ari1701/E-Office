<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notadinas;

class NotadinasController extends Controller
{
    public function index()
    {
        $notadinas = Notadinas::all();
        return view('komitetim.infosuratnotadinas', compact('notadinas'));
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
        
    
        return redirect()->route('komite.tambahsurat')->with('success', 'Nota Dinas berhasil dibuat.');
    }

    public function tambahsurat()
    {
        $notadinas = Notadinas::all();
        return view('komitetim.tambahsurat', compact('notadinas'));
    }

    public function show()
    {
        $notadinas = Notadinas::whereIn('pengirim', ['Komite Al-Islam & Kemuhammadiyahan', 'Komite Medis', 'Komite Keperawatan', 'Komite Tenaga Kesehatan Lain', 'Komite Mutu', 'Komite PPI', 'Komite Farmasi & Terapi', 'Komite K3 Rumah Sakit', 'Komite Rekam Medis', 'Komite Etik & Hukum', 'Komite Koordinasi Pendidikan', 'Tim Ponek', 'Tim TB DOTS', 'Tim HIV', 'Tim Stunting & Wasting', 'Tim KB', 'Tim PPRA', 'Tim Terpadu Geriatri', 'Tim Kode Biru', 'Tim LOD'])->get();
        return view('komitetim.infosuratnotadinas', compact('notadinas'));

    }

    public function showNota()
    {
        $notadinas = Notadinas::whereIn('departemen', ['Direktur Medis'])->get();
        return view('dirmed.infosuratnotadinasdirmed', compact('notadinas'));
    }

    public function showNotaadministrasi()
    {
        $notadinas = Notadinas::whereIn('departemen', ['Kepala Bagian Adm & Keuangan'])->get();
        return view('manajer.adm&keu.infosuratnotadinasadministrasi', compact('notadinas'));
    }

    public function showNotaDinas()
    {
        $notadinas = Notadinas::whereIn('departemen', ['Direktur Umum'])->get();
        return view('dirum.notadinas', compact('notadinas'));
    
    }

    public function viewPDFnotadinas($id)
    {
        $notadinas = Notadinas::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$notadinas) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/notadinas/{$notadinas->pesan}");
        return response()->file($filepath);
    }

    public function edit($id)
    {
        $notadinas = Notadinas::findOrFail($id);
        return view('director.edit', compact('notadinas'));
    }
    
    public function update(Request $request, $id)
    {
        // Validasi data
        $notadinas = Notadinas::findOrFail($id);
        $notadinas->update($request->all());
    
        // Temukan data notadinas
        $notadinas = Notadinas::findOrFail($id);
    
        // Update file pesan jika diunggah
        if ($request->hasFile('pesan')) {
            $file = $request->file('pesan');
            $filename = $file->getClientOriginalName();
            $file->storeAs('notadinas', $filename);
            $notadinas->pesan = $filename;
        }
    
        $notadinas->save();
    
        // Kembalikan respons
        return redirect()->route('director.notadinas')->with('success', 'Notadinas berhasil diperbarui');
}

    

    // Redirect kembali dengan pesan sukses
    
}
