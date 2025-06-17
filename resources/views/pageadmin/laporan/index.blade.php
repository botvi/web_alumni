@extends('template-admin.layout')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Laporan</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
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
                                <h5 class="mb-0 text-primary">DataLaporan</h5>
                            </div>
                            <hr>
                            <form action="{{ route('laporan.update') }}" method="POST" class="row g-3">
                                @csrf
                                <div class="col-md-6">
                                    <label for="lampiran_daftar_wisuda" class="form-label">Lampiran Data Alumni</label>
                                    <input type="text" class="form-control" id="lampiran_daftar_wisuda" value="{{ $dataLaporan->lampiran_daftar_wisuda ?? '' }}" name="lampiran_daftar_wisuda"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lampiran_data_pekerjaan" class="form-label">Lampiran Data Pekerjaan</label>
                                    <input type="text" class="form-control" id="lampiran_data_pekerjaan" value="{{ $dataLaporan->lampiran_data_pekerjaan ?? '' }}" name="lampiran_data_pekerjaan"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nomor_daftar_wisuda" class="form-label">Nomor Data Alumni</label>
                                    <input type="text" class="form-control" id="nomor_daftar_wisuda" value="{{ $dataLaporan->nomor_daftar_wisuda ?? '' }}" name="nomor_daftar_wisuda"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nomor_data_pekerjaan" class="form-label">Nomor Data Pekerjaan</label>
                                    <input type="text" class="form-control" id="nomor_data_pekerjaan" value="{{ $dataLaporan->nomor_data_pekerjaan ?? '' }}" name="nomor_data_pekerjaan"
                                        required>
                                </div>
                                <div class="col-md-12">
                                    <label for="nama_rektor" class="form-label">Nama Rektor</label>
                                    <input type="text" class="form-control" id="nama_rektor" value="{{ $dataLaporan->nama_rektor ?? '' }}" name="nama_rektor"
                                        required>
                                </div>
                                <div class="col-md-12">
                                    <label for="nidn_rektor" class="form-label">NIDN Rektor</label>
                                    <input type="text" class="form-control" id="nidn_rektor" value="{{ $dataLaporan->nidn_rektor ?? '' }}" name="nidn_rektor"
                                        required>
                                </div>

                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-xl-10 mx-auto">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bx-printer me-1 font-22 text-primary"></i></div>
                                <h5 class="mb-0 text-primary">Print Laporan</h5>
                            </div>
                            <hr>
                            <div class="row g-3">
                                <div class="col-12">
                                    <form action="{{ route('laporan.printdataalumni') }}" method="GET" class="d-flex align-items-center">
                                        <select name="tahun_wisuda" class="form-select me-2" id="tahun_wisuda">
                                            @php
                                                $currentYear = date('Y');
                                                $startYear = $currentYear - 5;
                                                $endYear = $currentYear + 5;
                                            @endphp
                                            @for($year = $startYear; $year <= $endYear; $year++)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                        <button type="submit" class="btn btn-primary me-2" target="_blank">Preview Data Alumni</button>
                                        <a href="#" class="btn btn-success" id="downloadBtn">Download Excel</a>
                                    </form>
                                </div>

                                <script>
                                    document.getElementById('tahun_wisuda').addEventListener('change', function() {
                                        var tahun = this.value;
                                        var downloadBtn = document.getElementById('downloadBtn');
                                        downloadBtn.href = "{{ route('laporan.downloaddataalumni') }}?tahun_wisuda=" + tahun;
                                    });

                                    // Set initial href
                                    document.getElementById('downloadBtn').href = "{{ route('laporan.downloaddataalumni') }}?tahun_wisuda=" + document.getElementById('tahun_wisuda').value;
                                </script>
                                <div class="col-12">
                                    <form action="{{ route('laporan.printdataalumniyangbekerja') }}" method="GET" class="d-flex align-items-center">
                                        <select name="tahun_wisuda" class="form-select me-2" id="tahun_wisuda_bekerja">
                                            @for($year = $startYear; $year <= $endYear; $year++)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                        <button type="submit" class="btn btn-primary me-2" target="_blank">Preview Data Alumni yang Bekerja</button>
                                        <a href="#" class="btn btn-success" id="downloadBtnBekerja">Download Excel</a>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <form action="{{ route('laporan.printdataalumniyangtidakbekerja') }}" method="GET" class="d-flex align-items-center">
                                        <select name="tahun_wisuda" class="form-select me-2" id="tahun_wisuda_tidak_bekerja">
                                            @for($year = $startYear; $year <= $endYear; $year++)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                        <button type="submit" class="btn btn-primary me-2" target="_blank">Preview Data Alumni yang Tidak Bekerja</button>
                                        <a href="#" class="btn btn-success" id="downloadBtnTidakBekerja">Download Excel</a>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <form action="{{ route('laporan.printdataalumniyangwirausaha') }}" method="GET" class="d-flex align-items-center">
                                        <select name="tahun_wisuda" class="form-select me-2" id="tahun_wisuda_wirausaha">
                                            @for($year = $startYear; $year <= $endYear; $year++)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                        <button type="submit" class="btn btn-primary me-2" target="_blank">Preview Data Alumni yang Wirausaha</button>
                                        <a href="#" class="btn btn-success" id="downloadBtnWirausaha">Download Excel</a>
                                    </form>
                                </div>

                                <script>
                                    // Script untuk Data Alumni yang Bekerja
                                    document.getElementById('tahun_wisuda_bekerja').addEventListener('change', function() {
                                        var tahun = this.value;
                                        var downloadBtn = document.getElementById('downloadBtnBekerja');
                                        downloadBtn.href = "{{ route('laporan.downloaddataalumniyangbekerja') }}?tahun_wisuda=" + tahun;
                                    });
                                    document.getElementById('downloadBtnBekerja').href = "{{ route('laporan.downloaddataalumniyangbekerja') }}?tahun_wisuda=" + document.getElementById('tahun_wisuda_bekerja').value;

                                    // Script untuk Data Alumni yang Tidak Bekerja
                                    document.getElementById('tahun_wisuda_tidak_bekerja').addEventListener('change', function() {
                                        var tahun = this.value;
                                        var downloadBtn = document.getElementById('downloadBtnTidakBekerja');
                                        downloadBtn.href = "{{ route('laporan.downloaddataalumniyangtidakbekerja') }}?tahun_wisuda=" + tahun;
                                    });
                                    document.getElementById('downloadBtnTidakBekerja').href = "{{ route('laporan.downloaddataalumniyangtidakbekerja') }}?tahun_wisuda=" + document.getElementById('tahun_wisuda_tidak_bekerja').value;

                                    // Script untuk Data Alumni yang Wirausaha
                                    document.getElementById('tahun_wisuda_wirausaha').addEventListener('change', function() {
                                        var tahun = this.value;
                                        var downloadBtn = document.getElementById('downloadBtnWirausaha');
                                        downloadBtn.href = "{{ route('laporan.downloaddataalumniyangwirausaha') }}?tahun_wisuda=" + tahun;
                                    });
                                    document.getElementById('downloadBtnWirausaha').href = "{{ route('laporan.downloaddataalumniyangwirausaha') }}?tahun_wisuda=" + document.getElementById('tahun_wisuda_wirausaha').value;
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
