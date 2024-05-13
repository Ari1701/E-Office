<?php

namespace App\Http\Controllers;

use App\Models\Sekertaris;
use Illuminate\Http\Request;
use App\Models\Surat; 
use App\Models\Notadinas;

class ManajerController extends Controller
{
    public function showManajerIT()
    {
        $notadinas = Notadinas::whereIn('pengirim', ['TIM IT'])->get();
        return view('manajer.timkhususit.notadinas', compact('notadinas'));
    
    }

    public function editmanajerit($id)
    {
        $notadinas = Notadinas::findOrFail($id);
        return view('manajer.timkhususit.edit', compact('notadinas'));
    }
    
    public function updatemanajerit(Request $request, $id)
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
        return redirect()->route('manajer.timkhususit.notadinas')->with('success', 'Notadinas berhasil diperbarui');
    }

    public function showdispoManajerIT()
    {
        $direktur = Surat::whereIn('departemen', ['TIM IT'])->get();
        return view('manajer.timkhususit.infosurat', compact('direktur'));
    }

    public function NotaDinasPDF($id)
    {
        $direktur = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
        if (!$direktur) {
            return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
        }
    
        $filepath = storage_path("app/notadinas/{$direktur->file}");
        return response()->file($filepath);
    }
    
    
        public function NotaDinasDownload($id)
        {
            $direktur = Surat::find($id); // Menggunakan metode find() untuk mencari surat berdasarkan ID
            if (!$direktur) {
                return abort(404); // Mengembalikan 404 jika surat tidak ditemukan
            }
        
            $filepath = storage_path("app/notadinas/{$direktur->file}");
            return response()->download($filepath);
        }

        public function showManajerPelayanan()
    {
        $notadinas = Notadinas::whereIn('pengirim', ['Kepala Instalasi Gawat Darurat','Kepala Instalasi Rawat Jalan','Kepala Instalasi Rawat Inap','Kepala Instalasi Anestesi & Perawatan Instensif','Kepala Instalasi Hemodialisis','Kepala Instalasi Bedah Sentral','Kepala Instalasi Kamar Bersalin & Perinatal','Kepala Instalasi Farmasi','Kepala Instalasi Rekam Medis','Kepala Instalasi Gizi','Kepala Instalasi Laboratprium','Kepala Instalasi Radiologi'
        ])->get();
        return view('manajer.pelayanan.notadinas', compact('notadinas'));
    
    }

    public function editmanajerPelayanan($id)
    {
        $notadinas = Notadinas::findOrFail($id);
        return view('manajer.pelayanan.edit', compact('notadinas'));
    }
    
    public function updatemanajerPelayanan(Request $request, $id)
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
            $file->storeAs('pdfs', $filename);
            $notadinas->pesan = $filename;
        }
    
        $notadinas->save();
    
        // Kembalikan respons
        return redirect()->route('manajer.pelayanan.notadinas')->with('success', 'Notadinas berhasil diperbarui');
    }

    public function showdispoManajerPelayanan()
    {
        $direktur = Surat::whereIn('departemen', ['Kepala Instalasi Gawat Darurat','Kepala Instalasi Rawat Jalan','Kepala Instalasi Rawat Inap','Kepala Instalasi Anestesi & Perawatan Instensif','Kepala Instalasi Hemodialisis','Kepala Instalasi Bedah Sentral','Kepala Instalasi Kamar Bersalin & Perinatal','Kepala Instalasi Farmasi','Kepala Instalasi Rekam Medis','Kepala Instalasi Gizi','Kepala Instalasi Laboratprium','Kepala Instalasi Radiologi'
        ])->get();
        return view('manajer.pelayanan.infosurat', compact('direktur'));
    }

    public function showdispoManajerKeperawatan()
    {
        $direktur = Surat::whereIn('departemen', ['Koordinator Kep. IGD','Koordinator Kep. Rawat Jalan','Koordinator Kep. Rawat Inap 3','Koordinator Kep. Rawat Inap 4','Koordinator Kep. Rawat Inap 5','Koordinator Kep. Anestesi & Perawatan Intensif','Koordinator Kep. Hemodialisis','Koordinator Kep. Bedah Sentral','Koordinator Kep. Kamar Bersalin & Perinatal'
        ])->get();
        return view('manajer.keperawatan.infosurat', compact('direktur'));
    }

    public function showManajerKeperawatan()
    {
        $notadinas = Notadinas::whereIn('departemen', ['Koordinator Kep. IGD','Koordinator Kep. Rawat Jalan','Koordinator Kep. Rawat Inap 3','Koordinator Kep. Rawat Inap 4','Koordinator Kep. Rawat Inap 5','Koordinator Kep. Anestesi & Perawatan Intensif','Koordinator Kep. Hemodialisis','Koordinator Kep. Bedah Sentral','Koordinator Kep. Kamar Bersalin & Perinatal'
        ])->get();
        return view('manajer.keperawatan.notadinas', compact('notadinas'));
    }

    public function showdispoManajerksm()
    {
        $direktur = Surat::whereIn('departemen', ['KSM Bedah','KSM Non Bedah','KSM Penunjang','KSM Gigi dan Umum','KSM Anestesi'
        ])->get();
        return view('manajer.ksm.infosurat', compact('direktur'));
    }

    public function showManajerksm()
    {
        $notadinas = Notadinas::whereIn('departemen', ['KSM Bedah','KSM Non Bedah','KSM Penunjang','KSM Gigi dan Umum','KSM Anestesi'
        ])->get();
        return view('manajer.ksm.notadinas', compact('notadinas'));
    }

    public function showdispotimkhususmedis()
    {
        $direktur = Surat::whereIn('departemen', ['Manajer Pelayanan Pasien','Casemix'])->get();
        return view('manajer.timkhususmedis.infosurat', compact('direktur'));
    }

    public function showtimkhususmedis()
    {
        $notadinas = Notadinas::whereIn('departemen', ['Manajer Pelayanan Pasien','Casemix'])->get();
        return view('manajer.timkhususmedis.notadinas', compact('notadinas'));
    }

    public function showdispoManajersdi()
    {
        $direktur = Surat::whereIn('departemen', ['Kepala Bagian SDI','Kepala Bagian Humas & PKRS','Kepala Bagian IPSRS & Rumah Tangga'])->get();
        return view('manajer.sdi&umum.infosurat', compact('direktur'));
    }

    public function showManajersdi()
    {
        $notadinas = Notadinas::whereIn('departemen', ['Kepala Bagian SDI','Kepala Bagian Humas & PKRS','Kepala Bagian IPSRS & Rumah Tangga'])->get();
        return view('manajer.sdi&umum.notadinas', compact('notadinas'));
    }

    public function showdispoadm()
    {
        $direktur = Surat::whereIn('departemen', ['Kepala Bagian SDI','Kepala Bagian Humas & PKRS','Kepala Bagian IPSRS & Rumah Tangga'])->get();
        return view('manajer.adm&keu.infosurat', compact('direktur'));
    }

    public function showadm()
    {
        $notadinas = Notadinas::whereIn('departemen', ['Kepala Bagian Adm & Keu'])->get();
        return view('manajer.adm&keu.notadinas', compact('notadinas'));
    }
}
