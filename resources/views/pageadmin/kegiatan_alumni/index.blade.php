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
                        <li class="breadcrumb-item active" aria-current="page">Kegiatan Alumni</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Kegiatan Alumni</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('kegiatan_alumni.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Deskripsi Kegiatan</th>
                                <th>Tempat</th>
                                <th>Aksi</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kegiatan as $index => $k)
                            <tr>
                                <td><img src="{{ asset('uploads/kegiatan/' . $k->gambar) }}" alt="Gambar Kegiatan" class="img-fluid" style="width: 100px; height: 100px;"></td>
                                <td>
                                    {!! Str::limit($k->deskripsi_kegiatan, 100) !!}
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalDeskripsi{{ $k->id }}">
                                        Baca Selengkapnya
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalDeskripsi{{ $k->id }}" tabindex="-1" aria-labelledby="modalDeskripsiLabel{{ $k->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalDeskripsiLabel{{ $k->id }}">Deskripsi Kegiatan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-wrap" style="white-space: pre-wrap; word-wrap: break-word;">
                                                        {!! $k->deskripsi_kegiatan !!}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $k->tempat }}</td>
                                <td>
                                    <a href="{{ route('kegiatan_alumni.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('kegiatan_alumni.destroy', $k->id) }}" method="POST" style="display:inline;" class="delete-form">
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
                                <th>Gambar</th>
                                <th>Deskripsi Kegiatan</th>
                                <th>Tempat</th>
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