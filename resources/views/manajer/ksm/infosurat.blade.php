@extends('manajer.ksm.layouts.main')

@section('container')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white">Semua Surat Disposisi</h5>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Surat</th>
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
                                @foreach($direktur as $surat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $surat->jenis_surat }}</td>
                                    <td>{{ $surat->nomor_surat }}</td>
                                    <td>{{ $surat->tanggal_surat }}</td>
                                    <td>{{ $surat->tanggal_diterima }}</td>
                                    <td>{{ $surat->perihal }}</td>
                                    <td>{{ $surat->departemen }}</td>
                                    <td>{{ $surat->pengirim }}</td>
                                    <td>{{ $surat->file }}</td>
                                    <td>
                                        <a href="{{ route('manajerview.pdf', ['id' => $direktur->id]) }}" target="_blank" class="btn btn-info">
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