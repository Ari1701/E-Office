
@extends('keperawatan.layouts.main')

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
            <option value="Koordinator Kep. IGD">Koordinator Kep. IGD</option>
            <option value="Koordinator Kep. Rawat Jalan">Koordinator Kep. Rawat Jalan</option>
            <option value="Koordinator Kep. Rawat Inap 3">Koordinator Kep. Rawat Inap 3</option>
            <option value="Koordinator Kep. Rawat Inap 4">Koordinator Kep. Rawat Inap 4</option>
            <option value="Koordinator Kep. Rawat Inap 5">Koordinator Kep. Rawat Inap 5</option>
            <option value="Koordinator Kep. Anestesi & Perawatan Intensif">Koordinator Kep. Anestesi & Perawatan Intensif</option>
            <option value="Koordinator Kep. Hemodialisis">Koordinator Kep. Hemodialisis</option>
            <option value="Koordinator Kep. Bedah Sentral">Koordinator Kep. Bedah Sentral</option>
            <option value="Koordinator Kep. Kamar Bersalin & Perinatal">Koordinator Kep. Kamar Bersalin & Perinatal</option>
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