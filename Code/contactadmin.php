<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Contact Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
	<body>
		<?php
			require 'header.php';
		?>

		<div id="bglayer">
		We're here to help! Feel free to send us a message with any questions or issues you may have.<br><br>
		<form action="send.php" method="post">
			Message<br><textarea id="box" style="height: 200px" name="feedback" maxlength="512" required></textarea><br><br>
			<input type="submit" value="Send Message" id="submit">
		</form>
		</div>
	</body>
</html>
