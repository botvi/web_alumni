@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Forms</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Alumni</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Alumni</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--breadcrumb-->
        <div class="row">
            <div class="col-xl-7 mx-auto">
                <hr/>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bx-edit me-1 font-22 text-primary"></i></div>
                            <h5 class="mb-0 text-primary">Edit Data Alumni</h5>
                        </div>
                        <hr>
                        <form action="{{ route('data_alumni.update', $alumni->id) }}" method="POST" class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $alumni->nama) }}" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('nama') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="npm" class="form-label">NPM</label>
                                <input type="number" class="form-control" id="npm" name="npm" value="{{ old('npm', $alumni->npm) }}" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('npm') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="tanggal_lulus" class="form-label">Tanggal Lulus</label>
                                <input type="date" class="form-control" id="tanggal_lulus" name="tanggal_lulus" value="{{ old('tanggal_lulus', $alumni->tanggal_lulus) }}" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('tanggal_lulus') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="bulan_wisuda" class="form-label">Bulan Wisuda</label>
                                <select class="form-select" id="bulan_wisuda" name="bulan_wisuda" required>
                                    <option value="">Pilih Bulan</option>
                                    <option value="1" {{ old('bulan_wisuda', $alumni->bulan_wisuda) == 1 ? 'selected' : '' }}>Januari</option>
                                    <option value="2" {{ old('bulan_wisuda', $alumni->bulan_wisuda) == 2 ? 'selected' : '' }}>Februari</option>
                                    <option value="3" {{ old('bulan_wisuda', $alumni->bulan_wisuda) == 3 ? 'selected' : '' }}>Maret</option>
                                    <option value="4" {{ old('bulan_wisuda', $alumni->bulan_wisuda) == 4 ? 'selected' : '' }}>April</option>
                                    <option value="5" {{ old('bulan_wisuda', $alumni->bulan_wisuda) == 5 ? 'selected' : '' }}>Mei</option>
                                    <option value="6" {{ old('bulan_wisuda', $alumni->bulan_wisuda) == 6 ? 'selected' : '' }}>Juni</option>
                                    <option value="7" {{ old('bulan_wisuda', $alumni->bulan_wisuda) == 7 ? 'selected' : '' }}>Juli</option>
                                    <option value="8" {{ old('bulan_wisuda', $alumni->bulan_wisuda) == 8 ? 'selected' : '' }}>Agustus</option>
                                    <option value="9" {{ old('bulan_wisuda', $alumni->bulan_wisuda) == 9 ? 'selected' : '' }}>September</option>
                                    <option value="10" {{ old('bulan_wisuda', $alumni->bulan_wisuda) == 10 ? 'selected' : '' }}>Oktober</option>
                                    <option value="11" {{ old('bulan_wisuda', $alumni->bulan_wisuda) == 11 ? 'selected' : '' }}>November</option>
                                    <option value="12" {{ old('bulan_wisuda', $alumni->bulan_wisuda) == 12 ? 'selected' : '' }}>Desember</option>
                                </select>
                                <small class="text-danger">
                                    @foreach ($errors->get('bulan_wisuda') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="tahun_wisuda" class="form-label">Tahun Wisuda</label>
                                <input type="number" class="form-control" id="tahun_wisuda" name="tahun_wisuda" value="{{ old('tahun_wisuda', $alumni->tahun_wisuda) }}" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('tahun_wisuda') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="fakultas_kode" class="form-label">Fakultas</label>
                                <select class="form-select" id="fakultas_kode" name="fakultas_kode" required>
                                    <option value="">Pilih Fakultas</option>
                                    @foreach($fakultas as $f)
                                        <option value="{{ $f->kode_fakultas }}" {{ old('fakultas_kode', $alumni->fakultas_kode) == $f->kode_fakultas ? 'selected' : '' }}>{{ $f->nama_fakultas }}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger">
                                    @foreach ($errors->get('fakultas_kode') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="program_studi_kode" class="form-label">Program Studi</label>
                                <select class="form-select" id="program_studi_kode" name="program_studi_kode" required>
                                    <option value="">Pilih Program Studi</option>
                                </select>
                                <small class="text-danger">
                                    @foreach ($errors->get('program_studi_kode') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin', $alumni->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $alumni->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                <small class="text-danger">
                                    @foreach ($errors->get('jenis_kelamin') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $alumni->tempat_lahir) }}" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('tempat_lahir') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $alumni->tanggal_lahir) }}" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('tanggal_lahir') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="nomor_seri_ijazah" class="form-label">Nomor Seri Ijazah</label>
                                <input type="text" class="form-control" id="nomor_seri_ijazah" name="nomor_seri_ijazah" value="{{ old('nomor_seri_ijazah', $alumni->nomor_seri_ijazah) }}" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('nomor_seri_ijazah') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="nomor_seri_transkrip" class="form-label">Nomor Seri Transkrip</label>
                                <input type="text" class="form-control" id="nomor_seri_transkrip" name="nomor_seri_transkrip" value="{{ old('nomor_seri_transkrip', $alumni->nomor_seri_transkrip) }}" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('nomor_seri_transkrip') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="pisn" class="form-label">PISN</label>
                                <input type="text" class="form-control" id="pisn" name="pisn" value="{{ old('pisn', $alumni->pisn) }}" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('pisn') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" class="form-control" id="nik" name="nik" value="{{ old('nik', $alumni->nik) }}" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('nik') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Update</button>
                                <a href="{{ route('data_alumni.index') }}" class="btn btn-secondary px-5">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Load program studi saat halaman dimuat
    var fakultasKode = $('#fakultas_kode').val();
    if(fakultasKode) {
        loadProgramStudi(fakultasKode);
    }

    $('#fakultas_kode').on('change', function() {
        var fakultasKode = $(this).val();
        if(fakultasKode) {
            loadProgramStudi(fakultasKode);
        } else {
            $('#program_studi_kode').empty();
            $('#program_studi_kode').append('<option value="">Pilih Program Studi</option>');
        }
    });

    function loadProgramStudi(fakultasKode) {
        $.ajax({
            url: '{{ route('data_alumni.getProgramStudi', ['fakultas_kode' => ':fakultas_kode']) }}'.replace(':fakultas_kode', fakultasKode),
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#program_studi_kode').empty();
                $('#program_studi_kode').append('<option value="">Pilih Program Studi</option>');
                $.each(data, function(key, value) {
                    var selected = value.kode_prodi == '{{ old('program_studi_kode', $alumni->program_studi_kode) }}' ? 'selected' : '';
                    $('#program_studi_kode').append('<option value="'+ value.kode_prodi +'" '+ selected +'>'+ value.nama_prodi +'</option>');
                });
            }
        });
    }
});
</script>

@endsection
