@extends('director.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 mb-3 border-bottom">
    <h1 class="h2">Edit Surat Notadinas</h1>
</div>
<div class="mt-4">
    <form action="{{ route('director.update', ['id' => $notadinas->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        
        <div class="form-group">
            <label for="approval_direktur">Approval Direktur</label>
            <select class="form-select" id="approval_direktur" name="approval_direktur" value="{{ $notadinas->approval_direktur }}">
                <option value="Disetujui">Disetujui</option>
                <option value="Pending">Pending</option>
                <option value="Ditolak">Ditolak</option>
            </select>
        </div>

        
        <div class="form-group">
            <label for="pesan">Pilih File (PDF, DOC/DOCX)</label>
            <input type="file" class="form-control" id="pesan" name="pesan" accept=".pdf">
        </div>

        
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection