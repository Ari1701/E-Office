@extends('sekertaris.layouts.main')

@section('container')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white">Data Semua Surat Disposisi</h5>
                    <form action="{{ route('sekertaris.semuasurat') }}" method="GET">
                        <div class="input-group mt-3">
                            <input type="text" class="form-control" name="search" placeholder="Cari Surat..." value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-light" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                    
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
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                    <th>File</th>
                                    <th>Lihat</th>
                                    <th>Download File</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($direktur as $direktur)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $direktur->jenis_surat }}</td>
                                    <td>{{ $direktur->status_surat }}</td>
                                    <td>{{ $direktur->nomor_surat }}</td>
                                    <td>{{ $direktur->tanggal_surat }}</td>
                                    <td>{{ $direktur->tanggal_diterima }}</td>
                                    <td>{{ $direktur->perihal }}</td>
                                    <td>{{ $direktur->departemen }}</td>
                                    <td>{{ $direktur->pengirim }}</td>
                                    <td>{{ $direktur->file }}</td>
                                    <td>
                                        <a href="{{ route('viewdisposisipdf', ['id' => $direktur->id]) }}" target="_blank" class="btn btn-info">
                                            <i class="bi bi-eye"></i>Lihat PDF
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/download/' . $direktur->id) }}" class="btn btn-success">
                                            <i class="bi bi-download"></i> Unduh PDF
                                        </a>
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
