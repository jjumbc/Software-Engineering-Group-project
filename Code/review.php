<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Hello!</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body background="bg.jpg">

<div id="login">
<?php
	$jobID = 
	$userID = $_SESSION["UserID"];
	$rating = $_POST["starRating"];
	$feedback = $_POST["feedback"];
	
	require 'link.php';

	if( USER IS THE CUSTOMER ){
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
	else{
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
	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>
