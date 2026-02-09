<?php
session_start();

// ตรวจสอบว่ามี session id หรือไม่ ถ้าไม่มีให้ดีดกลับไปหน้า Login
if (empty($_SESSION['aid'])) {
    echo "<script>";
    echo "alert('กรุณาเข้าสู่ระบบก่อน');";
    echo "window.location='index.php';";
    echo "</script>";
    exit(); // จบการทำงานทันที
}
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>หน้าหลักแอดมิน - Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background: linear-gradient(90deg, #4e73df 0%, #224abe 100%);
            color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .card-stat {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s;
            color: white;
            overflow: hidden;
        }
        .card-stat:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        .bg-primary-gradient { background: linear-gradient(45deg, #4e73df, #224abe); }
        .bg-success-gradient { background: linear-gradient(45deg, #1cc88a, #13855c); }
        .bg-warning-gradient { background: linear-gradient(45deg, #f6c23e, #dda20a); }
        .bg-danger-gradient { background: linear-gradient(45deg, #e74a3b, #be2617); }
        
        .admin-name {
            font-weight: 600;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                <i class="fas fa-user-shield me-2"></i>Admin Panel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-3">
                        <span class="text-white">
                            สวัสดี, <span class="admin-name"><?php echo $_SESSION['aname']; ?></span>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-light btn-sm rounded-pill text-primary fw-bold px-3 shadow-sm" onclick="return confirm('ยืนยันการออกจากระบบ?')">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-secondary">
                <i class="fas fa-tachometer-alt me-2"></i>ภาพรวมระบบ
            </h2>
            <div class="text-muted">
                ข้อมูล ณ วันที่ <?php echo date("d/m/Y"); ?>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card card-stat bg-primary-gradient h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1" style="opacity: 0.8;">สมาชิกทั้งหมด</h6>
                                <h2 class="mb-0 fw-bold">1,250</h2>
                            </div>
                            <div class="fs-1 opacity-50"><i class="fas fa-users"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stat bg-success-gradient h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1" style="opacity: 0.8;">ยอดขายเดือนนี้</h6>
                                <h2 class="mb-0 fw-bold">฿45,000</h2>
                            </div>
                            <div class="fs-1 opacity-50"><i class="fas fa-dollar-sign"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stat bg-warning-gradient h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1" style="opacity: 0.8;">รอตรวจสอบ</h6>
                                <h2 class="mb-0 fw-bold">18</h2>
                            </div>
                            <div class="fs-1 opacity-50"><i class="fas fa-clipboard-list"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stat bg-danger-gradient h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1" style="opacity: 0.8;">แจ้งปัญหา</h6>
                                <h2 class="mb-0 fw-bold">5</h2>
                            </div>
                            <div class="fs-1 opacity-50"><i class="fas fa-comments"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold text-primary">รายการล่าสุด</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle me-2"></i>
                    ยินดีต้อนรับคุณ <strong><?php echo $_SESSION['aname']; ?></strong> เข้าสู่ระบบหลังบ้าน "รพีพงศ์ โชพลกัง (รพี)"
                </div>
                <p>คุณสามารถเริ่มจัดการข้อมูลได้จากเมนู หรือดูสรุปภาพรวมได้จาก Dashboard ด้านบน</p>
                
                <div class="table-responsive mt-3">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>รายการ</th>
                                <th>สถานะ</th>
                                <th>วันที่</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>ตัวอย่างข้อมูล 1</td>
                                <td><span class="badge bg-success rounded-pill">สำเร็จ</span></td>
                                <td><?php echo date("d/m/Y"); ?></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>