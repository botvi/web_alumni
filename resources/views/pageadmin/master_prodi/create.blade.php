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
                        <li class="breadcrumb-item active" aria-current="page">Master Prodi</li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Master Prodi</li>
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
                            <div><i class="bx bx-plus-circle me-1 font-22 text-primary"></i></div>
                            <h5 class="mb-0 text-primary">Tambah Master Prodi</h5>
                        </div>
                        <hr>
                        <form action="{{ route('master_prodi.store') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-12">
                                <label for="fakultas_kode" class="form-label">Pilih Fakultas</label>
                               <select name="fakultas_kode" id="fakultas_kode" class="form-control" required>
                                <option value="">Pilih Fakultas</option>
                                @foreach ($fakultas as $f)
                                    <option value="{{ $f->kode_fakultas }}">{{ $f->nama_fakultas }}</option>
                                @endforeach
                                <small class="text-danger">
                                    @foreach ($errors->get('fakultas_kode') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                               </select>    
                            </div>
                            <div class="col-md-12">
                                <label for="kode_prodi" class="form-label">Kode Prodi</label>
                                <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('kode_prodi') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>
                            <div class="col-md-12">
                                <label for="nama_prodi" class="form-label">Nama Prodi</label>
                                <textarea rows="3" type="text" class="form-control" id="nama_prodi" name="nama_prodi" required></textarea>
                                <small class="text-danger">
                                    @foreach ($errors->get('nama_prodi') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>
                            <div class="col-md-12">
                                <label for="akreditasi" class="form-label">Akreditasi</label>
                                <input type="text" class="form-control" id="akreditasi" name="akreditasi" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('akreditasi') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>
                            <div class="col-md-12">
                                <label for="program_pendidikan" class="form-label">Program Pendidikan</label>
                                <textarea rows="3" type="text" class="form-control" id="program_pendidikan" name="program_pendidikan" placeholder="Sarjana (S1), Sarjana (S2), dll" required></textarea>
                                <small class="text-danger">
                                    @foreach ($errors->get('program_pendidikan') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>
                            <div class="col-md-12">
                                <label for="gelar_akademik" class="form-label">Gelar Akademik</label>
                                <input type="text" class="form-control" id="gelar_akademik" name="gelar_akademik" placeholder="Sarjana Komputer (S.Kom), Sarjana Teknik (S.T), dll" required>
                                <small class="text-danger">
                                    @foreach ($errors->get('gelar_akademik') as $error)
                                        <li>{{ $error }}</li>   
                                    @endforeach
                                </small>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
