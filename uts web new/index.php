<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dugong Tours - Pesan Tiket Wisata Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
       
        
        /* Add any other existing styles you have */
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-umbrella-beach"></i> Dugong Tours 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#destinasi">Destinasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#paket">Paket Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#promo">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimoni">Testimoni</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php if(isset($_SESSION['user'])): ?>
                        <a href="<?php echo $_SESSION['user']['role']; ?>.php" class="btn btn-outline-primary me-2">
                            <i class="fas fa-user-circle me-1"></i> Dashboard
                        </a>
                        <a href="logout.php" class="btn btn-primary">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Video Background -->
    <header class="hero-section">
        <!-- Video Background -->
        <video autoplay muted loop playsinline preload="auto" class="video-background">
            <source src="folder foto/vidio.mp4" type="video/mp4">
            <!-- Fallback image if video doesn't play -->
            <img src="folder foto/hero-backup.jpg" alt="Travel Background">
        </video>
        
        <div class="hero-overlay"></div>
        
        <div class="container hero-content">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Jelajahi Keindahan Dunia Bersama Kami</h1>
                    <p class="lead mb-5">Temukan pengalaman liburan tak terlupakan dengan harga terbaik</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#destinasi" class="btn btn-primary btn-lg px-4 py-3">
                            <i class="fas fa-map-marked-alt me-2"></i> Lihat Destinasi
                        </a>
                        <a href="#promo" class="btn btn-outline-light btn-lg px-4 py-3">
                            <i class="fas fa-tag me-2"></i> Promo Spesial
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Search Box -->
    <div class="container">
        <div class="search-box bg-white p-4 rounded-3 shadow-lg">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Destinasi</label>
                    <select class="form-select">
                        <option selected>Pilih Destinasi</option>
                        <option>Bali</option>
                        <option>Yogyakarta</option>
                        <option>Lombok</option>
                        <option>Raja Ampat</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tanggal Check-in</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Durasi</label>
                    <select class="form-select">
                        <option selected>Pilih Durasi</option>
                        <option>3 Hari 2 Malam</option>
                        <option>4 Hari 3 Malam</option>
                        <option>5 Hari 4 Malam</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button class="btn btn-primary w-100 py-3">
                        <i class="fas fa-search me-2"></i> Cari Paket
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Destinasi Populer -->
    <section id="destinasi" class="py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="fw-bold">Destinasi Populer</h2>
                <p class="text-muted">Temukan tempat wisata terbaik untuk liburan Anda</p>
            </div>
            <div class="row">
                <!-- Destination Card 1 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="destination-card h-100">
                        <div class="position-relative">
                            <img src="folder foto/bali.jpg" class="destination-img" alt="Bali">
                            <div class="badge-tag">Best Seller</div>
                        </div>
                        <div class="destination-body">
                            <h5 class="destination-title">Bali</h5>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="destination-meta"><i class="fas fa-map-marker-alt me-1"></i> Indonesia</span>
                                <span class="destination-meta"><i class="fas fa-star text-warning me-1"></i> 4.8</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="destination-price">Rp 3.500.000</span>
                                <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Destination Card 2 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="destination-card h-100">
                        <div class="position-relative">
                            <img src="folder foto/yogyakarta1.webp" class="destination-img" alt="Yogyakarta">
                            <div class="badge-tag">Cultural</div>
                        </div>
                        <div class="destination-body">
                            <h5 class="destination-title">Yogyakarta</h5>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="destination-meta"><i class="fas fa-map-marker-alt me-1"></i> Indonesia</span>
                                <span class="destination-meta"><i class="fas fa-star text-warning me-1"></i> 4.7</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="destination-price">Rp 2.800.000</span>
                                <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Destination Card 3 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="destination-card h-100">
                        <div class="position-relative">
                            <img src="folder foto/lombok.jpeg" class="destination-img" alt="Lombok">
                            <div class="badge-tag">New</div>
                        </div>
                        <div class="destination-body">
                            <h5 class="destination-title">Lombok</h5>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="destination-meta"><i class="fas fa-map-marker-alt me-1"></i> Indonesia</span>
                                <span class="destination-meta"><i class="fas fa-star text-warning me-1"></i> 4.9</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="destination-price">Rp 4.200.000</span>
                                <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Destination Card 4 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="destination-card h-100">
                        <div class="position-relative">
                            <img src="folder foto/raja ampat.webp" class="destination-img" alt="Raja Ampat">
                            <div class="badge-tag">Luxury</div>
                        </div>
                        <div class="destination-body">
                            <h5 class="destination-title">Raja Ampat</h5>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="destination-meta"><i class="fas fa-map-marker-alt me-1"></i> Indonesia</span>
                                <span class="destination-meta"><i class="fas fa-star text-warning me-1"></i> 5.0</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="destination-price">Rp 7.500.000</span>
                                <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="#" class="btn btn-outline-primary px-4">
                    <i class="fas fa-arrow-right me-2"></i> Lihat Semua Destinasi
                </a>
            </div>
        </div>
    </section>

    <!-- Promo Section -->
    <section id="promo" class="promo-section py-5 bg-light">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="fw-bold">Promo Spesial</h2>
                <p class="text-muted">Nikmati penawaran terbaik untuk liburan Anda</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="promo-box bg-white p-4 rounded-3 h-100">
                        <div>
                            <span class="badge bg-primary text-white mb-3">Limited</span>
                            <h3 class="promo-title">Early Bird Discount</h3>
                            <p>Pesan 3 bulan sebelum keberangkatan dan dapatkan diskon hingga 30%</p>
                        </div>
                        <div class="mt-3">
                            <p class="promo-code text-primary fw-bold">Kode: EARLY30</p>
                            <small class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="promo-box bg-white p-4 rounded-3 h-100">
                        <div>
                            <span class="badge bg-success text-white mb-3">Family</span>
                            <h3 class="promo-title">Family Package</h3>
                            <p>Diskon 20% untuk paket keluarga (min. 4 orang)</p>
                        </div>
                        <div class="mt-3">
                            <p class="promo-code text-primary fw-bold">Kode: FAMILY20</p>
                            <small class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="promo-box bg-white p-4 rounded-3 h-100">
                        <div>
                            <span class="badge bg-danger text-white mb-3">Flash Sale</span>
                            <h3 class="promo-title">Weekend Getaway</h3>
                            <p>Paket liburan akhir pekan dengan harga spesial mulai dari Rp 1.500.000</p>
                        </div>
                        <div class="mt-3">
                            <p class="promo-code text-primary fw-bold">Kode: WEEKEND</p>
                            <small class="text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="fw-bold">Mengapa Memilih Kami?</h2>
                <p class="text-muted">Keunggulan yang kami tawarkan untuk pengalaman liburan terbaik</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle p-4 mb-3 mx-auto" style="width: 80px; height: 80px;">
                            <i class="fas fa-shield-alt fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Aman & Terpercaya</h5>
                        <p class="text-muted">Lebih dari 10.000 pelanggan telah mempercayai perjalanan mereka pada kami</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle p-4 mb-3 mx-auto" style="width: 80px; height: 80px;">
                            <i class="fas fa-headset fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Layanan 24/7</h5>
                        <p class="text-muted">Tim customer service kami siap membantu kapan saja</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle p-4 mb-3 mx-auto" style="width: 80px; height: 80px;">
                            <i class="fas fa-tag fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Harga Terbaik</h5>
                        <p class="text-muted">Garansi harga terbaik dengan berbagai promo menarik</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section id="testimoni" class="testimonial-section py-5 bg-light">
        <div class="container">
            <div class="section-header text-center mb-5">
            <h2 class="fw-bold text-dark">Apa Kata Mereka?</h2>
            <p class="text-dark">Testimoni dari pelanggan yang telah berlibur bersama kami</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "Liburan ke Bali bersama Dugong Tours sangat menyenangkan! Semuanya diatur dengan baik, mulai dari transportasi, hotel, sampai itinerary. Akan repeat order lagi!"
                        </div>
                        <div class="testimonial-author d-flex align-items-center mt-4">
                            <img src="folder foto/eji1.jpg" alt="Customer 1" class="rounded-circle me-3" width="60">
                            <div>
                                <h6 class="fw-bold mb-1">Buratna</h6>
                                <small class="text-muted">Traveler</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "Pertama kali pakai jasa travel online dan sangat puas dengan Dugong Tours. Harga kompetitif, pelayanan ramah, dan destinasi sesuai ekspektasi. Recommended banget!"
                        </div>
                        <div class="testimonial-author d-flex align-items-center mt-4">
                            <img src="folder foto/eji2.jpg" alt="Customer 2" class="rounded-circle me-3" width="60">
                            <div>
                                <h6 class="fw-bold mb-1">Burat</h6>
                                <small class="text-muted">Businessman</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "Paket honeymoon ke Lombok sangat worth it! Private tour dengan guide yang friendly. Sunset di Gili Trawangan bikin honeymoon kami makin sempurna. Terima kasih Dugong Tours!"
                        </div>
                        <div class="testimonial-author d-flex align-items-center mt-4">
                            <img src="folder foto/eji3.jpg" alt="Customer 3" class="rounded-circle me-3" width="60">
                            <div>
                                <h6 class="fw-bold mb-1">Eji</h6>
                                <small class="text-muted">Newlyweds</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h4 class="fw-bold">Dapatkan Info Promo Terbaru</h4>
                    <p class="text-muted mb-0">Berlangganan newsletter kami untuk mendapatkan penawaran spesial</p>
                </div>
                <div class="col-lg-6">
                    <form class="d-flex">
                        <input type="email" class="form-control me-2" placeholder="Alamat email Anda">
                        <button class="btn btn-primary px-4">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-dark text-white py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-title">Dugong Tours</h5>
                    <p>Perusahaan travel terpercaya yang membantu Anda merencanakan liburan impian dengan mudah dan nyaman.</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-title">Perusahaan</h5>
                    <ul class="footer-links list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Tentang Kami</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Blog</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Karir</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-title">Layanan</h5>
                    <ul class="footer-links list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Paket Wisata</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Tiket Pesawat</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Hotel</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Sewa Mobil</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-title">Bantuan</h5>
                    <ul class="footer-links list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Syarat & Ketentuan</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Panduan Pembayaran</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright text-center mt-5 pt-4 border-top border-secondary">
                <p class="mb-0">&copy;  Dugong Tours.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Video autoplay fallback for mobile devices
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.querySelector('.video-background');
            if (video) {
                // Try to play the video
                const promise = video.play();
                
                if (promise !== undefined) {
                    promise.catch(error => {
                        // Autoplay was prevented, show fallback image
                        video.style.display = 'none';
                        document.querySelector('.hero-section').style.backgroundImage = 'url("folder foto/hero-backup.jpg")';
                    });
                }
            }
        });
    </script>
</body>
</html>