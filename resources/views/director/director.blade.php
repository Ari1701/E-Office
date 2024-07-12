@extends('director.layouts.main')

@section('container')
<div class="dashboard">
        <h1>Dashboard</h1>
        <p>Director Panel</p>
        <p>Selamat Datang!<br>Di Website Aplikasi E-Office </p>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Surat Keluar</h5>
                    <p class="card-text">Cek {{ $jumlahSurat }} surat</p>
                    <a href="{{ route('director.info') }}" class="card-link text-white mt-1">Lihat Surat -></a>
                </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">Surat Masuk</h5>
                        <p class="card-text">Cek {{ $jumlahSuratSekertaris }} surat</p>
                        <a href="{{ route('director.suratsekertaris') }}" class="card-link text-white mt-1">Lihat Surat -></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">

    <div class="col-md-6">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-envelope-arrow-up"></i> Surat Keluar</h5>
                <a href="/info" class="card-link text-white mt-1">Lihat Detail -></a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card bg-danger text-white h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-envelope-arrow-down"></i> Surat Masuk</h5>
                <a href="/suratmasuk" class="card-link text-white mt-1">Lihat Detail -></a>
            </div>
        </div>
    </div>
</div>


@endsection