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
	$userID = $_COOKIE["UserID"];
	$jobID = $_POST["jobID"];
        $type = $_POST["type"]
	$rating = $_POST["starRating"];
	$feedback = $_POST["feedback"];
	
	require 'link.php';

	if($type == "customer"){
		$qry = "INSERT INTO Reviews (JobId,CustomerRating,CustomerReview) VALUES ('$jobID','$rating','$feedback')";
		$result = mysqli_query($link, $qry);
	
		if ($result){
		    echo "Review Submitted!<br>"
	   	    echo '<script type="text/javascript">
	   	    setTimeout(function(){window.location = "home.html"},2000)
	   	    </script>';
		}
		else{
		    echo 'Review sumission failed.';
		}
	}
	elseif ($type == "worker"){
		$qry = "INSERT INTO Reviews (JobId,WorkerRating,WorkerReview) VALUES ('$jobID','$rating','$feedback')";
		$result = mysqli_query($link, $qry);
		if ($result){
		    echo "Review Submitted!<br>"
	   	    echo '<script type="text/javascript">
	   	    setTimeout(function(){window.location = "home.html"},2000)
	   	    </script>';
		}
		else{
		   echo 'Review submission failed.';
		}
	}
        else{
        echo '<script type="text/javascript">window.location = "index.html"</script>';
        }
	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>
