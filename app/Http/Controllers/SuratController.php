<?php

namespace App\Http\Controllers;

use App\Models\Sekertaris;
use Illuminate\Http\Request;
use App\Models\Surat; 
use App\Models\Notadinas; 

class SuratController extends Controller
{


public function index()
{
    $direktur = Surat::all();
    return view('director.tambahsurat', compact('direktur'));
}

public function administrasi()
{
    $direktur = Surat::all();
    return view('manajer.adm&keu.infosurat', compact('direktur'));
}

public function create()
{
    return view('director.buat');
}

public function show()
    {
        $direktur = Surat::all();
        return view('director.infosurat', compact('direktur'));
    }

    public function showNotadinas()
    {
        $notadinas = Notadinas::all();
        return view('director.notadinas', compact('notadinas'));
    }

public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'jenis_surat' => 'required',
        'status_surat' => 'required',
        'tanggal_surat' => 'required|date',
        'tanggal_diterima' => 'required|date',
        'perihal' => 'required',
        'departemen' => 'required',
        'pengirim' => 'required',
        'file' => 'required|file|mimes:pdf|max:2048',
    ]);

    $file = $request->file('file');
    $fileName = $file->getClientOriginalName(); // Mendapatkan nama asli file
    $file->storeAs('disposisi', $fileName);

    // Simpan data ke database
    Surat::create([
        'jenis_surat' => $validatedData['jenis_surat'],
        'status_surat' => $validatedData['status_surat'],
        'tanggal_surat' => $validatedData['tanggal_surat'],
        'tanggal_diterima' => $validatedData['tanggal_diterima'],
        'perihal' => $validatedData['perihal'],
        'departemen' => $validatedData['departemen'],
        'pengirim' => $validatedData['pengirim'],
        'file' => $fileName,
    ]);

    return redirect()->route('director.tambahsurat')->with('success', 'Surat berhasil disimpan.');
}

public function showSurat(Request $request)
{
    $sekertaris = Sekertaris::query(); // Inisialisasi kueri

    if ($request->has('search')) {
        // Jika ada pencarian, tambahkan kondisi ke kueri
        $sekertaris->where('jenis_surat', 'like', '%' . $request->input('search') . '%')
        ->orWhere('perihal', 'like', '%' . $request->input('search') . '%')
        ->orWhere('departemen', 'like', '%' . $request->input('search') . '%')
        ->orWhere('pengirim', 'like', '%' . $request->input('search') . '%')
        ->orWhere('file', 'like', '%' . $request->input('search') . '%');
    }

    $filteredSurats = $sekertaris->paginate(10);

    // Ambil hasil kueri setelah dimodifikasi
    $filteredSurats = $sekertaris->get();

    return view('director.suratsekertaris', [
        'sekertaris' => $filteredSurats // Mengirim data hasil pencarian ke view
    ]);
}

public function PDF($id)
{
    $sekertaris = Sekertaris::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
    if (!$sekertaris) {
        return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
    }

    $filepath = storage_path("app/pdfs/{$sekertaris->file}");
    return response()->file($filepath);
}


    public function unduh($id)
    {
        $sekertaris = Sekertaris::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$sekertaris) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/directory/{$sekertaris->file}");
        return response()->download($filepath);
    }

    public function update(Request $request, $id)
    {
        $direktur = Surat::findOrFail($id);
        $direktur->update($request->all());
        return response()->json(['success' => 'Surat berhasil diupdate']);
    }
    
    public function destroy($id)
    {
        $direktur = Surat::findOrFail($id);
        $direktur->delete();
        return redirect()->route('director.info')->with('success', 'Surat berhasil dihapus');
    }

    public function hitung()
    {
        $jumlahSurat = Surat::count();
        $jumlahSuratSekertaris = Sekertaris::count();
        
        // Kirimkan data ke view director.director
        return view('director.director', [
            'jumlahSurat' => $jumlahSurat,
            'jumlahSuratSekertaris' => $jumlahSuratSekertaris,
        ]);
    }
    

}
