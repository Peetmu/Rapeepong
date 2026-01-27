<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สรุปข้อมูลการสมัคร - Rapeepong Group</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        /* CSS Theme เดิม */
        :root { --primary-color: #0f2027; --accent-color: #d4af37; }
        body { font-family: 'Kanit', sans-serif; background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 40px 0; color: #333; }
        .summary-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); max-width: 800px; width: 100%; overflow: hidden; animation: slideUp 0.8s ease-out; }
        @keyframes slideUp { from { transform: translateY(50px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .card-header-success { background: linear-gradient(45deg, #11998e, #38ef7d); padding: 30px; text-align: center; color: white; }
        .success-icon { font-size: 4rem; margin-bottom: 10px; text-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        .data-label { font-weight: 600; color: var(--primary-color); width: 35%; }
        .data-value { color: #555; }
        .table-custom tr td { padding: 15px; border-bottom: 1px solid rgba(0,0,0,0.05); vertical-align: top; }
        .btn-back { background-color: var(--primary-color); color: white; border-radius: 50px; padding: 10px 30px; transition: all 0.3s; }
        .btn-back:hover { background-color: #d4af37; color: white; transform: scale(1.05); }
    </style>
</head>
<body>

<?php
// ตรวจสอบว่ามีการ Submit เข้ามาจริง
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ----------------------------------------------------
    // รับค่าตัวแปร (ตั้งชื่อตัวแปร PHP ให้ตรงกับ name ใน HTML)
    // ----------------------------------------------------
    $position      = $_POST['position'] ?? '-';
    $prefix        = $_POST['prefix'] ?? '';
    $firstname     = $_POST['firstname'] ?? '-';
    $lastname      = $_POST['lastname'] ?? '-';
    $dob           = $_POST['dob'] ?? '-';
    $education     = $_POST['education'] ?? '-';
    $specialSkills = $_POST['specialSkills'] ?? '-';
    $experience    = $_POST['experience'] ?? '-';
    $otherInfo     = $_POST['otherInfo'] ?? '-';

    // ----------------------------------------------------
    // การแสดงผล (Mapping Values)
    // ----------------------------------------------------
    $prefix_map = ['mr' => 'นาย', 'ms' => 'นางสาว', 'mrs' => 'นาง'];
    $show_prefix = $prefix_map[$prefix] ?? $prefix;

    $edu_map = [
        'highschool' => 'มัธยมศึกษาตอนปลาย / ปวช.',
        'diploma'    => 'อนุปริญญา / ปวส.',
        'bachelor'   => 'ปริญญาตรี',
        'master'     => 'ปริญญาโท',
        'doctorate'  => 'ปริญญาเอก'
    ];
    $show_edu = $edu_map[$education] ?? $education;

    $position_map = [
        'ceo_assistant'     => 'ผู้ช่วยกรรมการผู้จัดการ',
        'marketing_manager' => 'ผู้จัดการฝ่ายการตลาด',
        'senior_dev'        => 'นักพัฒนาซอฟต์แวร์อาวุโส',
        'ux_ui'             => 'นักออกแบบประสบการณ์ผู้ใช้',
        'hr_specialist'     => 'ผู้เชี่ยวชาญด้านทรัพยากรบุคคล',
        'accountant'        => 'นักบัญชีอาวุโส'
    ];
    $show_position = $position_map[$position] ?? $position;

    // จัดการวันที่ให้แสดงสวยงาม
    $show_dob = $dob;
    if($dob != '-' && $dob != '') {
        $dateObj = date_create($dob);
        $show_dob = date_format($dateObj, "d/m/Y");
    }

} else {
    // ถ้าเปิดไฟล์ f.php โดยตรง ให้เด้งกลับไปหน้าฟอร์ม
    echo "กรุณากรอกข้อมูลผ่านแบบฟอร์ม";
    exit;
}
?>

    <div class="container d-flex justify-content-center">
        <div class="summary-card">
            
            <div class="card-header-success">
                <div class="success-icon"><i class="bi bi-check-circle-fill"></i></div>
                <h2>Application Received</h2>
                <p class="mb-0">บันทึกข้อมูลเรียบร้อยแล้ว</p>
            </div>

            <div class="p-4 p-md-5">
                <h4 class="mb-4 text-center" style="color: var(--accent-color);">สรุปข้อมูลผู้สมัคร</h4>
                
                <div class="table-responsive">
                    <table class="table table-custom table-borderless">
                        <tbody>
                            <tr>
                                <td class="data-label">ชื่อ - นามสกุล</td>
                                <td class="data-value">
                                    <?php echo $show_prefix . " " . htmlspecialchars($firstname) . " " . htmlspecialchars($lastname); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="data-label">ตำแหน่งที่สมัคร</td>
                                <td class="data-value">
                                    <span class="badge bg-dark text-warning p-2">
                                        <?php echo $show_position; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="data-label">วันเดือนปีเกิด</td>
                                <td class="data-value"><?php echo $show_dob; ?></td>
                            </tr>
                            <tr>
                                <td class="data-label">ระดับการศึกษา</td>
                                <td class="data-value"><?php echo $show_edu; ?></td>
                            </tr>
                            <tr>
                                <td class="data-label">ความสามารถพิเศษ</td>
                                <td class="data-value"><?php echo nl2br(htmlspecialchars($specialSkills)); ?></td>
                            </tr>
                            <tr>
                                <td class="data-label">ประสบการณ์ทำงาน</td>
                                <td class="data-value"><?php echo nl2br(htmlspecialchars($experience)); ?></td>
                            </tr>
                            <tr>
                                <td class="data-label">ข้อมูลอื่นๆ</td>
                                <td class="data-value"><?php echo nl2br(htmlspecialchars($otherInfo)); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4">
                    <a href="javascript:history.back()" class="btn btn-back text-decoration-none">
                        <i class="bi bi-arrow-left"></i> กลับหน้าหลัก
                    </a>
                </div>
            </div>

        </div>
    </div>
</body>
</html>