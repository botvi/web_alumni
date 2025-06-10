@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Data Pekerjaan Alumni</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pekerjaan Alumni</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--breadcrumb-->
        <h6 class="mb-0 text-uppercase">Data Pekerjaan Alumni</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-primary" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#bekerja" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-briefcase font-18 me-1"></i></div>
                                <div class="tab-title">Sudah Bekerja</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#belum_bekerja" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-time font-18 me-1"></i></div>
                                <div class="tab-title">Belum Bekerja</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#wirausaha" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-store font-18 me-1"></i></div>
                                <div class="tab-title">Wirausaha</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content py-3">
                    <!-- Tab Sudah Bekerja -->
                    <div class="tab-pane fade show active" id="bekerja" role="tabpanel">
                        <div class="table-responsive">
                            <table id="table-bekerja" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alumni</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Posisi/Jabatan</th>
                                        <th>Status Pekerjaan</th>
                                        <th>Jenis Perusahaan</th>
                                        <th>Gaji</th>
                                        <th>Lama Mendapat Pekerjaan</th>
                                        <th>Kesesuaian Bidang</th>
                                        <th>Nomor Telepon</th>
                                        <th>Email</th>
                                        <th>Alamat Saat Ini</th>
                                        <th>Alamat Perusahaan</th>
                                        <th>Sumber Informasi Lowongan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataPekerjaanAlumni->where('apakah_bekerja', 'Ya') as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->dataAlumni->nama ?? '-' }}</td>
                                        <td>{{ $data->nama_perusahaan ?? '-' }}</td>
                                        <td>{{ $data->posisi_jabatan ?? '-' }}</td>
                                        <td>{{ $data->status_pekerjaan ?? '-' }}</td>
                                        <td>{{ $data->jenis_perusahaan ?? '-' }}</td>
                                        <td>Rp. {{ number_format($data->gaji, 0, ',', '.') ?? '-' }}</td>
                                        <td>{{ $data->lama_mendapat_pekerjaan ?? '-' }}</td>
                                        <td>{{ $data->kesesuaian_bidang ?? '-' }}</td>
                                        <td>{{ $data->nomor_telepon ?? '-' }}</td>
                                        <td>{{ $data->email ?? '-' }}</td>
                                        <td>{{ $data->alamat_saat_ini ?? '-' }}</td>
                                        <td>{{ $data->alamat_perusahaan ?? '-' }}</td>
                                        <td>{{ $data->sumber_informasi_lowongan ?? '-' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tab Belum Bekerja -->
                    <div class="tab-pane fade" id="belum_bekerja" role="tabpanel">
                        <div class="table-responsive">
                            <table id="table-belum-bekerja" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alumni</th>
                                        <th>Alasan Belum Bekerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataPekerjaanAlumni->where('apakah_bekerja', 'Tidak') as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->dataAlumni->nama ?? '-' }}</td>
                                        <td>{{ $data->alasan_belum_bekerja ?? '-' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tab Wirausaha -->
                    <div class="tab-pane fade" id="wirausaha" role="tabpanel">
                        <div class="table-responsive">
                            <table id="table-wirausaha" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alumni</th>
                                        <th>Jenis Usaha</th>
                                        <th>Tahun Mulai</th>
                                        <th>Jumlah Karyawan</th>
                                        <th>Omset Bulanan</th>
                                        <th>Tantangan Usaha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataPekerjaanAlumni->where('apakah_bekerja', 'Wirausaha') as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->dataAlumni->nama ?? '-' }}</td>
                                        <td>{{ $data->jenis_usaha ?? '-' }}</td>
                                        <td>{{ $data->tahun_mulai_usaha ?? '-' }}</td>
                                        <td>{{ $data->jumlah_karyawan ?? '-' }}</td>
                                        <td>Rp. {{ number_format($data->omset_bulanan, 0, ',', '.') ?? '-' }}</td>
                                        <td>{{ $data->tantangan_usaha ?? '-' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
        // Inisialisasi DataTable untuk setiap tabel
        $('#table-bekerja').DataTable();
        $('#table-belum-bekerja').DataTable();
        $('#table-wirausaha').DataTable();

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