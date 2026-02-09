<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รพีพงศ์ โชพลกัง(รพี)</title>
</head>

<body>
<h1>รพีพงศ์ โชพลกัง (รพี)</h1>
<form method="post" action="">
รหัสนิสิต <input type="number" name="a" >
<button type="submit" name="Submit"> OK</button>
</form> 

<?php
if(isset($_POST['Submit'])){
	
    $id = $_POST['a']; 
	$y = substr($id,0,2);
	echo"<imgsrc='http://202.28.32.211/picture/{$y}/{$id}.jpg' width='400'>";
}
?>

</body>
</html>
