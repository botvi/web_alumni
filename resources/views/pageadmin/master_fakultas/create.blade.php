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
                            <li class="breadcrumb-item active" aria-current="page">Master Fakultas</li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Master Fakultas</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--breadcrumb-->

            <div class="row">
                <div class="col-xl-7 mx-auto">
                    <hr />
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bx-plus-circle me-1 font-22 text-primary"></i></div>
                                <h5 class="mb-0 text-primary">Tambah Master Fakultas</h5>
                            </div>
                            <hr>
                            <form action="{{ route('master_fakultas.store') }}" method="POST" class="row g-3">
                                @csrf
                                <div class="col-md-12">
                                    <label for="kode_fakultas" class="form-label">Kode Fakultas</label>
                                    <input type="number" class="form-control" id="kode_fakultas" name="kode_fakultas"
                                        required>
                                    <small class="text-danger">
                                        @foreach ($errors->get('kode_fakultas') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>
                                <div class="col-md-12">
                                    <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
                                    <textarea rows="3" type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" required></textarea>
                                    <small class="text-danger">
                                        @foreach ($errors->get('nama_fakultas') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>
                                <div class="col-md-12">
                                    <label for="nama_dekan" class="form-label">Nama Dekan</label>
                                    <input type="text" class="form-control" id="nama_dekan" name="nama_dekan" required>
                                    <small class="text-danger">
                                        @foreach ($errors->get('nama_dekan') as $error)
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
