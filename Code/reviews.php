<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Review</title>
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
	$jobID = $_POST["jobID"];
   	$type = $_POST["type"];

   $qry = "SELECT * FROM Reviews WHERE JobID='$jobID'";
   $result = mysqli_query($link, $qry);
   if($result) {
	$row = mysqli_fetch_assoc($result);
	$worker = $row["WorkerReview"];
	$workerStar = $row["WorkerRating"];
	$customer = $row["CustomerReview"];
	$customerStar = $row["CustomerRating"];
	echo "<h2>Customer Feedback</h2>";
	if ($customer != NULL) {
		echo "Rating: ";
		if ($customerStar == 1){
			echo "&#9733; (Very Poor)";
		}
		elseif ($customerStar == 2){
			echo "&#9733;&#9733; (Poor)";
		}
		elseif ($customerStar == 3){
			echo "&#9733;&#9733;&#9733; (Ok)";
		}
		elseif ($customerStar == 4){
			echo "&#9733;&#9733;&#9733;&#9733;&#9733; (Good)";
		}
		elseif ($custmerStar == 5){
			echo "&#9733;&#9733;&#9733;&#9733;&#9733;&#9733; (Very Good)";
		}
		echo "<br><br>";
		echo $customer;
	}
	else{
		if ($type == "customer"){
			echo '<form action="review_form.php" method="POST"><input type="hidden" name="jobID" value="' . $jobID . '"><input type="hidden" name="type" value="' . $type . '">
			<input type="submit" name="submit" style="width: 25%;" value="Write Review"></form>';
		}
		else {
			echo "No review has been submmitted yet.";
		}
	}
	echo "<br><h2>Worker Feedback</h2>";
	if ($worker != NULL) {
		echo "Star Rating: ";
		if ($workerStar == 1){
			echo "&#9733;";
		}
		elseif ($workerStar == 2){
			echo "&#9733;&#9733;";
		}
		elseif ($workerStar == 3){
			echo "&#9733;&#9733;&#9733;";
		}
		elseif ($workerStar == 4){
			echo "&#9733;&#9733;&#9733;&#9733;&#9733;";
		}
		elseif ($workerStar == 5){
			echo "&#9733;&#9733;&#9733;&#9733;&#9733;&#9733;";
		}
		echo "<br><br>";
		echo $worker;
	}
	else{
		if ($type == "worker"){
			echo '<form action="review_form.php" method="POST"><input type="hidden" name="jobID" value="' . $jobID . '"><input type="hidden" name="type" value="' . $type . '">
			<input type="submit" name="submit" style="width: 25%;" value="Write Review"></form>';
		}
		else {
			echo "No review has been submmitted yet.";
		}
	}
   }
   else{
   	echo '<script type="text/javascript">window.location = "index.php"</script>';
   }
?>
<br>
<br>
<br>
</div>
</body>
</html>
