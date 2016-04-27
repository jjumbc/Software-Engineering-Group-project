<!DOCTYPE html>
<html>
	<head>
		<title>Hello!</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body>
<?php
	require 'header.php';
?>
<div id="bglayer">
<?php
	require 'link.php';
	$userID = $_COOKIE["UserID"];
	$jobID = $_POST["jobID"];
    $type = $_POST["type"];
	$rating = $_POST["starRating"];
	$feedback = $_POST["feedback"];

	if($type == "customer"){
		$qry = "INSERT INTO Reviews (JobID,CustomerRating,CustomerReview) VALUES ('$jobID','$rating','$feedback') ON DUPLICATE KEY UPDATE CustomerRating='$rating', CustomerReview='$feedback'";
		$result = mysqli_query($link, $qry);
	
		if ($result){
		    echo "Review Submitted!<br>";
	   	    echo '<script type="text/javascript">
	   	    setTimeout(function(){window.location = "home.html"},2000)
	   	    </script>';
		}
		else{
		    echo 'Review sumission failed.';
		}
	}
	elseif ($type == "worker"){
		$qry = "INSERT INTO Reviews (JobID,WorkerRating,WorkerReview) VALUES ('$jobID','$rating','$feedback') ON DUPLICATE KEY UPDATE WorkerRating='$rating', WorkerReview='$feedback'";
		$result = mysqli_query($link, $qry);
		if ($result){
		    echo "Review Submitted!<br>";
	   	    echo '<script type="text/javascript">
	   	    setTimeout(function(){window.location = "home.html"},2000)
	   	    </script>';
		}
		else{
		   echo 'Review submission failed.';
		}
	}
        else{
        echo '<script type="text/javascript">window.location = "index.php"</script>';
        }
	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>
