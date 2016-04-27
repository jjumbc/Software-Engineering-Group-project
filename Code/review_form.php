<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Submit Review</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
	<body>
<?php
	require 'header.php';
?>

		<div id="bglayer">
		<form action="review.php" method="post">
			Star Rating<br>
			<select id="box" name="starRating" style="width: 30%;">
			  <option value="1">&#9733; (Very Poor)</option>
			  <option value="2">&#9733;&#9733; (Poor)</option>
			  <option value="3" selected>&#9733;&#9733;&#9733; (Ok)</option>
			  <option value="4">&#9733;&#9733;&#9733;&#9733; (Good)</option>
			  <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733; (Very Good)</option>
			</select><br><br>
			Feedback<br><textarea id="box" style="height: 200px" name="feedback" maxlength="512" required></textarea><br><br>
			<?php
				$jobID = $_POST["jobID"];
				$type = $_POST["type"];
				echo '<input type="hidden" name="jobID" value="' . $jobID . '">';
				echo '<input type="hidden" name="type" value="' . $type . '">';
			?>
			<input type="submit" value="Submit Review" id="submit">
		</form>
		</div>
	</body>
</html>
