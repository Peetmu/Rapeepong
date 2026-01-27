<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pop Supermarket - Premium Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --glass-bg: rgba(255, 255, 255, 0.95);
            --shadow-xl: 0 20px 40px rgba(0,0,0,0.15);
        }

        body {
            font-family: 'Prompt', sans-serif;
            background: var(--primary-gradient);
            background-attachment: fixed; /* ให้พื้นหลังนิ่งเวลาเลื่อน */
            min-height: 100vh;
            padding-bottom: 50px;
        }

        /* Profile Header Design */
        .profile-header {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            margin-bottom: 30px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }

        /* Main Card Glassmorphism */
        .glass-card {
            background: var(--glass-bg);
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(255, 255, 255, 0.5);
            overflow: hidden; /* บังมุมโค้ง */
        }

        /* Custom Table Styling */
        table.dataTable thead th {
            background-color: #4e54c8 !important; /* สีหัวตาราง */
            color: white !important;
            border-bottom: none !important;
            padding: 15px !important;
            font-weight: 500;
        }
        
        table.dataTable tbody tr {
            transition: all 0.2s ease;
        }
        
        table.dataTable tbody tr:hover {
            background-color: #f1f3f9 !important;
            transform: scale(1.005); /* ขยายแถวนิดนึงตอนชี้ */
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            z-index: 10;
            position: relative;
        }

        .dataTables_wrapper .dataTables_length, 
        .dataTables_wrapper .dataTables_filter, 
        .dataTables_wrapper .dataTables_info, 
        .dataTables_wrapper .dataTables_paginate {
            padding: 15px 20px;
            color: #555;
        }

        /* Custom Badges */
        .badge-custom {
            padding: 8px 12px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.85rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container py-5">
    
    <div class="profile-header p-4 d-flex align-items-center justify-content-between animate__animated animate__fadeInDown">
        <div class="d-flex align-items-center gap-3">
            <div class="bg-white rounded-circle p-1 shadow-sm">
                <img src="https://ui-avatars.com/api/?name=Rapeepong&background=random&size=64" class="rounded-circle" width="60" alt="Profile">
            </div>
            <div>
                <h4 class="mb-0 fw-bold">ยินดีต้อนรับ, คุณรพีพงศ์ โชพลกัง (รพี)</h4>
                <small class="text-white-50"><i class="fa-solid fa-crown text-warning"></i> Administrator & Data Owner</small>
            </div>
        </div>
        <div class="d-none d-md-block text-end">
            <h1 class="mb-0 fw-bold" style="font-size: 2.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.2);">Pop Supermarket</h1>
            <span class="badge bg-warning text-dark shadow-sm">Database: 4113db</span>
        </div>
    </div>

    <div class="glass-card">
        <div class="p-4 border-bottom bg-white bg-opacity-50">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-primary mb-0"><i class="fa-solid fa-list-check me-2"></i> รายการสั่งซื้อทั้งหมด</h5>
                <button class="btn btn-primary btn-sm rounded-pill px-4 shadow-sm"><i class="fa-solid fa-plus me-1"></i> เพิ่มรายการใหม่</button>
            </div>
        </div>
        
        <div class="p-0">
            <div class="table-responsive">
                <table id="myDataTable" class="table table-borderless align-middle w-100 mb-0">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">ID</th>
                            <th width="25%">ชื่อสินค้า</th>
                            <th width="15%">หมวดหมู่</th>
                            <th width="15%">วันที่สั่งซื้อ</th>
                            <th width="20%">ประเทศ</th>
                            <th class="text-end" width="20%">ยอดเงิน (บาท)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // ----------------------------------------------------
                        // ตั้งค่าการเชื่อมต่อฐานข้อมูลตามที่คุณระบุ
                        // ----------------------------------------------------
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $db   = "4113db"; // ชื่อฐานข้อมูลของคุณ

                        $conn = mysqli_connect($host, $user, $pass, $db);

                        // เช็ค error และแสดงผลแบบสวยงาม
                        if (!$conn) {
                            echo "<tr><td colspan='6' class='text-center text-danger py-5'>
                                    <i class='fa-solid fa-triangle-exclamation fa-3x mb-3'></i><br>
                                    เชื่อมต่อฐานข้อมูลไม่ได้: " . mysqli_connect_error() . "
                                  </td></tr>";
                        } else {
                            mysqli_set_charset($conn, "utf8mb4");

                            $sql = "SELECT * FROM popsupermarket ORDER BY p_date DESC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_array($result)) {
                                    // สุ่มสี Badge ตามหมวดหมู่ (ตกแต่งเพื่อความสวยงาม)
                                    $badges = ['bg-info', 'bg-warning', 'bg-success', 'bg-primary'];
                                    $rand_bg = $badges[array_rand($badges)];

                                    echo "<tr>";
                                    echo "<td class='text-center'><span class='text-muted'>#{$row['p_order_id']}</span></td>";
                                    echo "<td>
                                            <div class='d-flex align-items-center'>
                                                <div class='bg-light rounded p-2 me-2 text-primary'><i class='fa-solid fa-box-open'></i></div>
                                                <span class='fw-bold text-dark'>{$row['p_product_name']}</span>
                                            </div>
                                          </td>";
                                    echo "<td><span class='badge {$rand_bg} text-dark badge-custom'>{$row['p_category']}</span></td>";
                                    echo "<td><i class='fa-regular fa-calendar text-muted me-1'></i>" . date('d/m/Y', strtotime($row['p_date'])) . "</td>";
                                    echo "<td><i class='fa-solid fa-earth-americas text-secondary me-1'></i>{$row['p_country']}</td>";
                                    echo "<td class='text-end'>
                                            <span class='fw-bold text-success' style='font-size:1.1rem'>฿ " . number_format($row['p_amount']) . "</span>
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center py-5 text-muted'>ยังไม่มีข้อมูลในตาราง</td></tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="text-center mt-4 text-white-50">
        <small>© 2026 Developed by Rapeepong Chopholkung (Rapee)</small>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#myDataTable').DataTable({
        "language": {
            "sProcessing":   "กำลังดำเนินการ...",
            "sLengthMenu":   "แสดง _MENU_ รายการ",
            "sZeroRecords":  "ไม่พบข้อมูล",
            "sInfo":         "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            "sInfoEmpty":    "แสดง 0 ถึง 0 จาก 0 รายการ",
            "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
            "sInfoPostFix":  "",
            "sSearch":       "<i class='fa-solid fa-search text-muted'></i> ค้นหา:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "หน้าแรก",
                "sPrevious": "ก่อนหน้า",
                "sNext":     "ถัดไป",
                "sLast":     "หน้าสุดท้าย"
            }
        },
        "pageLength": 10,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "ทั้งหมด"]],
        "responsive": true,
        "dom": '<"d-flex justify-content-between align-items-center m-3"lf>rt<"d-flex justify-content-between align-items-center m-3"ip>'
    });
});
</script>
</body>
</html>