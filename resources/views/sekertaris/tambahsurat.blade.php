
@extends('sekertaris.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 mb-3 border-bottom">
    <h1 class="h2">Tambahkan Surat</h1>
</div>
<div class="mt-4">
<form method="POST" action="{{ route('sekertaris.store') }}" enctype="multipart/form-data">
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
        <label for="nomor_surat">Nomor Surat</label>
        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required>
    </div>

    <div class="form-group">
        <label for="tanggal_surat">Tanggal Surat</label>
        <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
    </div>

    <div class="form-group">
        <label for="tanggal_diterima">Tanggal Diterima</label>
        <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima" required>
    </div>

    <div class="form-group">
        <label for="perihal">Perihal</label>
        <input type="text" class="form-control" id="perihal" name="perihal" required>
    </div>

    <div class="form-group">
        <label for="pengirim">Pengirim</label>
        <input type="text" class="form-control" id="pengirim" name="pengirim" required>
    </div>

    <div class="form-group">
        <label for="file">Pilih File (PDF Only)</label>
        <input type="file" class="form-control" id="file" name="file" accept="application/pdf" required>
    </div>

    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
</div>
@endsection