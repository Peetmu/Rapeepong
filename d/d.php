<<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ฟอร์มสมัครสมาชิก -- รพีพงศ์ โชพลกัง (รพี)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #dfe9f3 0%, #ffffff 100%);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
    }
    .form-card {
      background: #fff;
      padding: 40px;
      border-radius: 25px;
      box-shadow: 0 15px 35px rgba(0,0,0,0.1);
      max-width: 650px;
      width: 100%;
      animation: fadeIn 0.8s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    h1 {
      font-weight: 700;
      text-align: center;
      margin-bottom: 25px;
      color: #3a4d7a;
    }
    .color-preview {
      width: 50px;
      height: 25px;
      display: inline-block;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-left: 10px;
    }
  </style>
</head>
<body>

<div class="form-card">
  <h1>ฟอร์มสมัครสมาชิก</h1>
  <form method="post" action="">

    <div class="mb-3">
      <label class="form-label">ชื่อ-สกุล</label>
      <input type="text" name="fullname" class="form-control" required autofocus>
    </div>

    <div class="mb-3">
      <label class="form-label">เบอร์โทร</label>
      <input type="text" name="phone" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">ความสูง (ซม.)</label>
      <input type="number" name="height" class="form-control" min="100" max="220" required>
    </div>

    <div class="mb-3">
      <label class="form-label">สีที่ชอบ</label>
      <input type="color" name="color" class="form-control form-control-color" onchange="document.getElementById('preview').style.background = this.value;">
      <span id="preview" class="color-preview"></span>
    </div>

    <div class="mb-3">
      <label class="form-label">สาขาวิชา</label>
      <select name="major" class="form-select">
        <option value="การบัญชี">การบัญชี</option>
        <option value="การจัดการ">การจัดการ</option>
        <option value="การตลาด">การตลาด</option>
        <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
      </select>
    </div>

    <div class="d-flex gap-2 mt-4">
      <button type="submit" name="Submit" class="btn btn-primary w-100">สมัครสมาชิก</button>
      <button type="reset" class="btn btn-secondary w-100">Reset</button>
    </div>

    <div class="d-flex gap-2 mt-3">
      <button type="button" class="btn btn-info w-100" onclick="window.location='https://www.msu.ac.th';">Go to MSU</button>
      <button type="button" class="btn btn-dark w-100" onclick="window.print();">พิมพ์</button>
    </div>

  </form>

  <hr class="my-4">

  <?php
  if(isset($_POST['Submit'])){
    $fullname =$_POST['fullname'];
    $phone =$_POST['phone'];
    $height =$_POST['height'];
    $color =$_POST['color'];
    $major =$_POST['major'];

    echo "<div class='alert alert-success'>";
    echo "<h4 class='alert-heading'>ผลลัพธ์การสมัคร</h4>";
    echo "ชื่อ-นามสกุล: $fullname<br>";
    echo "เบอร์โทร: $phone<br>";
    echo "ความสูง: $height ซม.<br>";
    echo "สีที่ชอบ: $color <div class='color-preview' style='background:$color'></div><br>";
    echo "สาขาวิชา: $major<br>";
    echo "</div>";
  }
  ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>