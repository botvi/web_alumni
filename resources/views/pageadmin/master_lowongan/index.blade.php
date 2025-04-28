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
                    </ol>
                </nav>
            </div>
        </div>
        <!--breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Master Lowongan Pekerjaan</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('master_lowongan.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Logo Perusahaan</th>
                                <th>Nama Perusahaan</th>
                                <th>Nama Lowongan</th>
                                <th>Deskripsi</th>
                                <th>Persyaratan</th>
                                <th>Lokasi</th>
                                <th>Gaji</th>
                                <th>Tanggal Posting</th>
                                <th>Tanggal Penutupan</th>
                                <th>Email Perusahaan</th>
                                <th>Whatsapp Perusahaan</th>
                                <th>Website Perusahaan</th>
                                <th>Aksi</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lowongan as $index => $l)
                            <tr>
                                <td><img src="{{ asset('uploads/logo_perusahaan/'.$l->logo_perusahaan) }}" alt="Logo Perusahaan" class="img-thumbnail" width="100"></td>
                                <td>{{ $l->nama_perusahaan }}</td>
                                <td>{{ $l->nama_lowongan }}</td>
                                <td>{{ $l->deskripsi }}</td>
                                <td>{{ $l->persyaratan }}</td>
                                <td>{{ $l->lokasi }}</td>
                                <td>{{ $l->gaji }}</td>
                                <td>{{ $l->tanggal_posting }}</td>
                                <td>{{ $l->tanggal_penutupan }}</td>
                                <td><a href="mailto:{{ $l->email_perusahaan }}">{{ $l->email_perusahaan }}</a></td>
                                <td><a href="https://wa.me/{{ $l->whatsapp_perusahaan }}" target="_blank">{{ $l->whatsapp_perusahaan }}</a></td>
                                <td><a href="{{ $l->website_perusahaan }}" target="_blank">{{ $l->website_perusahaan }}</a></td>
                                <td>
                                    <a href="{{ route('master_lowongan.edit', $l->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('master_lowongan.destroy', $l->id) }}" method="POST" style="display:inline;" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Logo Perusahaan</th>
                                <th>Nama Perusahaan</th>
                                <th>Nama Lowongan</th>
                                <th>Deskripsi</th>
                                <th>Persyaratan</th>
                                <th>Lokasi</th>
                                <th>Gaji</th>
                                <th>Tanggal Posting</th>
                                <th>Tanggal Penutupan</th>
                                <th>Email Perusahaan</th>
                                <th>Whatsapp Perusahaan</th>
                                <th>Website Perusahaan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection