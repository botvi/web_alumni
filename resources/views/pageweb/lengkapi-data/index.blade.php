@extends('temaplate-web.layout')

@section('content')

<!-- Services Section -->
<section id="services" class="services section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <span>Lengkapi Data</span>
        <h2>Lengkapi Data</h2>
    </div>
    @php
    $bulanList = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="mb-0">Data Alumni</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('lengkapi-data.simpan') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control bg-light" name="nama" value="{{ $user->nama }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NPM</label>
                                <input type="text" class="form-control bg-light" name="npm" value="{{ $user->npm }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fakultas</label>
                                <input type="text" class="form-control bg-light" name="fakultas_kode" value="{{ $user->fakultas->nama_fakultas }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Program Studi</label>
                                <input type="text" class="form-control bg-light" name="program_studi_kode" value="{{ $user->programStudi->nama_prodi }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lulus</label>
                                <input type="date" class="form-control bg-light" name="tanggal_lulus" value="{{ $user->tanggal_lulus }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Bulan Wisuda</label>
                                <input type="text" class="form-control bg-light" name="bulan_wisuda" value="{{ $bulanList[$user->bulan_wisuda] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Wisuda</label>  
                                <input type="text" class="form-control bg-light" name="tahun_wisuda" value="{{ $user->tahun_wisuda }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="{{ $user->tempat_lahir ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" value="{{ $user->tanggal_lahir ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Seri Ijazah</label>
                                <input type="text" class="form-control" name="nomor_seri_ijazah" value="{{ $user->nomor_seri_ijazah ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Seri Transkrip</label>
                                <input type="text" class="form-control" name="nomor_seri_transkrip" value="{{ $user->nomor_seri_transkrip ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">PISN</label>
                                <input type="text" class="form-control" name="pisn" value="{{ $user->pisn ?? '' }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Data Pekerjaan</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">NPM</label>
                                <input type="text" class="form-control bg-light" name="npm" value="{{ $user->npm }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control bg-light" name="nama" value="{{ $user->nama }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ isset($tracer) && $tracer->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ isset($tracer) && $tracer->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" name="nomor_telepon" value="{{ $tracer->nomor_telepon ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $tracer->email ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lulus</label>
                                <input type="date" class="form-control bg-light" name="tanggal_lulus" value="{{ $user->tanggal_lulus }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">IPK</label>
                                <input type="number" step="0.01" class="form-control" name="ipk" value="{{ $tracer->ipk ?? '' }}" required>
                            </div>  
                            <div class="mb-3">
                                <label class="form-label">Masa Studi</label>
                                <input type="number" class="form-control" name="masa_studi" value="{{ $tracer->masa_studi ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Program Studi</label>
                                <input type="hidden" name="program_studi_kode" value="{{ $user->programStudi->kode_prodi }}">
                                <input type="text" class="form-control bg-light" value="{{ $user->programStudi->nama_prodi }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Pekerjaan</label>
                                <input type="text" class="form-control" name="jenis_pekerjaan" value="{{ $tracer->jenis_pekerjaan ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tempat Bekerja</label>
                                <input type="text" class="form-control" name="tempat_bekerja" value="{{ $tracer->tempat_bekerja ?? '' }}" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
