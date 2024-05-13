
@extends('kains.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 mb-3 border-bottom">
    <h1 class="h2">Tambahkan Surat</h1>
</div>
<div class="mt-4">
<form action="{{ route('kains.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="jenis_surat">Jenis Surat:</label>
        <input type="text" class="form-control" id="jenis_surat" name="jenis_surat" required>
    </div>
    <div class="form-group">
        <label for="perihal">Perihal:</label>
        <input type="text" class="form-control" id="perihal" name="perihal" required>
    </div>
    <div class="form-group">
        <label for="tanggal_surat">Tanggal Surat:</label>
        <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
    </div>
    <div class="form-group">
        <label for="pengirim">Pengirim:</label>
            <select class="form-select select2" id="pengirim" name="pengirim">
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
            </select>
    </div>
    <div class="form-group">
        <label for="pesan">Pilih File (PDF, DOC/DOCX)</label>
        <input type="file" class="form-control" id="pesan" name="pesan" accept=".pdf" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection