@extends('temaplate-web.layout')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
                    <h1>Selamat Datang di Portal Alumni UNIKS</h1>
                    <p>Portal Alumni UNIKS adalah portal yang menyediakan informasi terkait alumni UNIKS</p>
                    <div class="d-flex">
                        <button type="button" class="btn-get-started" data-bs-toggle="modal" data-bs-target="#pinModal">
                            Lengkapi Data Pekerjaan Alumni
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="pinModal" tabindex="-1" aria-labelledby="pinModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="pinModalLabel">Masukkan PIN dan NPM</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('verifikasi.index') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="pin_akses" class="form-label">PIN Anda</label>
                                                <input type="text" class="form-control" id="pin_akses" name="pin_akses"
                                                    placeholder="Masukkan PIN anda">
                                            </div>
                                            <div class="mb-3">
                                                <label for="npm" class="form-label">NPM Anda</label>
                                                <input type="text" class="form-control" id="npm" name="npm"
                                                    placeholder="Masukkan NPM anda">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Verifikasi</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img text-center" data-aos="zoom-out" data-aos-delay="100">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEizlODAh8lXFSXX29FhoUCK3LAFFfQ6l5hUuBQ10ZkVl5RN1fIAoiUX63vpcLYfCZWXLvabvXw5feuTPzs3HOW5pSVzbRoveqevTtESnuAvDW3neKiisGrmDNlXYB5l52pNP8QYvvI_XHL0B31ZcuQ38RsA_gMnOcuJ1FmSJO7pgCDzLLBi9ZAcCNkD/s320/GKL2_Universitas%20Islam%20Kuantan%20Singingi%20-%20Koleksilogo.com.jpg"
                        class="img-fluid animated mx-auto" alt="">
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->




    <!-- Lowongan Kerja Section -->
    <section id="services" class="services section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>Lowongan Kerja</span>
            <h2>Lowongan Kerja</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                @foreach ($lowongan as $item)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="text-center mb-3">
                                <img src="{{ asset('uploads/logo_perusahaan/' . $item->logo_perusahaan) }}"
                                    alt="Logo Perusahaan" class="img-fluid rounded" width="100">
                            </div>
                            <h3 class="text-center">{{ $item->nama_perusahaan }}</h3>
                            <h4 class="text-center">{{ $item->nama_lowongan }}</h4>

                            <table class="table table-bordered mt-3">
                                <tbody>
                                    <tr>
                                        <td><strong>Deskripsi</strong></td>
                                        <td>{{ $item->deskripsi }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Persyaratan</strong></td>
                                        <td>{{ $item->persyaratan }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Lokasi</strong></td>
                                        <td>{{ $item->lokasi }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gaji</strong></td>
                                        <td>Rp {{ number_format($item->gaji, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal Posting</strong></td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_posting)->isoFormat('D MMMM Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal Penutupan</strong></td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_penutupan)->isoFormat('D MMMM Y') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered">
                                <tbody>
                                    @if ($item->email_perusahaan)
                                        <tr>
                                            <td><i class="bi bi-envelope"></i></td>
                                            <td><a
                                                    href="mailto:{{ $item->email_perusahaan }}">{{ $item->email_perusahaan }}</a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($item->whatsapp_perusahaan)
                                        <tr>
                                            <td><i class="bi bi-whatsapp"></i></td>
                                            <td><a href="https://wa.me/{{ $item->whatsapp_perusahaan }}"
                                                    target="_blank">{{ $item->whatsapp_perusahaan }}</a></td>
                                        </tr>
                                    @endif
                                    @if ($item->website_perusahaan)
                                        <tr>
                                            <td><i class="bi bi-globe"></i></td>
                                            <td><a href="{{ $item->website_perusahaan }}"
                                                    target="_blank">{{ $item->website_perusahaan }}</a></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('lowongan-kerja.index') }}" class="btn btn-primary">Lihat Semua Lowongan Kerja</a>
            </div>

        </div>

    </section><!-- /Services Section -->
@endsection
