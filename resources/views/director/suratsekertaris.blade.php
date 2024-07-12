@extends('director.layouts.main')

@section('container')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white">Data Surat</h5>
                    <form action="{{ route('director.suratsekertaris') }}" method="GET">
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
                                    <th>Nomor Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal masuk</th>
                                    <th>Perihal</th>
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                    <th>File</th>
                                    <th>Kirim Ke</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($sekertaris as $sekertaris)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sekertaris->jenis_surat }}</td>
                                    <td>{{ $sekertaris->nomor_surat }}</td>
                                    <td>{{ $sekertaris->tanggal_surat }}</td>
                                    <td>{{ $sekertaris->tanggal_diterima }}</td>
                                    <td>{{ $sekertaris->perihal }}</td>
                                    <td>{{ $sekertaris->departemen }}</td>
                                    <td>{{ $sekertaris->pengirim }}</td>
                                    <td>{{ $sekertaris->file }}</td>
                                    <td>
                                        {{ $sekertaris->teruskan }}
                                        <a href="{{ route('editTeruskan', ['id' => $sekertaris->id]) }}" class="btn btn-primary">Edit</a>
                                    </td>                            
                                    <td>
                                        <a href="{{ route('viewsekertarispdf', ['id' => $sekertaris->id]) }}" target="_blank" class="btn btn-info">
                                            <i class="bi bi-eye"></i>Detail
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