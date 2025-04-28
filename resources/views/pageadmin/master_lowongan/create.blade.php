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
                            <li class="breadcrumb-item active" aria-current="page">Master Lowongan Pekerjaan</li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Master Lowongan Pekerjaan</li>
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
                                <h5 class="mb-0 text-primary">Tambah Master Lowongan Pekerjaan</h5>
                            </div>
                            <hr>
                            <form action="{{ route('master_lowongan.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-12">
                                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                                        required>
                                    <small class="text-danger">
                                        @foreach ($errors->get('nama_perusahaan') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>
                                <div class="col-md-12">
                                    <label for="nama_lowongan" class="form-label">Nama Lowongan</label>
                                    <input type="text" class="form-control" id="nama_lowongan" name="nama_lowongan"
                                        required>
                                    <small class="text-danger">
                                        @foreach ($errors->get('nama_lowongan') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>
                                <div class="col-md-12">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                                    <small class="text-danger">
                                        @foreach ($errors->get('deskripsi') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>
                                <div class="col-md-12">
                                    <label for="persyaratan" class="form-label">Persyaratan</label>
                                    <textarea class="form-control" id="persyaratan" name="persyaratan" required></textarea>
                                    <small class="text-danger">
                                        @foreach ($errors->get('persyaratan') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>
                                <div class="col-md-12">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                                    <small class="text-danger">
                                        @foreach ($errors->get('lokasi') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>
                                <div class="col-md-12">
                                    <label for="gaji" class="form-label">Gaji</label>
                                    <input type="text" class="form-control" id="gaji" name="gaji" required>
                                    <small class="text-danger">
                                        @foreach ($errors->get('gaji') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>
                                <div class="col-md-12">
                                    <label for="tanggal_posting" class="form-label">Tanggal Posting</label>
                                    <input type="date" class="form-control" id="tanggal_posting"
                                        name="tanggal_posting" value="{{ date('Y-m-d') }}" readonly>
                                    <small class="text-danger">
                                        @foreach ($errors->get('tanggal_posting') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>

                                <div class="col-md-12">
                                    <label for="tanggal_penutupan" class="form-label">Tanggal Penutupan</label>
                                    <input type="date" class="form-control" id="tanggal_penutupan"
                                        name="tanggal_penutupan" required>
                                    <small class="text-danger">
                                        @foreach ($errors->get('tanggal_penutupan') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>
                                <div class="col-md-12">
                                    <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                                    <input type="email" class="form-control" id="email_perusahaan" name="email_perusahaan"
                                        >
                                    <small class="text-danger">
                                        @foreach ($errors->get('email_perusahaan') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>
                                <div class="col-md-12">
                                    <label for="whatsapp_perusahaan" class="form-label">Whatsapp Perusahaan</label>
                                    <input type="text" class="form-control" id="whatsapp_perusahaan" name="whatsapp_perusahaan" placeholder="6281234567890"
                                        >
                                    <small class="text-danger">
                                        @foreach ($errors->get('whatsapp_perusahaan') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>

                                <div class="col-md-12">
                                    <label for="website_perusahaan" class="form-label">Website Perusahaan</label>
                                    <input type="text" class="form-control" id="website_perusahaan" name="website_perusahaan"
                                        >
                                    <small class="text-danger">
                                        @foreach ($errors->get('website_perusahaan') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>
                                <div class="col-md-12">
                                    <label for="logo_perusahaan" class="form-label">Logo Perusahaan</label>
                                    <input type="file" class="form-control" id="logo_perusahaan" name="logo_perusahaan">
                                    <small class="text-danger">
                                        @foreach ($errors->get('logo_perusahaan') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>

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
@endsection
