<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'staff') {
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
    <title>Staff Dashboard - Wonderland Tours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .staff-header {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            border-radius: 15px;
            color: white;
        }
        .booking-card {
            transition: all 0.3s ease;
            border-left: 4px solid;
        }
        .booking-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .booking-status {
            font-weight: 500;
            padding: 3px 10px;
            border-radius: 10px;
            font-size: 0.8rem;
        }
        .quick-form {
            background-color: #f8f9fa;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fas fa-umbrella-beach me-2"></i>Dugong Tours
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
                        <a class="nav-link active" href="staff.php"><i class="fas fa-tachometer-alt me-1"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-calendar-check me-1"></i> Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-users me-1"></i> Pelanggan</a>
                    </li>
                </ul>
                <div class="ms-3">
                    <div class="dropdown">
                        <button class="btn btn-light rounded-pill dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                            <i class="fas fa-user-tie me-2"></i>
                            <span><?php echo $name; ?></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
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
        <div class="staff-header p-4 mb-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="fw-bold mb-2">Halo, <?php echo $name; ?>!</h3>
                    <p class="mb-0">Ada 5 booking baru hari ini dan 12 booking yang perlu dikonfirmasi</p>
                </div>
                <div class="col-md-4 text-end">
                    <img src="folder foto/eji3.jpg" alt="Staff" style="max-height: 150px;">
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="fas fa-calendar-day text-primary fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Booking Hari Ini</h6>
                                <h3 class="mb-0 fw-bold">5</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-info bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="fas fa-calendar-alt text-info fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Booking Bulan Ini</h6>
                                <h3 class="mb-0 fw-bold">42</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="fas fa-clock text-warning fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Perlu Konfirmasi</h6>
                                <h3 class="mb-0 fw-bold">12</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="fas fa-users text-success fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Total Pelanggan</h6>
                                <h3 class="mb-0 fw-bold">87</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold"><i class="fas fa-list text-primary me-2"></i> Booking Terbaru</h5>
                <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID Booking</th>
                                <th>Pelanggan</th>
                                <th>Paket</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="booking-card" style="border-left-color: #28a745;">
                                <td class="fw-bold">#BK-230715</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="folder foto/eji1.jpg" alt="User" class="rounded-circle me-2" width="32">
                                        Budi Santoso
                                    </div>
                                </td>
                                <td>Bali 3D2N</td>
                                <td>15 Jul 2023</td>
                                <td><span class="booking-status bg-success bg-opacity-10 text-success">Confirmed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">Detail</button>
                                </td>
                            </tr>
                            <tr class="booking-card" style="border-left-color: #ffc107;">
                                <td class="fw-bold">#BK-230714</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="folder foto/eji3.jpg" alt="User" class="rounded-circle me-2" width="32">
                                        Ani Wijaya
                                    </div>
                                </td>
                                <td>Yogyakarta 4D3N</td>
                                <td>25 Aug 2023</td>
                                <td><span class="booking-status bg-warning bg-opacity-10 text-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">Detail</button>
                                </td>
                            </tr>
                            <tr class="booking-card" style="border-left-color: #dc3545;">
                                <td class="fw-bold">#BK-230713</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="folder foto/eji2.jpg" alt="User" class="rounded-circle me-2" width="32">
                                        Citra Dewi
                                    </div>
                                </td>
                                <td>Lombok 5D4N</td>
                                <td>10 Sep 2023</td>
                                <td><span class="booking-status bg-danger bg-opacity-10 text-danger">Cancelled</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">Detail</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Booking Form -->
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-bolt text-primary me-2"></i> Aksi Cepat</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-primary text-start py-3" data-bs-toggle="modal" data-bs-target="#newBookingModal">
                                <i class="fas fa-plus-circle me-2"></i> Buat Booking Baru
                            </a>
                            <a href="#" class="btn btn-outline-primary text-start py-3">
                                <i class="fas fa-search me-2"></i> Cari Pelanggan
                            </a>
                            <a href="#" class="btn btn-outline-primary text-start py-3">
                                <i class="fas fa-file-invoice-dollar me-2"></i> Buat Invoice
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-ticket-alt text-primary me-2"></i> Buat Tiket Cepat</h5>
                    </div>
                    <div class="card-body">
                        <form class="quick-form p-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Paket Wisata</label>
                                    <select class="form-select">
                                        <option selected>Pilih Paket</option>
                                        <option>Bali 3D2N</option>
                                        <option>Yogyakarta 4D3N</option>
                                        <option>Lombok 5D4N</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jumlah Orang</label>
                                    <input type="number" class="form-control" min="1" value="1">
                                </div>
                                <div class="col-md-6 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary w-100">Proses</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Booking Modal -->
    <div class="modal fade" id="newBookingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Buat Booking Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Telepon</label>
                                <input type="tel" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Paket Wisata</label>
                                <select class="form-select">
                                    <option selected>Pilih Paket</option>
                                    <option>Bali 3D2N</option>
                                    <option>Yogyakarta 4D3N</option>
                                    <option>Lombok 5D4N</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Keberangkatan</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Jumlah Orang</label>
                                <input type="number" class="form-control" min="1" value="1">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Catatan Khusus</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>