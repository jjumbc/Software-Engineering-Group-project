<?php
	if (!isset($_COOKIE["UserID"])) {
		echo '<script type="text/javascript">window.location = "index.php"</script>';
	}

	echo '<div id="bglayer" style="margin: 20px 50px 0px 50px;">';
	echo '<div style="overflow: auto;">';
	echo '<a href="home.php"><img class="logo" src="site_logo_small.png" width="250"></a>';
	if ($_COOKIE["UserType"] == 1) {
		echo '<a href="home.php"><div id="linkcomp">Profile Home</div></a>
		<a href="joblist.php"><div id="linkcomp">Search Jobs</div></a>
		<a href="create_job.php"><div id="linkcomp">Create New Job</div></a>
		<a href="admin.php"><div id="linkcompadmin">Admin Panel</div></a>
		<br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	else {
		echo '<a href="home.php"><div id="link">Profile Home</div></a>
		<a href="joblist.php"><div id="link">Search Jobs</div></a>
		<a href="create_job.php"><div id="link">Create New Job</div></a>
		<br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	}

	if (isset($_COOKIE["UserName"])) {
		echo "Hello, ";
		echo $_COOKIE["UserName"];
		echo "! ";
	}
	echo '<a href="logout.php">Log Out</a></div></div><br><br>';
?>