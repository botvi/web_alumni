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
                        <li class="breadcrumb-item active" aria-current="page">Saran Alumni</li>
                        <li class="breadcrumb-item active" aria-current="page">Berikan Respon Saran Alumni</li>
                    </ol>
                </nav>
            </div>
        </div>
     


        <div class="row">
            <div class="col-xl-7 mx-auto">
                <hr/>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bx-edit me-1 font-22 text-primary"></i></div>
                            <h5 class="mb-0 text-primary">Berikan Respon Saran Alumni</h5>
                        </div>
                        <hr>
                        <form action="{{ route('saran_alumni.update', $saran->id) }}" method="POST" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="respon" class="form-label">Respon</label>
                                <textarea rows="3" type="text" class="form-control" id="respon" name="respon" value="{{ old('respon', $saran->respon) }}" required>{{ old('respon', $saran->respon) }}</textarea>
                                <small class="text-danger">
                                    @foreach ($errors->get('saran') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </small>
                            </div>
                           
                           
                           
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Kirim Respon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection