
@extends('admin.layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                        
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                <div class="col-md-6">
                                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="director">Direktur Utama</option>
                                        <option value="secretary">Sekertaris</option>
                                        <option value="komitetim">Komite & Tim</option>
                                        <option value="medis">Direktur Medis</option>
                                        <option value="umum">Direktur Umum</option>
                                        <option value="mppm">Manajer Pelayanan & Penunjang Medis</option>
                                        <option value="mkk" >Manajer Keperawatan & Kebidanan</option>
                                        <option value="ksmmanajer" >KSM Manajer</option>
                                        <option value="tkmmanajer" >Tim Khusus Medis</option>
                                        <option value="msu" >Manajer SDI & Umum</option>
                                        <option value="mak" >Manajer ADM. & Keuangan</option>
                                        <option value="tkit" >Tim Khusus IT</option>
                                        <option value="kains">Kepala Instalasi Gawat Darurat</option>
                                        <option value="kains">Kepala Instalasi Rawat Jalan</option>
                                        <option value="kains">Kepala Instalasi Rawat Inap</option>
                                        <option value="kains">Kepala Instalasi Anestesi & Perawatan Instensif</option>
                                        <option value="kains">Kepala Instalasi Hemodialisis</option>
                                        <option value="kains">Kepala Instalasi Bedah Sentral</option>
                                        <option value="kains">Kepala Instalasi Kamar Bersalin & Perinatal</option>
                                        <option value="kains">Kepala Instalasi Farmasi</option>
                                        <option value="kains">Kepala Instalasi Rekam Medis</option>
                                        <option value="kains">Kepala Instalasi Gizi</option>
                                        <option value="kains">Kepala Instalasi Laboratprium</option>
                                        <option value="kains">Kepala Instalasi Radiologi</option>
                                        <option value="kep">Koordinator Kep. IGD</option>
                                        <option value="kep">Koordinator Kep. Rawat Jalan</option>
                                        <option value="kep">Koordinator Kep. Rawat Inap 3</option>
                                        <option value="kep">Koordinator Kep. Rawat Inap 4</option>
                                        <option value="kep">Koordinator Kep. Rawat Inap 5</option>
                                        <option value="kep">Koordinator Kep. Anestesi & Perawatan Intensif</option>
                                        <option value="kep">Koordinator Kep. Hemodialisis</option>
                                        <option value="kep">Koordinator Kep. Bedah Snetral</option>
                                        <option value="kep">Koordinator Kep. Kamar Bersalin & Perinatal</option>
                                        <option value="ksm" >KSM Bedah</option>
                                        <option value="ksm" >KSM Non Bedah</option>
                                        <option value="ksm" >KSM Penunjang</option>
                                        <option value="ksm" >KSM Gigi Dan Umum</option>
                                        <option value="ksm" >KSM Anestesi</option>
                                        <option value="tkm" >Manajer Pelayanan Pasien</option>
                                        <option value="tkm" >Casemix</option>
                                        <option value="kabagsdi" >Kepala Bagian SDI</option>
                                        <option value="kabaghumas" >Kepala Bagian Humas & PKRS</option>
                                        <option value="kabagipsrs" >Kepala Bagian IPSRS & Rumah Tangga</option>
                                        <option value="kabagadm" >Kepala Bagian ADM & Keuangan</option>
                                        <option value="tku" >TIM IT</option>
                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0 pt-5">
                                <div class="col-md-6 offset-md-4 text-center">
                                    @if(session('success'))
                                    <div class="alert alert-success" style="margin-bottom: 15px;">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    <button type="submit" class="btn btn-primary" style="margin-top: 15px;">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                            <a href="{{ route('admin.edituser', $user->id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('admin.destroyuser', $user->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
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

@endsection