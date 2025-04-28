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
                        </ol>
                    </nav>
                </div>
            </div>
            <!--breadcrumb-->
            <h6 class="mb-0 text-uppercase">Data Daftar Wisuda</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <form action="{{ route('daftar_wisuda.index') }}" method="GET" class="d-flex">
                                <select name="tahun_wisuda" class="form-select me-2">
                                    @php
                                        $currentYear = date('Y');
                                        $startYear = $currentYear - 5;
                                        $endYear = $currentYear + 5;
                                    @endphp
                                    @for($year = $startYear; $year <= $endYear; $year++)
                                        <option value="{{ $year }}" {{ $tahun == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                        </div>
                        <div class="col-md-9">
                            <a href="{{ route('daftar_wisuda.create') }}" class="btn btn-primary float-end">Tambah Data</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pin Akses</th>
                                    <th>Nama</th>
                                    <th>NPM</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tanggal Lulus</th>
                                    <th>Bulan Wisuda</th>
                                    <th>Tahun Wisuda</th>
                                    <th>Fakultas</th>
                                    <th>Program Studi</th>
                                    <th>Nomor Seri Ijazah</th>
                                    <th>Nomor Seri Transkrip</th>
                                    <th>PISN</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $bulanList = [
                                        1 => 'Januari',
                                        2 => 'Februari',
                                        3 => 'Maret',
                                        4 => 'April',
                                        5 => 'Mei',
                                        6 => 'Juni',
                                        7 => 'Juli',
                                        8 => 'Agustus',
                                        9 => 'September',
                                        10 => 'Oktober',
                                        11 => 'November',
                                        12 => 'Desember',
                                    ];
                                    @endphp
                                @foreach ($daftarWisuda as $index => $d)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><span class="badge bg-primary">{{ $d->pin_akses ?? '<span class="badge bg-danger">Data belum dilengkapi</span>' }}</span></td>
                                        <td>{{ $d->nama ?? '<span class="badge bg-danger">Data belum dilengkapi</span>' }}
                                        </td>
                                        <td>{{ $d->npm ?? '<span class="badge bg-danger">Data belum dilengkapi</span>' }}
                                        </td>
                                        <td>{!! $d->tempat_lahir ?? '<span class="badge bg-danger">Data belum dilengkapi</span>' !!}</td>
                                        <td>{!! $d->tanggal_lahir
                                            ? \Carbon\Carbon::parse($d->tanggal_lahir)->locale('id')->isoFormat('dddd, D MMMM Y')
                                            : '<span class="badge bg-danger">Data belum dilengkapi</span>' !!}</td>
                                        <td>{!! $d->tanggal_lulus
                                            ? \Carbon\Carbon::parse($d->tanggal_lulus)->isoFormat('dddd, D MMMM Y')
                                            : '<span class="badge bg-danger">Data belum dilengkapi</span>' !!}</td>
                                        <td>
                                            @if ($d->bulan_wisuda)
                                                {{ $bulanList[$d->bulan_wisuda] ?? 'Bulan tidak valid' }}
                                            @else
                                                <span class="badge bg-danger">Data belum dilengkapi</span>
                                            @endif
                                        </td>
                                        <td>{{ $d->tahun_wisuda ?? '<span class="badge bg-danger">Data belum dilengkapi</span>' }}
                                        </td>
                                        <td>{{ $d->fakultas->nama_fakultas ?? '<span class="badge bg-danger">Data belum dilengkapi</span>' }}
                                        </td>
                                        <td>{{ $d->programStudi->nama_prodi ?? '<span class="badge bg-danger">Data belum dilengkapi</span>' }}
                                        </td>
                                        <td>{!! $d->nomor_seri_ijazah ?? '<span class="badge bg-danger">Data belum dilengkapi</span>' !!}</td>
                                        <td>{!! $d->nomor_seri_transkrip ?? '<span class="badge bg-danger">Data belum dilengkapi</span>' !!}</td>
                                        <td>{!! $d->pisn ?? '<span class="badge bg-danger">Data belum dilengkapi</span>' !!}</td>
                                        <td>
                                            <a href="{{ route('daftar_wisuda.edit', $d->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('daftar_wisuda.destroy', $d->id) }}" method="POST"
                                                style="display:inline;" class="delete-form">
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
                                    <th>No</th>
                                    <th>Pin Akses</th>
                                    <th>Nama</th>
                                    <th>NPM</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tanggal Lulus</th>
                                    <th>Bulan Wisuda</th>
                                    <th>Tahun Wisuda</th>
                                    <th>Fakultas</th>
                                    <th>Program Studi</th>
                                    <th>Nomor Seri Ijazah</th>
                                    <th>Nomor Seri Transkrip</th>
                                    <th>PISN</th>
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
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
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
