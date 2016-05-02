<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Job List</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body>
<?php
	require 'header.php';
	
	$userID = $_COOKIE["UserID"];
	require 'link.php';
	if(isset($_GET["q"])) {
		$keyword = $_GET["q"];
		$placeholder = $keyword;
	}
	else {
		$keyword = '%';
		$placeholder = '';
	}
	
	if(isset($_GET["range"])) {
		$range = $_GET["range"];
	}
	else {
		$range = "max";
	}
	
	function getDistance($addressFrom, $addressTo){
		$formattedAddrFrom = str_replace(' ','+',$addressFrom);
		$formattedAddrTo = str_replace(' ','+',$addressTo);
		
		$geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false');
		$outputFrom = json_decode($geocodeFrom);
		$geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false');
		$outputTo = json_decode($geocodeTo);
		
		$latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
		$longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
		$latitudeTo = $outputTo->results[0]->geometry->location->lat;
		$longitudeTo = $outputTo->results[0]->geometry->location->lng;
		
		$theta = $longitudeFrom - $longitudeTo;
		$dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		return $miles;
}
?>

<div id="bglayer">
<br><br>
<form method="GET">
	<input type="text" id="box" name="q" placeholder="Search Job Descriptions" value="<?php echo $placeholder; ?>" style="width: 35%;">
	<select id="box" name="range" style="width: 15%;">
			  <option value="" disabled selected>Search Range</option>
			  <option value="5">5 Miles</option>
			  <option value="15">15 Miles</option>
			  <option value="25">25 Miles</option>
			  <option value="max">Unlimited</option>
	</select>
	<input type="submit" id="submit" value="Go" style="width: 5%;">
</form>
<br>
<?php

	$qry="SELECT Address1, ZipCode FROM UserInfo WHERE UserID='$userID'";
	$result = mysqli_query($link, $qry);
	$row = mysqli_fetch_assoc($result);
	$userZip = $row["ZipCode"];
	$userAddress = $row["Address1"];
	$userAddress = $userAddress . ' ' . $userZip;
	$qry="SELECT JobID, UserName, Description, Price, Date, ZipCode, Banned, Address FROM Jobs JOIN Users ON CustomerID = UserID WHERE (WorkerID IS NULL) AND NOT (CustomerID = '$userID') AND NOT (Banned = 1) AND (Description LIKE '%$keyword%') ORDER BY Date;";
	$result = mysqli_query($link, $qry);
	$count = 0;
	$jobs = 0;
	$printNoFound = false;
	if (($result) && (mysqli_num_rows($result) > 0)) {
		echo '<div class="nice-table"><table>';
		echo '<tr><th>User</th><th style="width: 40%">Job Description</th><th>Price</th><th>Date to Complete By</th><th>Location</th>';
		echo '<th>Work On Job</th></tr>';
		while($row = mysqli_fetch_row($result)) {
			$jobs++;
			$zip = $row[5];
			$address = $row[7];
			$address = $address . ' ' . $zip;
			$distance = getDistance($address,$userAddress);
			if ($range == 'max' || $range >= $distance) {
				$count++;
				echo '<tr>';
				foreach($row as $key=>$value) {
					if ($key != 0 && $key < 6) {
						if ($key == 1) {
							$qry2="SELECT UserID FROM Users WHERE UserName='$value'";
							$result2 = mysqli_query($link, $qry2);
							$row2 = mysqli_fetch_row($result2);
							$customer = $row2[0];
							$qry3="SELECT AVG(WorkerRating) FROM Reviews JOIN Jobs ON Reviews.JobID=Jobs.JobID WHERE CustomerID='$customer'";
							$result3 = mysqli_query($link, $qry3);
							$row3 = mysqli_fetch_row($result3);
							if ($row3[0]) {
								$str = $value . "<br>(" . substr($row3[0],0,3) . " / 5)";
							}
							else {
								$str = $value;
							}
							echo '<td>', $str, '</td>';
							
						}
						elseif ($key == 3) {
							echo '<td>$', $value, '</td>';
						}
						elseif ($key == 5) {
							$str = $value . "<br>(~" . substr($distance,0,5) . " miles)";
							echo '<td>', $str, '</td>';
						}
						else {
							echo '<td>', $value, '</td>';
						}
					}
				}
				echo '<td><form action="acceptjob.php" method="POST"><input type="hidden" name="jobID" value="' . $row[0] . '">
					<input type="submit" name="submit" style="width: 100%;" value="Accept Job"></form></td>';
				echo '</tr>';
				$closed = false;
			}
			else {
				if ($count == 0 && $printNoFound == false && $jobs == mysqli_num_rows($result)) {
					echo '</table></div>';
					$closed = true;
					$printNoFound = true;
					echo '<style>table,th,tr,td,div.nice-table { visibility: hidden; display: none; } </style>';
					echo '<br>No jobs found in your area! :( Try increasing the distance of your search or generalizing the job description.<br>';
				}
			}
		}
		if (!$closed) {
				echo '</table></div>';
			}
	}
	else {
		echo '<br>No jobs found in your area! :(<br>';
	}

	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>