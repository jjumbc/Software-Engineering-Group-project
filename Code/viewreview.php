<!DOCTYPE html>
<html>
	<head>
		<title>Hello!</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body background="bg.jpg">
<?php
if (!isset($_COOKIE["UserID"])) {
	echo '<script type="text/javascript">window.location = "index.html"</script>';
}
?>
<div id="login">
<?php
	$jobID = $_COOKIE["JobID"];
        setcookie("JobID", "", 1, "/");
	require 'link.php';
   
   $qry = "SELECT * FROM Reviews WHERE JobID = '$jobID'";
   $result = mysqli_query($link, $qry);
   if($result){
   echo '$result'
   }
   else{
   echo "Review hasnt been submitted for this job request yet."
   echo '<script type="text/javascript">
   setTimeout(function(){window.location = "home.html"},2000)
   </script>';
   }
?>
<br>
<br>
<br>
</div>
</body>
</html>
