@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center"
        style="
    background-image: url('https://images.unsplash.com/photo-1559620192-032c4bc4674e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 500px;
    position: relative;
    color: #fff;">

        <div class="overlay"
            style="
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.4);">
        </div>

        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Selamat Datang di <span class="d-block">KueKeu</span></h1>
                    <p class="lead mb-4">Temukan berbagai pilihan kue lezat untuk setiap kesempatan spesial Anda. Dari ulang
                        tahun hingga pernikahan, kami punya yang terbaik untuk Anda!</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('cakes.index') }}" class="btn btn-pink btn-lg px-4">
                            <i class="fas fa-birthday-cake me-2"></i>Lihat Katalog
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Featured Cakes Section -->

    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title display-5 fw-bold text-pink d-inline-block">Kue Spesial Kami</h2>
                <p class="text-muted">Pilihan terbaik dari koleksi kue kami</p>
            </div>

            <div class="row g-4">
                @foreach ($featuredCakes as $cake)
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="position-relative">
                                <img src="{{ asset('storage/' . $cake->image) }}" class="card-img-top"
                                    alt="{{ $cake->name }}">
                                {{-- Contoh badge dinamis (optional) --}}
                                @if ($loop->first)
                                    <div class="badge bg-pink text-white position-absolute top-0 end-0 m-3">BESTSELLER</div>
                                @elseif ($loop->iteration == 2)
                                    <div class="badge bg-pink text-white position-absolute top-0 end-0 m-3">NEW</div>
                                @else
                                    <div class="badge bg-pink text-white position-absolute top-0 end-0 m-3">TRENDING</div>
                                @endif
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">{{ $cake->name }}</h5>
                                <p class="text-muted">{{ $cake->description }}</p>
                                {{-- Misal rating tetap statis dulu atau nanti dikembangkan --}}
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="ms-2 small">4.7 (128)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('cakes.index') }}" class="btn btn-outline-pink btn-lg px-5">
                    Lihat Semua Kue <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>


    <!-- About Authors Section -->
    <section class="py-5 bg-light-pink">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title display-5 fw-bold text-pink d-inline-block">Tim Kami</h2>
                <p class="text-muted">Orang-orang kreatif di balik KueKeu</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-5 mb-4 mb-md-0">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="position-relative d-inline-block mb-3">
                                <img src="{{ asset('/images/jihan.jpg') }}" alt="Author 1"
                                    class="img-fluid rounded-circle mb-3"
                                    style="width: 180px; height: 180px; object-fit: cover;">
                                <div class="position-absolute bottom-0 end-0 bg-pink text-white rounded-circle p-2"
                                    style="width: 40px; height: 40px;">
                                    <i class="fas fa-crown"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-2">Jehan Saphira</h4>
                            <h6 class="text-pink mb-3">Founder & Head Baker</h6>
                            <p class="text-muted">Jihan adalah ahli pastry dengan pengalaman lebih dari 10 tahun di industri
                                bakery. Spesialisasinya adalah kue-kue klasik dengan sentuhan modern.</p>
                            <div class="d-flex justify-content-center gap-3 mt-3">
                                <a href="https://instagram.com/iamm_jihannnn" target="_blank"
                                    class="text-pink d-flex flex-column align-items-center text-decoration-none">
                                    <i class="fab fa-instagram fa-lg"></i>
                                    <small>@iamm_jihannnn</small>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="position-relative d-inline-block mb-3">
                                <img src="{{ asset('/images/putri.jpg') }}" alt="Author 2"
                                    class="img-fluid rounded-circle mb-3"
                                    style="width: 180px; height: 180px; object-fit: cover;">
                                <div class="position-absolute bottom-0 end-0 bg-pink text-white rounded-circle p-2"
                                    style="width: 40px; height: 40px;">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-2">Putri Uza Nabila</h4>
                            <h6 class="text-pink mb-3">Creative Director</h6>
                            <p class="text-muted">Putri adalah desainer kue berbakat yang membawa kreativitas dan inovasi ke
                                setiap kreasi KueKeu. Desainnya selalu memukau dan penuh kejutan.</p>
                            <div class="d-flex justify-content-center gap-3 mt-3">
                                <a href="https://instagram.com/putriuza_19" target="_blank"
                                    class="text-pink d-flex flex-column align-items-center text-decoration-none">
                                    <i class="fab fa-instagram fa-lg"></i>
                                    <small>@putriuza_19</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title display-5 fw-bold text-pink d-inline-block">Kata Pelanggan</h2>
                <p class="text-muted">Apa yang mereka katakan tentang KueKeu</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="text-warning mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="mb-4">"Kue ulang tahun dari KueKeu membuat pesta anak saya sangat spesial! Rasanya
                                enak dan desainnya persis seperti yang saya minta."</p>
                            <div class="d-flex align-items-center">
                                <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Customer"
                                    class="rounded-circle me-3" width="50">
                                <div>
                                    <h6 class="mb-0 fw-bold">Sarah Johnson</h6>
                                    <small class="text-muted">Ibu Rumah Tangga</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="text-warning mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p class="mb-4">"Pesanan kue pernikahan kami sempurna! Semua tamu memuji rasanya. Terima
                                kasih KueKeu telah membuat hari spesial kami lebih indah."</p>
                            <div class="d-flex align-items-center">
                                <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Customer"
                                    class="rounded-circle me-3" width="50">
                                <div>
                                    <h6 class="mb-0 fw-bold">Michael Tan</h6>
                                    <small class="text-muted">Pengantin Baru</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="text-warning mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="mb-4">"Setiap bulan saya selalu pesan kue dari KueKeu untuk meeting kantor. Staf
                                saya sangat menyukainya dan selalu bertanya kapan pesan lagi!"</p>
                            <div class="d-flex align-items-center">
                                <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Customer"
                                    class="rounded-circle me-3" width="50">
                                <div>
                                    <h6 class="mb-0 fw-bold">Lisa Wong</h6>
                                    <small class="text-muted">Direktur Perusahaan</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
