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
                        <li class="breadcrumb-item active" aria-current="page">Daftar Wisuda</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Daftar Wisuda</li>
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
                            <div><i class="bx bx-edit-alt me-1 font-22 text-primary"></i></div>
                            <h5 class="mb-0 text-primary">Edit Daftar Wisuda</h5>
                        </div>
                        <hr>
                        <form action="{{ route('daftar_wisuda.update', $daftarWisuda->id) }}" method="POST" class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $daftarWisuda->nama) }}" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('nama') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="npm" class="form-label">NPM</label>
                                <input type="text" class="form-control" id="npm" name="npm" value="{{ old('npm', $daftarWisuda->npm) }}" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('npm') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="tanggal_lulus" class="form-label">Tanggal Lulus</label>
                                <input type="date" class="form-control" id="tanggal_lulus" name="tanggal_lulus" value="{{ old('tanggal_lulus', $daftarWisuda->tanggal_lulus) }}" required>
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
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ old('bulan_wisuda', $daftarWisuda->bulan_wisuda) == $i ? 'selected' : '' }}>
                                            {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                        </option>
                                    @endfor
                                </select>
                                <small class="text-danger">
                                    @foreach ($errors->get('bulan_wisuda') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label for="tahun_wisuda" class="form-label">Tahun Wisuda</label>
                                <input type="number" class="form-control" id="tahun_wisuda" name="tahun_wisuda" value="{{ old('tahun_wisuda', $daftarWisuda->tahun_wisuda) }}" required>
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
                                        <option value="{{ $f->kode_fakultas }}" {{ old('fakultas_kode', $daftarWisuda->fakultas_kode) == $f->kode_fakultas ? 'selected' : '' }}>
                                            {{ $f->nama_fakultas }}
                                        </option>
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
                                    @foreach($programStudi as $prodi)
                                        <option value="{{ $prodi->kode_prodi }}" {{ old('program_studi_kode', $daftarWisuda->program_studi_kode) == $prodi->kode_prodi ? 'selected' : '' }}>
                                            {{ $prodi->nama_prodi }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-danger">
                                    @foreach ($errors->get('program_studi_kode') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Update</button>
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
    $('#fakultas_kode').on('change', function() {
        var fakultasKode = $(this).val();
        if(fakultasKode) {
            $.ajax({
                url: '{{ route('daftar_wisuda.getProgramStudi', ['fakultas_kode' => ':fakultas_kode']) }}'.replace(':fakultas_kode', fakultasKode),
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#program_studi_kode').empty();
                    $('#program_studi_kode').append('<option value="">Pilih Program Studi</option>');
                    $.each(data, function(key, value) {
                        $('#program_studi_kode').append('<option value="'+ value.kode_prodi +'">'+ value.nama_prodi +'</option>');
                    });
                }
            });
        } else {
            $('#program_studi_kode').empty();
            $('#program_studi_kode').append('<option value="">Pilih Program Studi</option>');
        }
    });
});
</script>

@endsection
