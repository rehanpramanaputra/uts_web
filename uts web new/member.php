<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'member') {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['user']['username'];
$name = $_SESSION['user']['name'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard - Dugong Tours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .profile-header {
            background: linear-gradient(135deg, #1a73e8 0%,rgb(0, 0, 0) 100%);
            border-radius: 15px;
            color: white;
        }
        .trip-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .trip-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .trip-img {
            height: 150px;
            object-fit: cover;
        }
        .badge-pill {
            border-radius: 10px;
            padding: 5px 10px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fas fa-umbrella-beach me-2"></i>Dugon Tours
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-home me-1"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="member.php"><i class="fas fa-tachometer-alt me-1"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-suitcase me-1"></i> Paket Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-heart me-1"></i> Wishlist</a>
                    </li>
                </ul>
                <div class="ms-3">
                    <div class="dropdown">
                        <button class="btn btn-light rounded-pill dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                            <img src="folder foto/eji3.jpg" alt="User" class="rounded-circle me-2" width="32" height="32">
                            <span><?php echo $name; ?></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profil Saya</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container py-4">
        <!-- Welcome Section -->
        <div class="profile-header p-4 mb-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="fw-bold mb-2">Selamat datang, <?php echo $name; ?>!</h3>
                    <p class="mb-0">Ada 2 pesanan aktif dan 1 pesanan yang akan datang</p>
                </div>
                <div class="col-md-4 text-end">
                    <img src="folder foto/eji3.jpg" alt="Travel" style="max-height: 150px;">
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="fas fa-shopping-bag text-primary fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Total Pesanan</h6>
                                <h3 class="mb-0 fw-bold">5</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="fas fa-plane text-success fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Pesanan Aktif</h6>
                                <h3 class="mb-0 fw-bold">2</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="fas fa-gift text-warning fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Poin Reward</h6>
                                <h3 class="mb-0 fw-bold">1,250</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Trips -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0 fw-bold"><i class="fas fa-calendar-alt text-primary me-2"></i> Perjalanan Mendatang</h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <!-- Trip 1 -->
                    <div class="col-md-6">
                        <div class="trip-card card h-100">
                            <img src="folder foto/bali.jpg" class="trip-img card-img-top" alt="Bali">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">Bali 3D2N</h5>
                                    <span class="badge bg-primary bg-opacity-10 text-primary badge-pill">Confirmed</span>
                                </div>
                                <p class="text-muted mb-3"><i class="fas fa-map-marker-alt me-2"></i>Denpasar, Bali</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <small class="text-muted">Tanggal</small>
                                        <p class="mb-0 fw-bold">15 - 17 Jul 2023</p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Trip 2 -->
                    <div class="col-md-6">
                        <div class="trip-card card h-100">
                            <img src="folder foto/yogyakarta1.webp" class="trip-img card-img-top" alt="Yogyakarta">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">Yogyakarta 4D3N</h5>
                                    <span class="badge bg-warning bg-opacity-10 text-warning badge-pill">Pending</span>
                                </div>
                                <p class="text-muted mb-3"><i class="fas fa-map-marker-alt me-2"></i>Yogyakarta</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <small class="text-muted">Tanggal</small>
                                        <p class="mb-0 fw-bold">25 - 28 Aug 2023</p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Promo -->
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-bolt text-primary me-2"></i> Aksi Cepat</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-outline-primary text-start py-3">
                                <i class="fas fa-search me-2"></i> Cari Paket Wisata
                            </a>
                            <a href="#" class="btn btn-outline-primary text-start py-3">
                                <i class="fas fa-heart me-2"></i> Lihat Wishlist
                            </a>
                            <a href="#" class="btn btn-outline-primary text-start py-3">
                                <i class="fas fa-history me-2"></i> Riwayat Pesanan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-tag text-primary me-2"></i> Promo Spesial</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3 p-3 bg-light rounded">
                            <img src="folder foto/promo.jpg" alt="Promo" class="rounded me-3" width="80">
                            <div>
                                <h6 class="mb-1 fw-bold">Diskon 20% Bali</h6>
                                <small class="text-muted">Kode: <span class="fw-bold">BALI20</span></small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-3 bg-light rounded">
                            <img src="folder foto/promo.jpg" alt="Promo" class="rounded me-3" width="80">
                            <div>
                                <h6 class="mb-1 fw-bold">Cashback 10%</h6>
                                <small class="text-muted">Kode: <span class="fw-bold">WONDER10</span></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>