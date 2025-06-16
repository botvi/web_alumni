@extends('temaplate-web.layout')

@section('content')

 <!-- Services Section -->
 <section id="services" class="services section light-background" style="background: #f2f2f2 url('https://assets.siakadcloud.com/assets/v1/img/pattern/pat_04.png') repeat;">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <span>Daftar Kegiatan Alumni</span>
        <h2>Daftar Kegiatan Alumni</h2>
    </div><!-- End Section Title -->

    <div class="container py-5">
        <div class="row g-4">
            @foreach ($kegiatan as $item)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative h-100 shadow-sm rounded">
                    <div class="text-center p-3">
                        <img src="{{ asset('uploads/kegiatan/'.$item->gambar) }}" alt="Gambar Kegiatan" class="img-fluid rounded" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="p-4">
                        <h4 class="text-center mb-3">Kegiatan Alumni</h4>
                        <div class="mb-3">
                            <i class="bi bi-geo-alt-fill text-primary"></i>
                            <span class="ms-2">{{ $item->tempat }}</span>
                        </div>
                        <p class="text-center mb-4">{!! Str::limit($item->deskripsi_kegiatan, 100) !!}</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#modalKegiatan{{ $item->id }}">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalKegiatan{{ $item->id }}" tabindex="-1" aria-labelledby="modalKegiatanLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalKegiatanLabel{{ $item->id }}">Detail Kegiatan Alumni</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="text-center mb-4">
                                <img src="{{ asset('uploads/kegiatan/'.$item->gambar) }}" alt="Gambar Kegiatan" class="img-fluid rounded" style="max-height: 400px; object-fit: cover;">
                            </div>
                            <h4 class="text-center mb-3">Kegiatan Alumni</h4>
                            <div class="mb-3">
                                <i class="bi bi-geo-alt-fill text-primary"></i>
                                <span class="ms-2">{{ $item->tempat }}</span>
                            </div>
                            <p class="mb-0">{!! $item->deskripsi_kegiatan !!}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section><!-- /Services Section -->
@endsection
