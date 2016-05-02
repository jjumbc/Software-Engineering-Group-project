<?php
	if (!isset($_COOKIE["UserID"])) {
		echo '<script type="text/javascript">window.location = "index.php"</script>';
	}

	echo '<div id="bglayer" style="margin: 20px 100px 0px 100px; padding: 30px;">';
	echo '<div style="overflow: auto;">';
	echo '<a href="home.php"><img class="logo" src="site_logo_small.png"></img></a>';
	if ($_COOKIE["UserType"] == 1) {
		echo '<a href="viewprofile.php"><div id="linkcomp">User Profile</div></a>
		<a href="joblist.php"><div id="linkcomp">Search Jobs</div></a>
		<a href="createjob.php"><div id="linkcomp">Create New Job</div></a>
		<a href="admin.php"><div id="linkcompadmin">Admin Panel</div></a>';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	else {
		echo '<a href="viewprofile.php"><div id="link">User Profile</div></a>
		<a href="joblist.php"><div id="link">Search Jobs</div></a>
		<a href="createjob.php"><div id="link">Create New Job</div></a>';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	
	echo '<div style="float: right; margin-right: 20px;">';
	if (isset($_COOKIE["UserName"])) {
		echo "Hello, ";
		echo $_COOKIE["UserName"];
		echo "! ";
	}
	echo '<a href="logout.php">Log Out</a></div></div></div><br><br>';
?>