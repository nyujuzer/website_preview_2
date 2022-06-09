<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<meta charset="utf-8">
</head>
<body>
<?php 

session_start();
header("Content-type: text/html; charset=utf-8");
error_reporting(0);

  $logininfo = array();
  if (isset($_POST['ok'])) 
  {
   
   $pw = $_POST["pass"]; 
   $un = $_POST['username'];
   $filename = "passwords/".$un;
   $file = fopen($filename, "r") or die ("<a href='register.php'> Click here to register!</a>");
     
     $jsz = fread($file, filesize($filename));
     fclose($file);

     


       if ($pw === $jsz)
       {

      $_SESSION['usn'] = $un;
      $_SESSION['pw'] = $pw;
        header("Location: logged-in.php");
       }else
       {
         echo "HIBÁS JELSZÓ!";
       }
	}

 ?>




</body>
</html>