<?php
session_start();

// ตรวจสอบการ Login (ย้ายมาไว้บนสุดเพื่อความสะอาดของโค้ด)
if (isset($_POST['Submit'])) {
    include_once("connectdb.php");
    
    // ป้องกัน SQL Injection เบื้องต้น (แนะนำให้ทำ)
    $username = mysqli_real_escape_string($conn, $_POST['auser']);
    $password = mysqli_real_escape_string($conn, $_POST['apwd']);

    $sql = "SELECT * FROM admin WHERE a_username='$username' AND a_password='$password' LIMIT 1";
    $rs = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($rs);

    if ($num == 1) {
        $data = mysqli_fetch_array($rs);
        $_SESSION['aid'] = $data['a_id'];
        $_SESSION['aname'] = $data['a_name'];
        echo "<script>";
        echo "window.location='index2.php'";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('รหัสผ่านไม่ถูกต้อง');";
        echo "</script>";
    }
}
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login: รพีพงศ์ โชพลกัง (รพี)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;500&display=swap" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            align_items: center;
            justify_content: center;
            font-family: 'Sarabun', sans-serif;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }
        .card-header {
            background-color: #4e73df;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 1.2rem;
            font-weight: 500;
        }
        .btn-custom {
            background-color: #4e73df;
            border-color: #4e73df;
            color: white;
            transition: all 0.3s;
        }
        .btn-custom:hover {
            background-color: #2e59d9;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card login-card">
                <div class="card-header">
                    เข้าสู่ระบบหลังบ้าน<br>
                    <small style="font-size: 0.8em; opacity: 0.9;">รพีพงศ์ โชพลกัง (รพี)</small>
                </div>
                <div class="card-body p-4">
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="auser" class="form-label text-secondary">Username</label>
                            <input type="text" class="form-control" name="auser" id="auser" placeholder="กรอกชื่อผู้ใช้" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label for="apwd" class="form-label text-secondary">Password</label>
                            <input type="password" class="form-control" name="apwd" id="apwd" placeholder="กรอกรหัสผ่าน" required>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="Submit" class="btn btn-custom btn-lg">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3 bg-light text-muted" style="font-size: 0.8rem;">
                    &copy; <?php echo date("Y"); ?> Admin Panel
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>