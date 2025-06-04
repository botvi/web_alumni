@extends('template-admin.layout')
@section('style')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
@endsection
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
                            <li class="breadcrumb-item active" aria-current="page">Kegiatan Alumni</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Kegiatan Alumni</li>
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
                                <div><i class="bx bx-edit me-1 font-22 text-primary"></i></div>
                                <h5 class="mb-0 text-primary">Edit Kegiatan Alumni</h5>
                            </div>
                            <hr>
                            <form action="{{ route('kegiatan_alumni.update', $kegiatan_alumni->id) }}" enctype="multipart/form-data" method="POST" class="row g-3">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                                    <small class="text-danger">
                                        @foreach ($errors->get('gambar') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                    <img src="{{ asset('uploads/kegiatan/' . $kegiatan_alumni->gambar) }}" height="100" alt="Gambar Kegiatan" class="img-fluid">
                                </div>
                                <div class="col-md-12">
                                    <label for="deskripsi_kegiatan" class="form-label">Deskripsi Kegiatan</label>
                                    <textarea id="deskripsi_kegiatan" name="deskripsi_kegiatan">{{ $kegiatan_alumni->deskripsi_kegiatan }}</textarea>
                                    <small class="text-danger">
                                        @foreach ($errors->get('deskripsi_kegiatan') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </small>
                                </div>
                                <div class="col-md-12">
                                    <label for="tempat" class="form-label">Tempat</label>
                                    <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $kegiatan_alumni->tempat }}" required>
                                    <small class="text-danger">
                                        @foreach ($errors->get('tempat') as $error)
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
@endsection
@section('script')
<script>
    $('#deskripsi_kegiatan').summernote({
        tabsize: 2,
        height: 500,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
@endsection