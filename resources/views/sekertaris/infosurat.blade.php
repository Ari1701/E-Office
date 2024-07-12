
@extends('sekertaris.layouts.main')

@section('container')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white">Data Surat Keluar</h5>
                    <div class="input-group mt-3">
                        <input type="text" class="form-control" id="searchInput" placeholder="Cari Surat...">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Surat</th>
                                    <th>Status Surat</th>
                                    <th>Nomor Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal masuk</th>
                                    <th>Perihal</th>
                                    <th>Ditujukan ke</th>
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($sekertaris as $sekertaris)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sekertaris->jenis_surat }}</td>
                                    <td>{{ $sekertaris->status_surat }}</td>
                                    <td>{{ $sekertaris->nomor_surat }}</td>
                                    <td>{{ $sekertaris->tanggal_surat }}</td>
                                    <td>{{ $sekertaris->tanggal_diterima }}</td>
                                    <td>{{ $sekertaris->perihal }}</td>
                                    <td>{{ $sekertaris->departemen }}</td>
                                    <td>{{ $sekertaris->teruskan }}</td>
                                    <td>{{ $sekertaris->pengirim }}</td>
                                    <td>{{ $sekertaris->file }}</td>
                                    <td>
                                    <form action="{{ route('delete.destroy', $sekertaris->id) }}" method="POST" id="deleteForm{{ $sekertaris->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Anda yakin ingin menghapus surat ini?')">
                                        <i class="bi bi-trash"></i>Hapus</button>
                                        </form>
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