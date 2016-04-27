<?php
	if (!isset($_COOKIE["UserID"])) {
		echo '<script type="text/javascript">window.location = "index.php"</script>';
	}

	echo '<div id="bglayer" style="margin: 20px 100px 0px 100px;">';
	echo '<div style="overflow: auto;">';
	echo '<a href="home.php"><img class="logo" src="site_logo_small.png" width="275" style="margin: 0px 0px 0px 50px;"></a>';
	if ($_COOKIE["UserType"] == 1) {
		echo '<a href="home.php"><div id="linkcomp">User Profile</div></a>
		<a href="joblist.php"><div id="linkcomp">Search Jobs</div></a>
		<a href="createjob.php"><div id="linkcomp">Create New Job</div></a>
		<a href="admin.php"><div id="linkcompadmin">Admin Panel</div></a>
		<br><br><br><br><br>';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	else {
		echo '<a href="home.php"><div id="link">User Profile</div></a>
		<a href="joblist.php"><div id="link">Search Jobs</div></a>
		<a href="createjob.php"><div id="link">Create New Job</div></a>
		<br><br><br><br><br>';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	}

	if (isset($_COOKIE["UserName"])) {
		echo "Hello, ";
		echo $_COOKIE["UserName"];
		echo "! ";
	}
	echo '<a href="logout.php">Log Out</a></div></div><br><br>';
?>