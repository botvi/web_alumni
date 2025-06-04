@extends('temaplate-web.layout')


   
@section('content')
    <!-- Services Section -->
    <section id="services" class="services section light-background" style="background: #f2f2f2 url('https://assets.siakadcloud.com/assets/v1/img/pattern/pat_04.png') repeat;">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>Lengkapi Data</span>
            <h2>Lengkapi Data</h2>
        </div>
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Data Alumni</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control bg-light" name="nama"
                                            value="{{ $user->nama }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">NPM</label>
                                        <input type="text" class="form-control bg-light" name="npm"
                                            value="{{ $user->npm }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Fakultas</label>
                                        <input type="text" class="form-control bg-light" name="fakultas_kode"
                                            value="{{ $user->fakultas->nama_fakultas }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Program Studi</label>
                                        <input type="text" class="form-control bg-light" name="program_studi_kode"
                                            value="{{ $user->programStudi->nama_prodi }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Lulus</label>
                                        <input type="date" class="form-control bg-light" name="tanggal_lulus"
                                            value="{{ $user->tanggal_lulus }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir"
                                            value="{{ $user->tempat_lahir ?? '' }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="text" class="form-control" name="tanggal_lahir"
                                            value="{{ $user->tanggal_lahir ?? '' }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">NIK</label>
                                        <input type="text" class="form-control" name="nik"
                                            value="{{ $user->nik ?? '' }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Data Pekerjaan Alumni</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('lengkapi-data.simpan') }}">
                                @csrf
                                <input type="hidden" name="data_alumni_id" value="{{ $user->id }}">
                                <div class="mb-3">
                                    <label class="form-label">Apakah Anda Saat Ini Sudah Bekerja?</label>
                                    <select class="form-control" name="apakah_bekerja" id="apakah_bekerja" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Ya"
                                            {{ isset($tracer) && $tracer->apakah_bekerja == 'Ya' ? 'selected' : '' }}>Ya
                                        </option>
                                        <option value="Tidak"
                                            {{ isset($tracer) && $tracer->apakah_bekerja == 'Tidak' ? 'selected' : '' }}>
                                            Tidak</option>
                                        <option value="Wirausaha"
                                            {{ isset($tracer) && $tracer->apakah_bekerja == 'Wirausaha' ? 'selected' : '' }}>
                                            Wirausaha</option>
                                    </select>
                                </div>
                                <!-- Form untuk yang sudah bekerja -->
                                <div id="form_bekerja" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">No.
                                                        HP</span></label>
                                                <input type="text" class="form-control" name="nomor_telepon"
                                                    value="{{ $tracer->nomor_telepon ?? '' }}"
                                                    placeholder="Masukkan nomor HP">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span
                                                        class="badge bg-primary">Email</span></label>
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ $tracer->email ?? '' }}" placeholder="Masukkan email">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Alamat saat
                                                        ini</span></label>
                                                <textarea class="form-control" name="alamat_saat_ini" placeholder="Masukkan alamat saat ini">{{ $tracer->alamat_saat_ini ?? '' }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Nama
                                                        perusahaan/instansi tempat bekerja</span></label>
                                                <input type="text" class="form-control" name="nama_perusahaan"
                                                    value="{{ $tracer->nama_perusahaan ?? '' }}"
                                                    placeholder="Masukkan nama perusahaan">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Alamat
                                                        perusahaan/instansi</span></label>
                                                <textarea class="form-control" name="alamat_perusahaan" placeholder="Masukkan alamat perusahaan">{{ $tracer->alamat_perusahaan ?? '' }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span
                                                        class="badge bg-primary">Posisi/jabatan</span></label>
                                                <input type="text" class="form-control" name="posisi_jabatan"
                                                    value="{{ $tracer->posisi_jabatan ?? '' }}"
                                                    placeholder="Masukkan posisi/jabatan">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Status pekerjaan
                                                        (Tetap/Kontrak/Freelance)</span></label>
                                                <select class="form-control" name="status_pekerjaan">
                                                    <option value="">Pilih Status</option>
                                                    <option value="Tetap"
                                                        {{ isset($tracer) && $tracer->status_pekerjaan == 'Tetap' ? 'selected' : '' }}>
                                                        Tetap</option>
                                                    <option value="Kontrak"
                                                        {{ isset($tracer) && $tracer->status_pekerjaan == 'Kontrak' ? 'selected' : '' }}>
                                                        Kontrak</option>
                                                    <option value="Freelance"
                                                        {{ isset($tracer) && $tracer->status_pekerjaan == 'Freelance' ? 'selected' : '' }}>
                                                        Freelance</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Jenis perusahaan
                                                        (Pemerintah/Swasta/NGO/BUMN/Wirausaha sendiri)</span></label>
                                                <select class="form-control" name="jenis_perusahaan">
                                                    <option value="">Pilih Jenis</option>
                                                    <option value="Pemerintah"
                                                        {{ isset($tracer) && $tracer->jenis_perusahaan == 'Pemerintah' ? 'selected' : '' }}>
                                                        Pemerintah</option>
                                                    <option value="Swasta"
                                                        {{ isset($tracer) && $tracer->jenis_perusahaan == 'Swasta' ? 'selected' : '' }}>
                                                        Swasta</option>
                                                    <option value="NGO"
                                                        {{ isset($tracer) && $tracer->jenis_perusahaan == 'NGO' ? 'selected' : '' }}>
                                                        NGO</option>
                                                    <option value="BUMN"
                                                        {{ isset($tracer) && $tracer->jenis_perusahaan == 'BUMN' ? 'selected' : '' }}>
                                                        BUMN</option>
                                                    <option value="Wirausaha"
                                                        {{ isset($tracer) && $tracer->jenis_perusahaan == 'Wirausaha' ? 'selected' : '' }}>
                                                        Wirausaha sendiri</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Gaji saat
                                                        ini</span></label>
                                                <input type="text" class="form-control" name="gaji"
                                                    value="{{ $tracer->gaji ?? '' }}" placeholder="Masukkan gaji">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Lama waktu dalam
                                                        mendapatkan pekerjaan pertama setelah lulus kuliah (dalam
                                                        bulan)</span></label>
                                                <input type="text" class="form-control" name="lama_mendapat_pekerjaan"
                                                    value="{{ $tracer->lama_mendapat_pekerjaan ?? '' }}"
                                                    placeholder="Masukkan lama waktu dalam bulan">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Sumber informasi
                                                        mendapatkan lowongan pekerjaan (internet, dosen, relasi,
                                                        kampus)</span></label>
                                                <select class="form-control" name="sumber_informasi_lowongan">
                                                    <option value="">Pilih Sumber</option>
                                                    <option value="Internet"
                                                        {{ isset($tracer) && $tracer->sumber_informasi_lowongan == 'Internet' ? 'selected' : '' }}>
                                                        Internet</option>
                                                    <option value="Dosen"
                                                        {{ isset($tracer) && $tracer->sumber_informasi_lowongan == 'Dosen' ? 'selected' : '' }}>
                                                        Dosen</option>
                                                    <option value="Relasi"
                                                        {{ isset($tracer) && $tracer->sumber_informasi_lowongan == 'Relasi' ? 'selected' : '' }}>
                                                        Relasi</option>
                                                    <option value="Kampus"
                                                        {{ isset($tracer) && $tracer->sumber_informasi_lowongan == 'Kampus' ? 'selected' : '' }}>
                                                        Kampus</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Apakah pekerjaan
                                                        Anda sesuai dengan bidang ilmu saat kuliah? (tidak sesuai/sangat
                                                        sesuai)</span></label>
                                                <select class="form-control" name="kesesuaian_bidang">
                                                    <option value="">Pilih Kesesuaian</option>
                                                    <option value="Tidak Sesuai"
                                                        {{ isset($tracer) && $tracer->kesesuaian_bidang == 'Tidak Sesuai' ? 'selected' : '' }}>
                                                        Tidak sesuai</option>
                                                    <option value="Kurang Sesuai"
                                                        {{ isset($tracer) && $tracer->kesesuaian_bidang == 'Kurang Sesuai' ? 'selected' : '' }}>
                                                        Kurang sesuai</option>
                                                    <option value="Sesuai"
                                                        {{ isset($tracer) && $tracer->kesesuaian_bidang == 'Sesuai' ? 'selected' : '' }}>
                                                        Sesuai</option>
                                                    <option value="Sangat Sesuai"
                                                        {{ isset($tracer) && $tracer->kesesuaian_bidang == 'Sangat Sesuai' ? 'selected' : '' }}>
                                                        Sangat sesuai</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form untuk yang belum bekerja -->
                                <div id="form_belum_bekerja" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label"><span class="badge bg-primary">Apa alasan anda belum bekerja?</span></label>
                                        <textarea class="form-control" placeholder="Masukkan alasan anda belum bekerja" name="alasan_belum_bekerja">{{ $tracer->alasan_belum_bekerja ?? '' }}</textarea>
                                    </div>
                                </div>

                                <!-- Form untuk wirausaha -->
                                <div id="form_wirausaha" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Apakah Anda menjalankan usaha sendiri?(Ya/tidak)</span></label>
                                                <select class="form-control" name="menjalankan_usaha">
                                                    <option value="">Pilih Status</option>
                                                    <option value="Ya" {{ isset($tracer) && $tracer->menjalankan_usaha == 'Ya' ? 'selected' : '' }}>Ya</option>
                                                    <option value="Tidak" {{ isset($tracer) && $tracer->menjalankan_usaha == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Jenis usaha yang dijalankan</span></label>
                                                <input type="text" class="form-control" name="jenis_usaha" placeholder="Contoh: Makanan, Fashion, Teknologi" value="{{ $tracer->jenis_usaha ?? '' }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Tahun mulai usaha</span></label>
                                                <input type="text" class="form-control" name="tahun_mulai_usaha" placeholder="Contoh: 2020" value="{{ $tracer->tahun_mulai_usaha ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Jumlah karyawan</span></label>
                                                <input type="text" class="form-control" name="jumlah_karyawan" placeholder="Contoh: 5 orang" value="{{ $tracer->jumlah_karyawan ?? '' }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Omset rata-rata per bulan</span></label>
                                                <input type="text" class="form-control" name="omset_bulanan" placeholder="Contoh: Rp 5.000.000" value="{{ $tracer->omset_bulanan ?? '' }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span class="badge bg-primary">Apa Tantangan utama dalam menjalankan usaha</span></label>
                                                <textarea class="form-control" name="tantangan_usaha" placeholder="Jelaskan tantangan utama yang Anda hadapi dalam menjalankan usaha">{{ $tracer->tantangan_usaha ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4 class="mb-0">Saran Alumni</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('lengkapi-data.saran') }}">
                                @csrf
                                <input type="hidden" name="data_alumni_id" value="{{ $user->id }}">
                                <div class="mb-3">
                                    <label class="form-label">Saran</label>
                                    <textarea class="form-control" name="saran" placeholder="Masukkan saran"></textarea>
                                </div>      
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Kirim Saran</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4 class="mb-0">Saran Saran mu</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($saran as $item)
                                <div class="chat-container text-start">
                                    <div class="chat-message user-message">
                                        <div class="message-content">
                                            <p><span class="badge bg-primary">{{ $user->nama }}</span> <span class="bg-light p-2 rounded">{{ $item->saran ?? '' }}</span></p>
                                        </div>
                                    </div>
                                    @if($item->respon)
                                    <div class="chat-message admin-message">
                                        <div class="message-content">
                                            <p><span class="badge bg-success">Respon:</span> <span class="bg-light p-2 rounded">{{ $item->respon }}</span></p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const apakahBekerjaSelect = document.getElementById('apakah_bekerja');
            const formBekerja = document.getElementById('form_bekerja');
            const formBelumBekerja = document.getElementById('form_belum_bekerja');
            const formWirausaha = document.getElementById('form_wirausaha');

            function toggleForms() {
                const selectedValue = apakahBekerjaSelect.value;

                // Sembunyikan semua form
                formBekerja.style.display = 'none';
                formBelumBekerja.style.display = 'none';
                formWirausaha.style.display = 'none';

                // Tampilkan form yang sesuai
                if (selectedValue === 'Ya') {
                    formBekerja.style.display = 'block';
                } else if (selectedValue === 'Tidak') {
                    formBelumBekerja.style.display = 'block';
                } else if (selectedValue === 'Wirausaha') {
                    formWirausaha.style.display = 'block';
                }
            }

            // Jalankan saat halaman dimuat
            toggleForms();

            // Jalankan saat select berubah
            apakahBekerjaSelect.addEventListener('change', toggleForms);
        });
    </script>
@endsection
