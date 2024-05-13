@extends('sekertaris.layouts.main')

@section('container')
<div class="dashboard">
        <h1>Dashboard</h1>
        <p>Administrator Panel</p>
        <p>Selamat Datang!<br>Di Website Aplikasi Surat </p>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Surat Masuk</h5>
                    <p class="card-text">Jumlah Pesan: {{ $jumlahSurat }}</p>
                    <a href="{{ route('sekertaris.semuasurat') }}" class="card-link text-white mt-1">Lihat Selengkapnya -></a>
                </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">Surat Keluar</h5>
                        <p class="card-text">Jumlah Pesan : {{ $jumlahSuratSekertaris }} </p>
                        <a href="{{ route('sekertaris.show') }}" class="card-link text-white mt-1">Lihat Selengkapnya -></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection