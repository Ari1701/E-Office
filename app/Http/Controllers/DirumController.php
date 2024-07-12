<?php

namespace App\Http\Controllers;

use App\Models\Sekertaris;
use Illuminate\Http\Request;
use App\Models\Surat; 
use App\Models\Notadinas; 

class DirumController extends Controller
{
    public function showNotaDinas()
    {
        $notadinas = Notadinas::whereIn('pengirim', ['Direktur Umum','Kepala Bagian SDI','Kepala Bagian Humas & PKRS','Kepala Bagian IPSRS & Rumah Tangga','Kepala Bagian ADM & Keu','TIM IT'])->get();
        return view('dirum.notadinas', compact('notadinas'));
    
    }

    public function showDirum()
    {
        $sekertaris = Sekertaris::whereIn('teruskan', ['Direktur Umum','Kepala Bagian SDI','Kepala Bagian Humas & PKRS','Kepala Bagian IPSRS & Rumah Tangga','Kepala Bagian ADM & Keu','TIM IT'
        ])->get();
        return view('dirum.infosurat', compact('sekertaris'));
    
    }

}
