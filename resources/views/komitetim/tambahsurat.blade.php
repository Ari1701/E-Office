
@extends('komitetim.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 mb-3 border-bottom">
    <h1 class="h2">Tambahkan Surat</h1>
</div>
<div class="mt-4">
<form action="{{ route('notadinas.store') }}" method="POST" enctype="multipart/form-data">
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
                <option value="Komite Al-Islam & Kemuhammadiyahan">Komite Al-Islam & Kemuhammadiyahan</option>
                <option value="Komite Medis">Komite Medis</option>
                <option value="Komite Keperawatan">Komite Keperawatan</option>
                <option value="Komite Tenaga Kesehatan Lain">Komite Tenaga Kesehatan Lain</option>
                <option value="Komite Mutu">Komite Mutu</option>
                <option value="Komite PPI">Komite PPI</option>
                <option value="Komite Farmasi & Terapi">Komite Farmasi & Terapi</option>
                <option value="Komite K3 Rumah Sakit">Komite K3 Rumah Sakit</option>
                <option value="Komite Rekam Medis">Komite Rekam Medis</option>
                <option value="Komite Etik & Hukum">Komite Etik & Hukum</option>
                <option value="Komite Koordinasi Pendidikan">Komite Koordinasi Pendidikan</option>
                <option value="Tim Ponek">Tim Ponek</option>
                <option value="Tim TB DOTS">Tim TB DOTS</option>
                <option value="Tim HIV">Tim HIV</option>
                <option value="Tim Stunting & Wasting">Tim Stunting & Wasting</option>
                <option value="Tim KB">Tim KB</option>
                <option value="Tim PPRA">Tim PPRA</option>
                <option value="Tim Terpadu Geriatri">Tim Terpadu Geriatri</option>
                <option value="Tim Kode Biru">Tim Kode Biru</option>
                <option value="Tim LOD">Tim LOD</option>
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