<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รพีพงศ์ โชพลกัง(รพี)</title>
</head>

<body>
<h1>รพีพงศ์ โชพลกัง (รพี)</h1>
<form method="post" action="">
กรอกตัวเลข <input type="number" name="a" min="0" max="100" autofocus required>
<button type="submit" name="Submit"> OK</button>
</form> 

<?php
if(isset($_POST['Submit'])){
    $score = $_POST['a']; 
	
if ($score >= 80) {
$grade = "A" ;
} else if ($score >= 70) {
$grade = "B" ;
} else if ($score >= 60) {
$grade = "C" ;
} else if ($score >= 50) {
$grade = "D" ;
} else {
$grade = "F" ;
}
echo "คะแนนรวม $score ได้เกรด $grade เด้อจ้า" ;
}
?>

</body>
</html>