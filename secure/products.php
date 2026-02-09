<?php
	include_once("check_login.php");	
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการสินค้า - Admin Panel</title>
    
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
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(78, 115, 223, 0.05);
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
                        <a class="nav-link active fw-bold text-primary" href="products.php">จัดการสินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orders.php">จัดการออเดอร์</a>
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
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2 class="fw-bold text-secondary">
                    <i class="fas fa-box-open me-2"></i>รายการสินค้าทั้งหมด
                </h2>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="frm_insert_product.php" class="btn btn-success rounded-pill shadow-sm px-4">
                    <i class="fas fa-plus-circle me-1"></i> เพิ่มสินค้าใหม่
                </a>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3">
                <div class="row g-2">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-search text-muted"></i></span>
                            <input type="text" class="form-control border-start-0 bg-light" placeholder="ค้นหาชื่อสินค้า...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select bg-light">
                            <option selected>หมวดหมู่ทั้งหมด</option>
                            <option value="1">เสื้อผ้า</option>
                            <option value="2">ของใช้</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th class="ps-4" width="5%">#ID</th>
                                <th width="10%">รูปภาพ</th>
                                <th width="30%">ชื่อสินค้า</th>
                                <th width="15%">หมวดหมู่</th>
                                <th width="15%" class="text-end">ราคา</th>
                                <th width="10%" class="text-center">สต็อก</th>
                                <th width="15%" class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4">101</td>
                                <td>
                                    <img src="https://via.placeholder.com/150" alt="Product" class="product-img">
                                </td>
                                <td>
                                    <div class="fw-bold">เสื้อยืด Oversize</div>
                                    <small class="text-muted">รหัส: T-001</small>
                                </td>
                                <td><span class="badge bg-info text-dark bg-opacity-25 border border-info">เสื้อผ้า</span></td>
                                <td class="text-end fw-bold text-success">฿250.00</td>
                                <td class="text-center">
                                    <span class="badge bg-success rounded-pill">150</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="#" class="btn btn-sm btn-outline-warning" title="แก้ไข">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-danger" title="ลบ" onclick="return confirm('ยืนยันการลบสินค้านี้?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="ps-4">102</td>
                                <td>
                                    <img src="https://via.placeholder.com/150" alt="Product" class="product-img">
                                </td>
                                <td>
                                    <div class="fw-bold">กางเกงยีนส์ขาสั้น</div>
                                    <small class="text-muted">รหัส: P-002</small>
                                </td>
                                <td><span class="badge bg-info text-dark bg-opacity-25 border border-info">เสื้อผ้า</span></td>
                                <td class="text-end fw-bold text-success">฿390.00</td>
                                <td class="text-center">
                                    <span class="badge bg-danger rounded-pill">5</span> </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="#" class="btn btn-sm btn-outline-warning"><i class="fas fa-pen"></i></a>
                                        <a href="#" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
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