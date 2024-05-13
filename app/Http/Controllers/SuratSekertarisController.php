<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekertaris; 
use App\Models\Surat; 
use App\Models\Notadinas; 
use App\Models\Program;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class SuratSekertarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekertaris = Sekertaris::all(); 
        return view('sekertaris.tambahsurat', compact('sekertaris'));
    }

    public function create()
    {
        return view('sekertaris.tambahsurat');
    }

    public function show()
    {
        $sekertaris = Sekertaris::all();
        return view('sekertaris.infosurat', compact('sekertaris'));
    }

    public function showNDinas()
    {
        $notadinas = Notadinas::all();
        return view('sekertaris.notadinas', compact('notadinas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_surat' => 'required',
            'status_surat' => 'required',
            'nomor_surat' => 'required|unique:sekertaris', // Menyesuaikan dengan tabel letters
            'tanggal_surat' => 'required|date',
            'tanggal_diterima' => 'required|date',
            'perihal' => 'required',
            'pengirim' => 'required',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('sekertaris', $filename);

        Sekertaris::create([
            'jenis_surat' => $validatedData['jenis_surat'],
            'status_surat' => $validatedData['status_surat'],
            'nomor_surat' => $validatedData['nomor_surat'],
            'tanggal_surat' => $validatedData['tanggal_surat'],
            'tanggal_diterima' => $validatedData['tanggal_diterima'],
            'perihal' => $validatedData['perihal'],
            'pengirim' => $validatedData['pengirim'],
            'file' => $filename,
        ]);

        return redirect()->route('sekertaris.tambahsurat')->with('success', 'Letter created successfully.');
    }

    public function showSekertarisSemuaSurat(Request $request)
{
    $direktur = Surat::query(); // Inisialisasi kueri

    if ($request->has('search')) {
        // Jika ada pencarian, tambahkan kondisi ke kueri
        $direktur->where('jenis_surat', 'like', '%' . $request->input('search') . '%')
        ->orWhere('perihal', 'like', '%' . $request->input('search') . '%')
        ->orWhere('departemen', 'like', '%' . $request->input('search') . '%')
        ->orWhere('pengirim', 'like', '%' . $request->input('search') . '%')
        ->orWhere('file', 'like', '%' . $request->input('search') . '%');
    }

    $filteredSurats = $direktur->paginate(10);

    // Ambil hasil kueri setelah dimodifikasi
    $filteredSurats = $direktur->get();

    return view('sekertaris.semuasurat', [
        'direktur' => $filteredSurats // Mengirim data hasil pencarian ke view
    ]);
}

    public function edit($id)
    {
        $sekertaris = Surat::findOrFail($id);
        return response()->json($sekertaris);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'jenis_surat' => 'required',
            'nomor_surat' => 'required|unique:Sekertaris', // Menyesuaikan dengan tabel letters
            'tanggal_surat' => 'required|date',
            'tanggal_diterima' => 'required|date',
            'perihal' => 'required',
            'departemen' => 'required',
            'pengirim' => 'required',
            // ...validasi untuk kolom lainnya...
        ]);

        // Temukan dan perbarui data surat
        $sekertaris = Surat::findOrFail($id);
        $sekertaris->update($validatedData);

        // Kembalikan respons
        return response()->json(['success' => 'Data surat berhasil diperbarui']);
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
                           

    public function DisposisiPDF($id)
{
    $direktur = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
    if (!$direktur) {
        return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
    }

    $filepath = storage_path("app/disposisi/{$direktur->file}");
    return response()->file($filepath);
}

    public function NotaDinasPDF($id)
{
    $notadinas = Notadinas::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
    if (!$notadinas) {
        return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
    }

    $filepath = storage_path("app/notadinas/{$notadinas->pesan}");
    return response()->file($filepath);
}


    public function DownloadDisposisi($id)
    {
        $direktur = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$direktur) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/disposisi/{$direktur->file}");
        return response()->download($filepath);
    }
    
    public function DownloadNotadinas($id)
    {
        $direktur = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$direktur) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/notadinas/{$direktur->file}");
        return response()->download($filepath);
    }
    
    public function getJumlahPesan()
{
    $jumlahPesan = Sekertaris::table('sekertaris')->count();
    return $jumlahPesan;
}

public function hitung()
    {
        $jumlahSurat = Surat::count();
        $jumlahSuratSekertaris = Sekertaris::count();
        
        // Kirimkan data ke view director.director
        return view('sekertaris.sekertaris', [
            'jumlahSurat' => $jumlahSurat,
            'jumlahSuratSekertaris' => $jumlahSuratSekertaris,
        ]);
    }


    
    // Add other CRUD methods such as edit, update, destroy as needed
}
