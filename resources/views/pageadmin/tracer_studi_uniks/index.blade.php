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
                        <li class="breadcrumb-item active" aria-current="page">Tracer Studi Uniks</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Tracer Studi Uniks</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Nomor Telepon</th>
                                <th>Email</th>
                                <th>Tanggal Lulus</th>
                                <th>IPK</th>
                                <th>Masa Studi</th>
                                <th>Program Studi</th>
                                <th>Jenis Pekerjaan</th>
                                <th>Tempat Bekerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tracerStudiUniks as $index => $t)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $t->npm }}</td>
                                <td>{{ $t->nama }}</td>
                                <td>{{ $t->tempat_lahir }}</td>
                                <td>{{ $t->tanggal_lahir }}</td>
                                <td>{{ $t->jenis_kelamin }}</td>
                                <td>{{ $t->nomor_telepon }}</td>
                                <td>{{ $t->email }}</td>
                                <td>{{ $t->tanggal_lulus }}</td>
                                <td>{{ $t->ipk }}</td>
                                <td>{{ $t->masa_studi }}</td>
                                <td>{{ $t->programStudi->nama_prodi }}</td>
                                <td>{{ $t->jenis_pekerjaan }}</td>
                                <td>{{ $t->tempat_bekerja }}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Nomor Telepon</th>
                                <th>Email</th>
                                <th>Tanggal Lulus</th>
                                <th>IPK</th>
                                <th>Masa Studi</th>
                                <th>Program Studi</th>
                                <th>Jenis Pekerjaan</th>
                                <th>Tempat Bekerja</th>
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