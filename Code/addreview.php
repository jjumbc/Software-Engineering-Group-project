<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy</title>
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
			$qry = "SELECT WorkerID FROM Jobs WHERE JobID='$jobID'";
			$result2 = mysqli_query($link, $qry);
			$row = mysqli_fetch_assoc($result2);
			$worker = $row["WorkerID"];
			$qry = "UPDATE Alerts SET Reviewed=1 WHERE UserID='$worker'";
			$result3 = mysqli_query($link, $qry);
	   	    echo '<script type="text/javascript">
	   	    setTimeout(function(){window.location = "reviews.php"},2000)
	   	    </script>';
		}
		else{
		    echo 'Review submission failed.';
		}
	}
	elseif ($type == "worker"){
		$qry = "INSERT INTO Reviews (JobID,WorkerRating,WorkerReview) VALUES ('$jobID','$rating','$feedback') ON DUPLICATE KEY UPDATE WorkerRating='$rating', WorkerReview='$feedback'";
		$result = mysqli_query($link, $qry);
		if ($result){
		    echo "Review Submitted!<br>";
			$qry = "SELECT CustomerID FROM Jobs WHERE JobID='$jobID'";
			$result2 = mysqli_query($link, $qry);
			$row = mysqli_fetch_assoc($result2);
			$customer = $row["CustomerID"];
			$qry = "UPDATE Alerts SET Reviewed=1 WHERE UserID='$customer'";
			$result3 = mysqli_query($link, $qry);
	   	    echo '<script type="text/javascript">
	   	    setTimeout(function(){window.location = "reviews.php"},2000)
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
