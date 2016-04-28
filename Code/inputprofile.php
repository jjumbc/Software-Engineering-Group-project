<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Edit Profile</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body>
<?php
	require 'header.php';
?>
  <div id="login">
    <form action="editprofile.php" method="post">
	  <h2>Edit Profile</h2>
	  <h4>Insert new information where desired.</h4>
	  <h4>However, you must input your current password:</h4>
      <input type="password" id="box" name="pass" placeholder="Current Password (required)" style="width: 45%" pattern=".{6,24}" required title="Password must be between 6 and 24 characters."><br><br><br>
      <fieldset class="group">
	  <legend>Change Password</legend>
	  <input type="password" id="box" name="newPass" placeholder="New Password" style="width: 55%" pattern=".{6,24}" title="Password must be between 6 and 24 characters."><br>
	  <input type="password" id="box" name="newPass2" placeholder="Confirm New Password" style="width: 55%" pattern=".{6,24}" title="Password must be between 6 and 24 characters.">
	  </fieldset><br>
	  <fieldset class="group">
	  <legend>Change My Info</legend>
	  <?php
	  $userID = $_COOKIE["UserID"];
	  require "link.php";

	  $qry="SELECT * FROM UserInfo WHERE UserID='$userID'";
	  $result = mysqli_query($link, $qry);
	  $row = mysqli_fetch_assoc($result);

	  $firstname = $row["FirstName"];
	  $lastname = $row["LastName"];
	  $address1 = $row["Address1"];
	  $address2 = $row["Address2"];
	  $city = $row["City"];
	  $state = $row["State"];
	  $zipcode = $row["ZipCode"];
	  $email = $row["Email"];
	  $phonenumber = $row["Phonenumber"];

      echo "<input type=\"text\" id=\"box\" name=\"first\" placeholder='$firstname' style=\"width: 49%\" pattern=\"[A-Za-z-']+\" title=\"Name must only be letters, dashes, and apostrophes.\">
      <input type=\"text\" id=\"box\" name=\"last\" placeholder='$lastname' style=\"width: 50%\" pattern=\"[A-Za-z-']+\" title=\"Name must only be letters, dashes, and apostrophes.\"><br>
      <br>
      <input type=\"text\" id=\"box\" name=\"address1\" placeholder='$address1' pattern=\"[1-9][0-9]{0,4} [A-Za-z- \.]+\" title=\"House number must precede street name\"><br>
      <input type=\"text\" id=\"box\" name=\"address2\" placeholder='$address2'><br>
      <br>
      <input type=\"text\" id=\"box\" name=\"city\" placeholder='$city' style=\"width: 69%\"> <select id=\"box\" style=\"width: 30%\" name=\"state\">
        <option value=\"\">
		  State
		</option>
		<option value=\"AL\"";
        if ($state == "AL") echo " selected";
        echo ">
          Alabama
        </option>
        <option value=\"AK\"";
        if ($state == "AK") echo " selected";
        echo ">
          Alaska
        </option>
        <option value=\"AZ\"";
        if ($state == "AZ") echo " selected";
        echo ">
          Arizona
        </option>
        <option value=\"AR\"";
        if ($state == "AR") echo " selected";
        echo ">
          Arkansas
        </option>
        <option value=\"CA\"";
        if ($state == "CA") echo " selected";
        echo ">
          California
        </option>
        <option value=\"CO\"";
        if ($state == "CO") echo " selected";
        echo ">
          Colorado
        </option>
        <option value=\"CT\"";
        if ($state == "CT") echo " selected";
        echo ">
          Connecticut
        </option>
        <option value=\"DE\"";
        if ($state == "DE") echo " selected";
        echo ">
          Delaware
        </option>
        <option value=\"DC\"";
        if ($state == "DC") echo " selected";
        echo ">
          District Of Columbia
        </option>
        <option value=\"FL\"";
        if ($state == "FL") echo " selected";
        echo ">
          Florida
        </option>
        <option value=\"GA\"";
        if ($state == "GA") echo " selected";
        echo ">
          Georgia
        </option>
        <option value=\"HI\"";
        if ($state == "HI") echo " selected";
        echo ">
          Hawaii
        </option>
        <option value=\"ID\"";
        if ($state == "ID") echo " selected";
        echo ">
          Idaho
        </option>
        <option value=\"IL\"";
        if ($state == "IL") echo " selected";
        echo ">
          Illinois
        </option>
        <option value=\"IN\"";
        if ($state == "IN") echo " selected";
        echo ">
          Indiana
        </option>
        <option value=\"IA\"";
        if ($state == "IA") echo " selected";
        echo ">
          Iowa
        </option>
        <option value=\"KS\"";
        if ($state == "KS") echo " selected";
        echo ">
          Kansas
        </option>
        <option value=\"KY\"";
        if ($state == "KY") echo " selected";
        echo ">
          Kentucky
        </option>
        <option value=\"LA\"";
        if ($state == "LA") echo " selected";
        echo ">
          Louisiana
        </option>
        <option value=\"ME\"";
        if ($state == "ME") echo " selected";
        echo ">
          Maine
        </option>
        <option value=\"MD\"";
        if ($state == "MD") echo " selected";
        echo ">
          Maryland
        </option>
        <option value=\"MA\"";
        if ($state == "MA") echo " selected";
        echo ">
          Massachusetts
        </option>
        <option value=\"MI\"";
        if ($state == "MI") echo " selected";
        echo ">
          Michigan
        </option>
        <option value=\"MN\"";
        if ($state == "MN") echo " selected";
        echo ">
          Minnesota
        </option>
        <option value=\"MS\"";
        if ($state == "MS") echo " selected";
        echo ">
          Mississippi
        </option>
        <option value=\"MO\"";
        if ($state == "MO") echo " selected";
        echo ">
          Missouri
        </option>
        <option value=\"MT\"";
        if ($state == "MT") echo " selected";
        echo ">
          Montana
        </option>
        <option value=\"NE\"";
        if ($state == "NE") echo " selected";
        echo ">
          Nebraska
        </option>
        <option value=\"NV\"";
        if ($state == "NV") echo " selected";
        echo ">
          Nevada
        </option>
        <option value=\"NH\"";
        if ($state == "NH") echo " selected";
        echo ">
          New Hampshire
        </option>
        <option value=\"NJ\"";
        if ($state == "NJ") echo " selected";
        echo ">
          New Jersey
        </option>
        <option value=\"NM\"";
        if ($state == "NM") echo " selected";
        echo ">
          New Mexico
        </option>
        <option value=\"NY\"";
        if ($state == "NY") echo " selected";
        echo ">
          New York
        </option>
        <option value=\"NC\"";
        if ($state == "NC") echo " selected";
        echo ">
          North Carolina
        </option>
        <option value=\"ND\"";
        if ($state == "ND") echo " selected";
        echo ">
          North Dakota
        </option>
        <option value=\"OH\"";
        if ($state == "OH") echo " selected";
        echo ">
          Ohio
        </option>
        <option value=\"OK\"";
        if ($state == "OK") echo " selected";
        echo ">
          Oklahoma
        </option>
        <option value=\"OR\"";
        if ($state == "OR") echo " selected";
        echo ">
          Oregon
        </option>
        <option value=\"PA\"";
        if ($state == "PA") echo " selected";
        echo ">
          Pennsylvania
        </option>
        <option value=\"RI\"";
        if ($state == "RI") echo " selected";
        echo ">
          Rhode Island
        </option>
        <option value=\"SC\"";
        if ($state == "SC") echo " selected";
        echo ">
          South Carolina
        </option>
        <option value=\"SD\"";
        if ($state == "SD") echo " selected";
        echo ">
          South Dakota
        </option>
        <option value=\"TN\"";
        if ($state == "TN") echo " selected";
        echo ">
          Tennessee
        </option>
        <option value=\"TX\"";
        if ($state == "TX") echo " selected";
        echo ">
          Texas
        </option>
        <option value=\"UT\"";
        if ($state == "UT") echo " selected";
        echo ">
          Utah
        </option>
        <option value=\"VT\"";
        if ($state == "VT") echo " selected";
        echo ">
          Vermont
        </option>
        <option value=\"VA\"";
        if ($state == "VA") echo " selected";
        echo ">
          Virginia
        </option>
        <option value=\"WA\"";
        if ($state == "WA") echo " selected";
        echo ">
          Washington
        </option>
        <option value=\"WV\"";
        if ($state == "WV") echo " selected";
        echo ">
          West Virginia
        </option>
        <option value=\"WI\"";
        if ($state == "WI") echo " selected";
        echo ">
          Wisconsin
        </option>
        <option value=\"WY\"";
        if ($state == "WY") echo " selected";
        echo ">
          Wyoming
        </option>
      </select><br>
      <br>
      <input type=\"text\" id=\"box\" name=\"zip\" placeholder='$zipcode' pattern=\"[0-9]{5}\" title=\"Must be 5 digits\"><br>
      <br>
      <input type=\"email\" id=\"box\" name=\"email\" placeholder='$email'><br>
      <br>
      <input type=\"tel\" id=\"box\" name=\"tel\" placeholder='$phonenumber'><br>
      <br>";
      ?>
      </fieldset>
      <input type="submit" value="Submit" id="submit">
    </form><br>
  </div>
  <br>
  <br>
</body>
</html>