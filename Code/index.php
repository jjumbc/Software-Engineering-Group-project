<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
	
	<body>
	<?php
	if (isset($_COOKIE["UserID"])) {
	echo '<script type="text/javascript">window.location = "home.php"</script>';
	}
	?>
		<div id="bglayer" style="margin: 20px 100px 0px 100px;">
			<div style="overflow: auto;">
				<img src="site_logo_small.png" width="300" style="margin-right: 40px>
				<a href="register.html"><div id="link">Register</div></a>
				<a href="login.html"><div id="link">Login</div></a>
			</div>
		</div>

		<div id="bglayer">
			Hello, and welcome to VeriHandy! VeriHandy is a service that connects skilled working men and women to people who need some work done in and around the home.<br><br>
			Here you can find jobs related to yard work, such as snow shovelling, lawn mowing, weeding, watering, and more, including small jobs inside the home.<br>
		</div>
		
		<div id="bglayer">
			Just register or log in to get started!<br><br>
			VeriHandy was designed and developed by the VeriHandy Development team at University of Maryland, Baltimore County for Shawn Squire.<br>
		</div>
	</body>
</html>