@extends('sekertaris.layouts.main')

@section('container')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white">Semua Surat Notadinas</h5>
                    <form action="{{ route('sekertaris.notadinas') }}" method="GET">
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
                                    <th>Perihal</th>
                                    <th>Tanggal Surat</th>
                                    <th>Penerima</th>
                                    <th>Status Aprroval Direktur</th>
                                    <th>Status Aprroval Manajer</th>
                                    <th>Pengirim</th>
                                    <th>File</th>
                                    <th>Lihat</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($notadinas as $notadinas)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $notadinas->jenis_surat }}</td>
                                    <td>{{ $notadinas->perihal }}</td>
                                    <td>{{ $notadinas->tanggal_surat }}</td>
                                    <td>{{ $notadinas->departemen }}</td>
                                    <td>{{ $notadinas->approval_direktur }}</td>                                    
                                    <td>{{ $notadinas->approval_manajer }}</td>                                    
                                    <td>{{ $notadinas->pengirim }}</td>
                                    <td>{{ $notadinas->pesan }}</td>
                                    <td>
                                        <a href="{{ route('viewnotadinaspdf', ['id' => $notadinas->id]) }}" target="_blank" class="btn btn-info">
                                            <i class="bi bi-eye"></i>Lihat PDF
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