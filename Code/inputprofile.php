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
	  <h4>Insert new information where desired.</h4><br>
      <input type="password" id="box" name="pass" placeholder="Current Password (required)" style="width: 45%" pattern=".{6,24}" required title="Password must be between 6 and 24 characters."><br><br>
	  <input type="password" id="box" name="newPass" placeholder="New Password" style="width: 55%" pattern=".{6,24}" title="Password must be between 6 and 24 characters."><br>
	  <input type="password" id="box" name="newPass2" placeholder="Confirm New Password" style="width: 55%" pattern=".{6,24}" title="Password must be between 6 and 24 characters."><br>
	  <br>
      <input type="text" id="box" name="first" placeholder="First Name" style="width: 49%" pattern="[A-Za-z-']+" title="Name must only be letters, dashes, and apostrophes.">
      <input type="text" id="box" name="last" placeholder="Last Name" style="width: 50%" pattern="[A-Za-z-']+" title="Name must only be letters, dashes, and apostrophes."><br>
      <br>
      <input type="text" id="box" name="address1" placeholder="Address (Line 1)" pattern="[1-9][0-9]{0,4} [A-Za-z- \.]+" title="House number must precede street name"><br>
      <input type="text" id="box" name="address2" placeholder="Address (Line 2)"><br>
      <br>
      <input type="text" id="box" name="city" placeholder="City/Town" style="width: 69%"> <select id="box" style="width: 30%" name="state">
        <option value="">
		  State
		</option>
		<option value="AL">
          Alabama
        </option>
        <option value="AK">
          Alaska
        </option>
        <option value="AZ">
          Arizona
        </option>
        <option value="AR">
          Arkansas
        </option>
        <option value="CA">
          California
        </option>
        <option value="CO">
          Colorado
        </option>
        <option value="CT">
          Connecticut
        </option>
        <option value="DE">
          Delaware
        </option>
        <option value="DC">
          District Of Columbia
        </option>
        <option value="FL">
          Florida
        </option>
        <option value="GA">
          Georgia
        </option>
        <option value="HI">
          Hawaii
        </option>
        <option value="ID">
          Idaho
        </option>
        <option value="IL">
          Illinois
        </option>
        <option value="IN">
          Indiana
        </option>
        <option value="IA">
          Iowa
        </option>
        <option value="KS">
          Kansas
        </option>
        <option value="KY">
          Kentucky
        </option>
        <option value="LA">
          Louisiana
        </option>
        <option value="ME">
          Maine
        </option>
        <option value="MD">
          Maryland
        </option>
        <option value="MA">
          Massachusetts
        </option>
        <option value="MI">
          Michigan
        </option>
        <option value="MN">
          Minnesota
        </option>
        <option value="MS">
          Mississippi
        </option>
        <option value="MO">
          Missouri
        </option>
        <option value="MT">
          Montana
        </option>
        <option value="NE">
          Nebraska
        </option>
        <option value="NV">
          Nevada
        </option>
        <option value="NH">
          New Hampshire
        </option>
        <option value="NJ">
          New Jersey
        </option>
        <option value="NM">
          New Mexico
        </option>
        <option value="NY">
          New York
        </option>
        <option value="NC">
          North Carolina
        </option>
        <option value="ND">
          North Dakota
        </option>
        <option value="OH">
          Ohio
        </option>
        <option value="OK">
          Oklahoma
        </option>
        <option value="OR">
          Oregon
        </option>
        <option value="PA">
          Pennsylvania
        </option>
        <option value="RI">
          Rhode Island
        </option>
        <option value="SC">
          South Carolina
        </option>
        <option value="SD">
          South Dakota
        </option>
        <option value="TN">
          Tennessee
        </option>
        <option value="TX">
          Texas
        </option>
        <option value="UT">
          Utah
        </option>
        <option value="VT">
          Vermont
        </option>
        <option value="VA">
          Virginia
        </option>
        <option value="WA">
          Washington
        </option>
        <option value="WV">
          West Virginia
        </option>
        <option value="WI">
          Wisconsin
        </option>
        <option value="WY">
          Wyoming
        </option>
      </select><br>
      <br>
      <input type="text" id="box" name="zip" placeholder="Zip Code" pattern="[0-9]{5}" title="Must be 5 digits"><br>
      <br>
      <input type="email" id="box" name="email" placeholder="E-mail Address"><br>
      <br>
      <input type="tel" id="box" name="tel" placeholder="Contact Phone #"><br>
      <br>
      <input type="submit" value="Submit" id="submit">
    </form><br>
  </div>
  <br>
  <br>
</body>
</html>