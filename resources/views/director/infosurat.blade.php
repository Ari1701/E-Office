
@extends('director.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 mb-3 border-bottom">
    <h1 class="h2">Info Surat Keluar</h1>
</div>
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white">Data Surat</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Surat</th>
                                    <th>Status Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal masuk</th>
                                    <th>Perihal</th>
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($direktur as $direktur)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $direktur->jenis_surat }}</td>
                                    <td>{{ $direktur->status_surat }}</td>
                                    <td>{{ $direktur->tanggal_surat }}</td>
                                    <td>{{ $direktur->tanggal_diterima }}</td>
                                    <td>{{ $direktur->perihal }}</td>
                                    <td>{{ $direktur->departemen }}</td>
                                    <td>{{ $direktur->pengirim }}</td>
                                    <td>{{ $direktur->file }}</td>
                                    <td>
                                        <div class="btn-group me-2">
                                        <form action="{{ route('info.destroy', $direktur->id) }}" method="POST" id="deleteForm{{ $direktur->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Anda yakin ingin menghapus surat ini?')">
                                        <i class="bi bi-trash"></i>Hapus</button>
                                        </form>

                                        </div>
                                    
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection