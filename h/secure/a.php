<?php
    session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รพีพงศ์ โชพลกัง(รพี)</title>
</head>

<body>
<h1>a.php</h1>

<?php
    $_SESSION['name']='รพีพงศ์ โชพลกัง';
    $_SESSION['nickname']='รพี';
    
    echo $_SESSION['name']."<br>";
    echo $_SESSION['nickname']."<br>";
?>
</body>
</html>