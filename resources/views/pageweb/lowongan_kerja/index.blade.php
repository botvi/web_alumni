@extends('temaplate-web.layout')

@section('content')

 <!-- Services Section -->
 <section id="services" class="services section light-background" style="background: #f2f2f2 url('https://assets.siakadcloud.com/assets/v1/img/pattern/pat_04.png') repeat;">

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
                        <img src="{{ asset('uploads/logo_perusahaan/'.$item->logo_perusahaan) }}" alt="Logo Perusahaan" class="img-fluid rounded" width="100">
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
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_penutupan)->isoFormat('D MMMM Y') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <tbody>
                            @if($item->email_perusahaan)
                            <tr>
                                <td><i class="bi bi-envelope"></i></td>
                                <td><a href="mailto:{{ $item->email_perusahaan }}">{{ $item->email_perusahaan }}</a></td>
                            </tr>
                            @endif
                            @if($item->whatsapp_perusahaan)
                            <tr>
                                <td><i class="bi bi-whatsapp"></i></td>
                                <td><a href="https://wa.me/{{ $item->whatsapp_perusahaan }}" target="_blank">{{ $item->whatsapp_perusahaan }}</a></td>
                            </tr>
                            @endif
                            @if($item->website_perusahaan)
                            <tr>
                                <td><i class="bi bi-globe"></i></td>
                                <td><a href="{{ $item->website_perusahaan }}" target="_blank">{{ $item->website_perusahaan }}</a></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</section><!-- /Services Section -->
@endsection
