<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="try.css">
</head>
<body>

<div id="main">
<?php 

	session_start();
	$un = $_SESSION['usn'];
	header("Content-type: text/html; charset=utf-8");
	echo"<h1>Welcome $un<h1>";
	?>

	<div id="excl">
		<a class="hide">
		<img src="src/exclaim.png">
		<span class="show">separate searchtags with spaces, or exclude them by putting an exclaimation mark(!) before them<br><br>Currently operational tags are beer, man, woman, phone</span>
	</a>
	</div>
	<form method="post" action="">
	<input type="text" name="querry">
	<input type="submit" name="ok" value="search">
	</form>

	<?php
$excluded = array();
$terms_used = array();
if (isset($_POST['ok'])) //ha lenyomod az okét
{
	$terms = (explode(" ", $_POST['querry']));//szedje szét a post querryt és tegye azokat a terms tömbbe
	for ($i=0; $i < count($terms); ++$i) //ahány elem van a terms tömbbe
	{ 	
		$curr_term = strval($terms[$i]);	
		if (strpos($curr_term, "!") !== false)
		{
			$excluded[$i] = $curr_term;

		}else
		{
			$terms_used[$i] = $curr_term;
			$fo = opendir($terms_used[$i]);
					while ($file = readdir($fo)) 
					{
						if ($file!= "." && $file != "..") 
						{
						echo "<a href=".$terms_used[$i]."/".$file.">";
						echo "<img style ='width: 150px;' src=". $terms_used[$i]."/".$file.">";
						echo"</a> &nbsp; &nbsp;";
						}
					}
					closedir($fo);
		}
		
		
	}
}





//error_reporting(0);

?>

</div>

</body>
</html>