<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
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
    <title>Admin Dashboard - Dugong Tours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        :root {
            --primary-blue: #1a73e8;
            --secondary-blue: #4285f4;
            --light-blue: #e8f0fe;
            --dark-blue: #0d47a1;
            --admin-gradient: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .admin-navbar {
            background: var(--admin-gradient);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .welcome-card {
            background: var(--admin-gradient);
            border-radius: 10px;
            color: white;
        }
        
        .stat-card {
            border-radius: 10px;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .data-table {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .data-table th {
            border-top: none;
            font-weight: 600;
            color: var(--primary-blue);
        }
        
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .badge-admin {
            background-color: var(--light-blue);
            color: var(--primary-blue);
        }
        
        .chart-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark admin-navbar">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-umbrella-beach me-2"></i> Dugong Tours
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-users-cog"></i> Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-boxes"></i> Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-chart-bar"></i> Reports</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                            <i class="fas fa-user-shield me-1"></i> <?php echo $name; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        <!-- Welcome Card -->
        <div class="welcome-card p-4 mb-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="fw-bold mb-3">Welcome back, <?php echo $name; ?>!</h2>
                    <p class="mb-0">Here's what's happening with your business today.</p>
                </div>
                <div class="col-md-4 text-end">
                    <img src="folder foto/eji2.jpg  " alt="Admin" style="max-height: 150px;">
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="stat-card card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
                                <i class="fas fa-wallet"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Total Revenue</h6>
                                <h3 class="mb-0 fw-bold">Rp42.5jt</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-success bg-opacity-10 text-success me-3">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Total Bookings</h6>
                                <h3 class="mb-0 fw-bold">127</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-info bg-opacity-10 text-info me-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Active Users</h6>
                                <h3 class="mb-0 fw-bold">89</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 text-muted">Destinations</h6>
                                <h3 class="mb-0 fw-bold">8</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="chart-container">
                    <h5 class="fw-bold mb-4"><i class="fas fa-chart-line text-primary me-2"></i> Monthly Bookings</h5>
                    <canvas id="bookingChart" height="250"></canvas>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="chart-container">
                    <h5 class="fw-bold mb-4"><i class="fas fa-chart-pie text-primary me-2"></i> Package Distribution</h5>
                    <canvas id="packageChart" height="250"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Users -->
        <div class="card data-table mb-4">
            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold"><i class="fas fa-users text-primary me-2"></i> Recent Users</h5>
                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Join Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="folder foto/eji1.jpg" alt="User" class="user-avatar me-2">
                                        Budi Santoso
                                    </div>
                                </td>
                                <td>budi@email.com</td>
                                <td><span class="badge bg-primary">Member</span></td>
                                <td>15 Jul 2023</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="folder foto/eji1.jpg" alt="User" class="user-avatar me-2">
                                        aqia wijaya
                                    </div>
                                </td>
                                <td>ani@email.com</td>
                                <td><span class="badge bg-primary">Member</span></td>
                                <td>14 Jul 2023</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="folder foto/eji1.jpg" alt="User" class="user-avatar me-2">
                                        Citra Dewi
                                    </div>
                                </td>
                                <td>citra@email.com</td>
                                <td><span class="badge bg-primary">Member</span></td>
                                <td>13 Jul 2023</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="folder foto/eji1.jpg" alt="User" class="user-avatar me-2">
                                        Dodi Pratama
                                    </div>
                                </td>
                                <td>dodi@email.com</td>
                                <td><span class="badge bg-warning text-dark">Staff</span></td>
                                <td>10 Jul 2023</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="card data-table">
            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold"><i class="fas fa-calendar-check text-primary me-2"></i> Recent Bookings</h5>
                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Customer</th>
                                <th>Package</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">#BK-230715</td>
                                <td>Budi Santoso</td>
                                <td>Bali 3D2N</td>
                                <td>15 Jul 2023</td>
                                <td>Rp 3.500.000</td>
                                <td><span class="badge bg-success">Confirmed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">#BK-230714</td>
                                <td>Ani Wijaya</td>
                                <td>Yogyakarta 4D3N</td>
                                <td>25 Aug 2023</td>
                                <td>Rp 2.800.000</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">#BK-230713</td>
                                <td>Citra Dewi</td>
                                <td>Lombok 5D4N</td>
                                <td>10 Sep 2023</td>
                                <td>Rp 4.200.000</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Package Modal -->
    <div class="modal fade" id="addPackageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add New Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Package Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Destination</label>
                                <select class="form-select" required>
                                    <option value="">Select Destination</option>
                                    <option>Bali</option>
                                    <option>Yogyakarta</option>
                                    <option>Lombok</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Duration</label>
                                <select class="form-select" required>
                                    <option value="">Select Duration</option>
                                    <option>2D1N</option>
                                    <option>3D2N</option>
                                    <option>4D3N</option>
                                    <option>5D4N</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Package Type</label>
                                <select class="form-select" required>
                                    <option value="">Select Type</option>
                                    <option>Regular</option>
                                    <option>Premium</option>
                                    <option>VIP</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Main Image</label>
                                <input type="file" class="form-control" accept="image/*" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Additional Images</label>
                                <input type="file" class="form-control" accept="image/*" multiple>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="featured">
                                    <label class="form-check-label" for="featured">
                                        Featured Package
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Package</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Booking Chart
        const bookingCtx = document.getElementById('bookingChart').getContext('2d');
        const bookingChart = new Chart(bookingCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Bookings',
                    data: [45, 60, 75, 90, 85, 95, 110],
                    backgroundColor: 'rgba(26, 115, 232, 0.7)',
                    borderColor: 'rgba(26, 115, 232, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Package Distribution Chart
        const packageCtx = document.getElementById('packageChart').getContext('2d');
        const packageChart = new Chart(packageCtx, {
            type: 'doughnut',
            data: {
                labels: ['Bali', 'Yogyakarta', 'Lombok', 'Raja Ampat'],
                datasets: [{
                    data: [35, 25, 20, 20],
                    backgroundColor: [
                        'rgba(26, 115, 232, 0.7)',
                        'rgba(66, 133, 244, 0.7)',
                        'rgba(100, 181, 246, 0.7)',
                        'rgba(174, 203, 250, 0.7)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</body>
</html>