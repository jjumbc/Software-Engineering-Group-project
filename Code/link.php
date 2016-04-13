<?php
	$link = new mysqli("localhost", "root", "secret", "VeriHandyDB");
	if (!$link) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>

