@extends('director.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 mb-3 border-bottom">
    <h1 class="h2">Tambahkan Surat Disposisi</h1>
</div>
<div class="mt-4">
    <form method="POST" action="{{ route('surat.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="jenis_surat">Jenis Surat</label>
            <select class="form-select" id="jenis_surat" name="jenis_surat">
                <option value="">Pilih</option>
                <option value="Pribadi">Pribadi</option>
                <option value="Resmi">Resmi</option>
                <option value="Niaga">Niaga</option>
                <option value="Dinas">Dinas</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status_surat">Status Dokumen Surat</label>
            <select class="form-select" id="status_surat" name="status_surat">
                <option value="">Pilih</option>
                <option value="Rahasia">Rahasia</option>
                <option value="Penting">Penting</option>
                <option value="Biasa">Biasa</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_surat">Tanggal Surat</label>
            <input type="text" class="form-control" id="tanggal_surat" name="tanggal_surat" onclick="changeInputType(this)">
        </div>
        <div class="form-group">
            <label for="tanggal_diterima">Tanggal Diterima</label>
            <input type="text" class="form-control" id="tanggal_diterima" name="tanggal_diterima" onclick="changeInputType(this)">
        </div>
        <div class="form-group">
            <label for="perihal">Perihal</label>
            <input type="text" class="form-control" id="perihal" name="perihal">
        </div>
        <div class="form-group">
            <label for="departemen">Diteruskan kepada</label>
            <select class="form-select" id="departemen" name="departemen">
                <option value="">Pilih</option>
                <option value="Sekertaris">Sekertaris</option>
                <option value="Komite & Tim">Komite & Tim</option>
                <option value="Direktur Medis">Direktur Medis</option>
                <option value="Direktur Umum">Direktur Umum</option>
                <option value="Manajer Pelayanan & Penunjang Medis">Manajer Pelayanan & Penunjang Medis</option>
                <option value="Manajer Keperawatan & Kebidanan">Manajer Keperawatan & Kebidanan</option>
                <option value="KSM Manajer">KSM Manajer</option>
                <option value="Tim Khusus Medis">Tim Khusus Medis</option>
                <option value="Manajer SDI & Umum">Manajer SDI & Umum</option>
                <option value="Manajer ADM. & Keuangan">Manajer ADM. & Keuangan</option>
                <option value="Tim Khusus IT">Tim Khusus IT</option>
                <option value="Kepala Instalasi Gawat Darurat">Kepala Instalasi Gawat Darurat</option>
                <option value="Kepala Instalasi Rawat Jalan">Kepala Instalasi Rawat Jalan</option>
                <option value="Kepala Instalasi Rawat Inap">Kepala Instalasi Rawat Inap</option>
                <option value="Kepala Instalasi Anestesi & Perawatan Intensif">Kepala Instalasi Anestesi & Perawatan Intensif</option>
                <option value="Kepala Instalasi Hemodialisis">Kepala Instalasi Hemodialisis</option>
                <option value="Kepala Instalasi Bedah Sentral">Kepala Instalasi Bedah Sentral</option>
                <option value="Kepala Instalasi Kamar Bersalin & Perinatal">Kepala Instalasi Kamar Bersalin & Perinatal</option>
                <option value="Kepala Instalasi Farmasi">Kepala Instalasi Farmasi</option>
                <option value="Kepala Instalasi Rekam Medis">Kepala Instalasi Rekam Medis</option>
                <option value="Kepala Instalasi Gizi">Kepala Instalasi Gizi</option>
                <option value="Kepala Instalasi Laboratorium">Kepala Instalasi Laboratorium</option>
                <option value="Kepala Instalasi Radiologi">Kepala Instalasi Radiologi</option>
                <option value="Koordinator Kep. IGD">Koordinator Kep. IGD</option>
                <option value="Koordinator Kep. Rawat Jalan">Koordinator Kep. Rawat Jalan</option>
                <option value="Koordinator Kep. Rawat Inap 3">Koordinator Kep. Rawat Inap 3</option>
                <option value="Koordinator Kep. Rawat Inap 4">Koordinator Kep. Rawat Inap 4</option>
                <option value="Koordinator Kep. Rawat Inap 5">Koordinator Kep. Rawat Inap 5</option>
                <option value="Koordinator Kep. Anestesi & Perawatan Intensif">Koordinator Kep. Anestesi & Perawatan Intensif</option>
                <option value="Koordinator Kep. Hemodialisis">Koordinator Kep. Hemodialisis</option>
                <option value="Koordinator Kep. Bedah Sentral">Koordinator Kep. Bedah Sentral</option>
                <option value="Koordinator Kep. Kamar Bersalin & Perinatal">Koordinator Kep. Kamar Bersalin & Perinatal</option>
                <option value="KSM Bedah">KSM Bedah</option>
                <option value="KSM Non Bedah">KSM Non Bedah</option>
                <option value="KSM Penunjang">KSM Penunjang</option>
                <option value="KSM Gigi Dan Umum">KSM Gigi Dan Umum</option>
                <option value="KSM Anestesi">KSM Anestesi</option>
                <option value="Manajer Pelayanan Pasien">Manajer Pelayanan Pasien</option>
                <option value="Casemix">Casemix</option>
                <option value="Kepala Bagian SDI">Kepala Bagian SDI</option>
                <option value="Kepala Bagian Humas & PKRS">Kepala Bagian Humas & PKRS</option>
                <option value="Kepala Bagian IPSRS & Rumah Tangga">Kepala Bagian IPSRS & Rumah Tangga</option>
                <option value="Kepala Bagian ADM & Keuangan">Kepala Bagian ADM & Keuangan</option>
                <option value="TIM IT">TIM IT</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pengirim">Pengirim</label>
            <input type="text" class="form-control" id="pengirim" name="pengirim">
        </div>
        <div class="form-group">
            <label for="file">Scan Surat Disposisi (PDF Only)</label>
            <input type="file" class="form-control" id="file" name="file" accept="application/pdf">
        </div>
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
</div>
@endsection
