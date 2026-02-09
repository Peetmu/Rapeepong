<?php
	include_once("check_login.php");
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการลูกค้า - Admin Panel</title>
    
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
        .avatar-circle {
            width: 40px;
            height: 40px;
            background-color: #e2e6ea;
            color: #4e73df;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .action-btn {
            width: 32px;
            height: 32px;
            padding: 0;
            line-height: 32px;
            border-radius: 50%;
            text-align: center;
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
                        <a class="nav-link" href="orders.php">จัดการออเดอร์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold text-primary" href="customers.php">จัดการลูกค้า</a>
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
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2 class="fw-bold text-secondary">
                    <i class="fas fa-users me-2"></i>รายชื่อลูกค้าสมาชิก
                </h2>
            </div>
            <div class="col-md-6 text-md-end">
                <button class="btn btn-primary rounded-pill shadow-sm px-4">
                    <i class="fas fa-user-plus me-1"></i> เพิ่มลูกค้าใหม่
                </button>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3">
                <div class="row g-2 align-items-center">
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-search text-muted"></i></span>
                            <input type="text" class="form-control border-start-0 bg-light" placeholder="ค้นหาชื่อ, เบอร์โทร หรืออีเมล...">
                        </div>
                    </div>
                    <div class="col-md-7 text-end text-muted small">
                        แสดงผล 1-10 จากทั้งหมด 54 รายการ
                    </div>
                </div>
            </div>
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th class="ps-4" width="5%">#ID</th>
                                <th width="25%">ชื่อ-นามสกุล</th>
                                <th width="15%">เบอร์โทรศัพท์</th>
                                <th width="20%">อีเมล</th>
                                <th width="15%">วันที่สมัคร</th>
                                <th width="10%" class="text-center">สถานะ</th>
                                <th width="10%" class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4 text-muted">1001</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle me-3">ร</div> <div>
                                            <div class="fw-bold">รพีพงศ์ โชพลกัง</div>
                                            <small class="text-muted">Username: rapee01</small>
                                        </div>
                                    </div>
                                </td>
                                <td>081-234-5678</td>
                                <td>rapee@example.com</td>
                                <td>01/02/2569</td>
                                <td class="text-center"><span class="badge bg-success rounded-pill">ปกติ</span></td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm action-btn" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-edit text-warning me-2"></i>แก้ไขข้อมูล</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-history text-info me-2"></i>ประวัติการซื้อ</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#" onclick="return confirm('ยืนยันการลบลูกค้ารายนี้?')"><i class="fas fa-trash-alt me-2"></i>ลบบัญชี</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="ps-4 text-muted">1002</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle me-3 bg-warning text-white">ส</div>
                                        <div>
                                            <div class="fw-bold">สมหญิง จริงใจ</div>
                                            <small class="text-muted">Username: somying88</small>
                                        </div>
                                    </div>
                                </td>
                                <td>099-876-5432</td>
                                <td>somying@mail.com</td>
                                <td>15/01/2569</td>
                                <td class="text-center"><span class="badge bg-secondary rounded-pill">แบน</span></td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm action-btn" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-edit text-warning me-2"></i>แก้ไขข้อมูล</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-history text-info me-2"></i>ประวัติการซื้อ</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt me-2"></i>ลบบัญชี</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
            </div>
            
            <div class="card-footer bg-white py-3">
                <nav>
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