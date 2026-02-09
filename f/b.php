<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รพีพงศ์ โชพลกัง (รพี)</title>
</head>

<body>
<h1>รพีพงศ์ โชพลกัง (รพี)</h1>

<form method="post" action="">
    <label>กรอกตัวเลข:</label>
    <input type="text" name="a">
    <input type="submit" name="Submit" value="ตกลง">
</form>

<?php
if(isset($_POST['Submit'])){
	
    $gender = $_POST['a']; 
	
    if ($gender == 1){
        echo "เพศชาย";
	}else if($gender == 2){
        echo "เพศหญิง";
	}else if($gender == 3){
        echo "เพศทางเลือก";
	} else {
		echo "อื่น ๆ";
    }
}
?>

</body>
</html>