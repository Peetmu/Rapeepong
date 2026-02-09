<?php
    // ตรวจสอบการล็อกอิน (สมมติว่า check_login.php มีโค้ด session_start() และตรวจสอบ session แล้ว)
	include_once("check_login.php");
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ - Admin Panel</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .nav-link {
            color: #555;
            font-weight: 500;
        }
        .nav-link:hover, .nav-link.active {
            color: #4e73df;
        }
        .card-order {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .status-badge {
            font-size: 0.85rem;
            padding: 5px 10px;
            border-radius: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand text-primary fw-bold" href="index2.php">
                <i class="fas fa-store me-2"></i>Admin Panel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index2.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">จัดการสินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="orders.php">จัดการออเดอร์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customers.php">จัดการลูกค้า</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <span class="me-3 text-muted">
                        <i class="fas fa-user-circle me-1"></i> <?php echo $_SESSION['aname']; ?>
                    </span>
                    <a href="logout.php" class="btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('ยืนยันการออกจากระบบ?')">
                        <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-secondary">
                <i class="fas fa-shopping-cart me-2"></i>จัดการออเดอร์
            </h2>
            <button class="btn btn-success rounded-pill shadow-sm">
                <i class="fas fa-file-export me-1"></i> Export รายงาน
            </button>
        </div>

        <div class="card card-order">
            <div class="card-header bg-white py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0 fw-bold text-primary">รายการสั่งซื้อทั้งหมด</h5>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control form-control-sm" placeholder="ค้นหาเลขที่ออเดอร์...">
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th class="ps-4">#Order ID</th>
                                <th>ลูกค้า</th>
                                <th>ยอดรวม</th>
                                <th>วันที่สั่งซื้อ</th>
                                <th>สถานะ</th>
                                <th class="text-end pe-4">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4 fw-bold">#ORD-001</td>
                                <td>คุณสมชาย ใจดี</td>
                                <td class="text-success fw-bold">฿1,500</td>
                                <td>09/02/2569</td>
                                <td><span class="badge bg-warning text-dark status-badge">รอชำระเงิน</span></td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-sm btn-info text-white" title="ดูรายละเอียด"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-primary" title="แก้ไขสถานะ"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4 fw-bold">#ORD-002</td>
                                <td>คุณรพีพงศ์ (รพี)</td>
                                <td class="text-success fw-bold">฿3,200</td>
                                <td>08/02/2569</td>
                                <td><span class="badge bg-success status-badge">จัดส่งแล้ว</span></td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-sm btn-info text-white"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white py-3">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-end mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">ก่อนหน้า</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">ถัดไป</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>