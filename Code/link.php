<?php
	$link = new mysqli("localhost", "root", "secret", "VerihandyDB");
	if (!$link) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>

