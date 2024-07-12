@extends('director.layouts.main')

@section('container')

<div class="container">
    <h1>Silahkan Pilih departemen untuk dikirim</h1>
    <form action="{{ route('updateTeruskan', ['id' => $sekertaris->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="teruskan" class="form-label">Teruskan</label>
            <select id="teruskan" name="teruskan" class="form-select">
                <option value="Admin" {{ $sekertaris->teruskan == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Direktur Utama" {{ $sekertaris->teruskan == 'Direktur Utama' ? 'selected' : '' }}>Direktur Utama</option>
                <option value="Sekertaris" {{ $sekertaris->teruskan == 'Sekertaris' ? 'selected' : '' }}>Sekertaris</option>
                <option value="Komite & Tim" {{ $sekertaris->teruskan == 'Komite & Tim' ? 'selected' : '' }}>Komite & Tim</option>
                <option value="Direktur Medis" {{ $sekertaris->teruskan == 'Direktur Medis' ? 'selected' : '' }}>Direktur Medis</option>
                <option value="Direktur Umum" {{ $sekertaris->teruskan == 'Direktur Umum' ? 'selected' : '' }}>Direktur Umum</option>
                <option value="Manajer Pelayanan & Penunjang Medis" {{ $sekertaris->teruskan == 'Manajer Pelayanan & Penunjang Medis' ? 'selected' : '' }}>Manajer Pelayanan & Penunjang Medis</option>
                <option value="Manajer Keperawatan & Kebidanan" {{ $sekertaris->teruskan == 'Manajer Keperawatan & Kebidanan' ? 'selected' : '' }}>Manajer Keperawatan & Kebidanan</option>
                <option value="KSM Manajer" {{ $sekertaris->teruskan == 'KSM Manajer' ? 'selected' : '' }}>KSM Manajer</option>
                <option value="Tim Khusus Medis" {{ $sekertaris->teruskan == 'Tim Khusus Medis' ? 'selected' : '' }}>Tim Khusus Medis</option>
                <option value="Manajer SDI & Umum" {{ $sekertaris->teruskan == 'Manajer SDI & Umum' ? 'selected' : '' }}>Manajer SDI & Umum</option>
                <option value="Manajer ADM. & Keuangan" {{ $sekertaris->teruskan == 'Manajer ADM. & Keuangan' ? 'selected' : '' }}>Manajer ADM. & Keuangan</option>
                <option value="Tim Khusus IT" {{ $sekertaris->teruskan == 'Tim Khusus IT' ? 'selected' : '' }}>Tim Khusus IT</option>
                <option value="Kepala Instalasi Gawat Darurat" {{ $sekertaris->teruskan == 'Kepala Instalasi Gawat Darurat' ? 'selected' : '' }}>Kepala Instalasi Gawat Darurat</option>
                <option value="Kepala Instalasi Rawat Jalan" {{ $sekertaris->teruskan == 'Kepala Instalasi Rawat Jalan' ? 'selected' : '' }}>Kepala Instalasi Rawat Jalan</option>
                <option value="Kepala Instalasi Rawat Inap" {{ $sekertaris->teruskan == 'Kepala Instalasi Rawat Inap' ? 'selected' : '' }}>Kepala Instalasi Rawat Inap</option>
                <option value="Kepala Instalasi Anestesi & Perawatan Instensif" {{ $sekertaris->teruskan == 'Kepala Instalasi Anestesi & Perawatan Instensif' ? 'selected' : '' }}>Kepala Instalasi Anestesi & Perawatan Instensif</option>
                <option value="Kepala Instalasi Hemodialisis" {{ $sekertaris->teruskan == 'Kepala Instalasi Hemodialisis' ? 'selected' : '' }}>Kepala Instalasi Hemodialisis</option>
                <option value="Kepala Instalasi Bedah Sentral" {{ $sekertaris->teruskan == 'Kepala Instalasi Bedah Sentral' ? 'selected' : '' }}>Kepala Instalasi Bedah Sentral</option>
                <option value="Kepala Instalasi Kamar Bersalin & Perinatal" {{ $sekertaris->teruskan == 'Kepala Instalasi Kamar Bersalin & Perinatal' ? 'selected' : '' }}>Kepala Instalasi Kamar Bersalin & Perinatal</option>
                <option value="Kepala Instalasi Farmasi" {{ $sekertaris->teruskan == 'Kepala Instalasi Farmasi' ? 'selected' : '' }}>Kepala Instalasi Farmasi</option>
                <option value="Kepala Instalasi Rekam Medis" {{ $sekertaris->teruskan == 'Kepala Instalasi Rekam Medis' ? 'selected' : '' }}>Kepala Instalasi Rekam Medis</option>
                <option value="Kepala Instalasi Gizi" {{ $sekertaris->teruskan == 'Kepala Instalasi Gizi' ? 'selected' : '' }}>Kepala Instalasi Gizi</option>
                <option value="Kepala Instalasi Laboratprium" {{ $sekertaris->teruskan == 'Kepala Instalasi Laboratprium' ? 'selected' : '' }}>Kepala Instalasi Laboratprium</option>
                <option value="Kepala Instalasi Radiologi" {{ $sekertaris->teruskan == 'Kepala Instalasi Radiologi' ? 'selected' : '' }}>Kepala Instalasi Radiologi</option>
                <option value="Koordinator Kep. IGD" {{ $sekertaris->teruskan == 'Koordinator Kep. IGD' ? 'selected' : '' }}>Koordinator Kep. IGD</option>
                <option value="Koordinator Kep. Rawat Jalan" {{ $sekertaris->teruskan == 'Koordinator Kep. Rawat Jalan' ? 'selected' : '' }}>Koordinator Kep. Rawat Jalan</option>
                <option value="Koordinator Kep. Rawat Inap 3" {{ $sekertaris->teruskan == 'Koordinator Kep. Rawat Inap 3' ? 'selected' : '' }}>Koordinator Kep. Rawat Inap 3</option>
                <option value="Koordinator Kep. Rawat Inap 4" {{ $sekertaris->teruskan == 'Koordinator Kep. Rawat Inap 4' ? 'selected' : '' }}>Koordinator Kep. Rawat Inap 4</option>
                <option value="Koordinator Kep. Rawat Inap 5" {{ $sekertaris->teruskan == 'Koordinator Kep. Rawat Inap 5' ? 'selected' : '' }}>Koordinator Kep. Rawat Inap 5</option>
                <option value="Koordinator Kep. Anestesi & Perawatan Intensif" {{ $sekertaris->teruskan == 'Koordinator Kep. Anestesi & Perawatan Intensif' ? 'selected' : '' }}>Koordinator Kep. Anestesi & Perawatan Intensif</option>
                <option value="Koordinator Kep. Hemodialisis" {{ $sekertaris->teruskan == 'Koordinator Kep. Hemodialisis' ? 'selected' : '' }}>Koordinator Kep. Hemodialisis</option>
                <option value="Koordinator Kep. Bedah Sentral" {{ $sekertaris->teruskan == 'Koordinator Kep. Bedah Sentral' ? 'selected' : '' }}>Koordinator Kep. Bedah Sentral</option>
                <option value="Koordinator Kep. Kamar Bersalin & Perinatal" {{ $sekertaris->teruskan == 'Koordinator Kep. Kamar Bersalin & Perinatal' ? 'selected' : '' }}>Koordinator Kep. Kamar Bersalin & Perinatal</option>
                <option value="KSM Bedah" {{ $sekertaris->teruskan == 'KSM Bedah' ? 'selected' : '' }}>KSM Bedah</option>
                <option value="KSM Non Bedah" {{ $sekertaris->teruskan == 'KSM Non Bedah' ? 'selected' : '' }}>KSM Non Bedah</option>
                <option value="KSM Penunjang" {{ $sekertaris->teruskan == 'KSM Penunjang' ? 'selected' : '' }}>KSM Penunjang</option>
                <option value="KSM Gigi Dan Umum" {{ $sekertaris->teruskan == 'KSM Gigi Dan Umum' ? 'selected' : '' }}>KSM Gigi Dan Umum</option>
                <option value="KSM Anestesi" {{ $sekertaris->teruskan == 'KSM Anestesi' ? 'selected' : '' }}>KSM Anestesi</option>
                <option value="Manajer Pelayanan Pasien" {{ $sekertaris->teruskan == 'Manajer Pelayanan Pasien' ? 'selected' : '' }}>Manajer Pelayanan Pasien</option>
                <option value="Casemix" {{ $sekertaris->teruskan == 'Casemix' ? 'selected' : '' }}>Casemix</option>
                <option value="Kepala Bagian SDI" {{ $sekertaris->teruskan == 'Kepala Bagian SDI' ? 'selected' : '' }}>Kepala Bagian SDI</option>
                <option value="Kepala Bagian Humas & PKRS" {{ $sekertaris->teruskan == 'Kepala Bagian Humas & PKRS' ? 'selected' : '' }}>Kepala Bagian Humas & PKRS</option>
                <option value="Kepala Bagian IPSRS & Rumah Tangga" {{ $sekertaris->teruskan == 'Kepala Bagian IPSRS & Rumah Tangga' ? 'selected' : '' }}>Kepala Bagian IPSRS & Rumah Tangga</option>
                <option value="Kepala Bagian ADM & Keuangan" {{ $sekertaris->teruskan == 'Kepala Bagian ADM & Keuangan' ? 'selected' : '' }}>Kepala Bagian ADM & Keuangan</option>
                <option value="TIM IT" {{ $sekertaris->teruskan == 'TIM IT' ? 'selected' : '' }}>TIM IT</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

@endsection