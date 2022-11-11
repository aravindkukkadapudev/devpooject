<?php

// include the connection streamm
$hostname="localhost";
// giving the username 
$username="id17534838_root"; 
// password to log into database
$password="Bommarillu@1";
// database name 
$dbname="id17534838_nec"; 
// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname );
// Check connection
if ($conn->connect_error) {
 
die("Something went wrong, Connecting is not established");
} 

// read the form field
$action = $_REQUEST["action"];

// if this is an add, set all the fields to null
if ($action == 'a') {
	$cusID = null;
	$cusFirst = null;
	$cusLast = null;
	$cusStreet = null;
	$cusZip = null;
	$cusSex= 'u';
	$cusAge = null;
	$cusMM = null;
	$cusDD= null;
	$cusYY= null;
	$cusComment= null;
 } else {
// read the variable to retrieve the id
	$id = $_REQUEST["id"];
// for an update, read the record and set all fields to the correct valuae
	 	$query = "select * from cusTab where cusID = $id";
		$result = mysqli_query($conn, $query)
			or die(mysqli_error());
		$row = mysqli_fetch_assoc($result);
		$cusFirst = $row['cusFirst'];  
		$cusLast = $row['cusLast'];  
		$cusStreet = $row['cusStreet'];  
		$cusZip = $row['cusZip'];
		$cusSex = $row['cusSex'];
		$cusSource = $row['cusSource'];
		$cusAge = $row['cusAge'];
		$cusMM = substr($row['cusBirth'],5,2);
		$cusDD = substr($row['cusBirth'],8,2);
		$cusYY = substr($row['cusBirth'],0,4);
		$cusComment = $row['cusComment'];
} // end if

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Customer Entry</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="JavaScript" type="text/JavaScript">
<!--

function VerifyForm(form) {

 	if (form.cusFirst.value == "") {
 	    alert('First Name is required');
 	    form.cusFirst.focus();
		return false;
 	}
 	if (form.cusLast.value == "") {
 	    alert('Last Name is required');
 	    form.cusLast.focus();
		return false;
 	}
 	if (form.cusStreet.value == "") {
 	    alert('Street is required');
 	    form.cusStreet.focus();
		return false;
 	}
 	if (form.cusZip.value == "") {
 	    alert('Zip is required');
 	    form.cusZip.focus();
		return false;
 	}
	if (isNaN(form.cusZip.value)) {
 	    alert('Zip Invalid');
 	    form.cusZip.focus();
		return false;
 	}
	
	if (form.cusZip.value.length < 5) {
 	    alert('Zip is invalid');
 	    form.cusZip.focus();
		return false;
 	}

	if (form.cusZip.value < 00501) {
 	    alert('Zip is invalid');
 	    form.cusZip.focus();
		return false;
 	}
	if (form.cusZip.value > 99951) {
 	    alert('Zip is invalid');
 	    form.cusZip.focus();
		return false;
 	}
	if (isNaN(form.cusMM.value)) {
 	    alert('Date Invalid');
 	    form.cusMM.focus();
		return false;
 	}
	if (form.cusMM.value < 1) {
 	    alert('Date Invalid');
 	    form.cusMM.focus();
		return false;
 	}
	if (form.cusMM.value > 12) {
 	    alert('Date Invalid');
 	    form.cusMM.focus();
		return false;
 	}
	if (isNaN(form.cusDD.value)) {
 	    alert('Date Invalid');
 	    form.cusDD.focus();
		return false;
 	}

	if (form.cusDD.value < 1) {
 	    alert('Date Invalid');
 	    form.cusDD.focus();
		return false;
 	}
	if (form.cusDD.value > 31) {
 	    alert('Date Invalid');
 	    form.cusDD.focus();
		return false;
 	}
	if (isNaN(form.cusYY.value)) {
 	    alert('Date Invalid');
 	    form.cusYY.focus();
		return false;
 	}
	
	if (form.cusYY.value < 1900) {
 	    alert('Date Invalid');
 	    form.cusYY.focus();
		return false;
 	}
	if (form.cusYY.value > 2010) {
 	    alert('Date Invalid');
 	    form.cusYY.focus();
		return false;
 	}
	
	if (CountWords(form.cusComment, true, true) > 25)  {
 	    alert('Comment can not exceed 20 words');
 	    form.cusComment.focus();
		return false;
 	} 	


}

function CountWords (this_field, show_word_count, show_char_count) {
if (show_word_count == null) {
show_word_count = true;
}
if (show_char_count == null) {
show_char_count = false;
}
var char_count = this_field.value.length;
var fullStr = this_field.value + " ";
var initial_whitespace_rExp = /^[^A-Za-z0-9]+/gi;
var left_trimmedStr = fullStr.replace(initial_whitespace_rExp, "");
var non_alphanumerics_rExp = rExp = /[^A-Za-z0-9]+/gi;
var cleanedStr = left_trimmedStr.replace(non_alphanumerics_rExp, " ");
var splitString = cleanedStr.split(" ");
var word_count = splitString.length -1;
if (fullStr.length <2) {
word_count = 0;
}

return word_count;
}
//-->
</script>
</head>

<body>
<h1>Please Enter Customer Information</h1>
<form action="customerJ_action4.php" method="get" name="form" onSubmit="return VerifyForm(this)">
  <table width="59%" border="0" cellspacing="0" cellpadding="5">
    <tr> 
      <td width="24%"><font size="4">First Name</font></td>
      <td width="76%"><input name="cusFirst" type="text" id="cusFirst" value="<?php echo $cusFirst;?>" size="20" maxlength="20" required></td>
    </tr>
    <tr> 
      <td><font size="4">Last Name</font></td>
      <td><input name="cusLast" type="text" id="cusLast" value="<?php echo $cusLast;?>" size="25" maxlength="25" required></td>
    </tr>
    <tr> 
      <td><font size="4">Street</font></td>
      <td><input name="cusStreet" type="text" id="cusStreet" value="<?php echo $cusStreet;?>" size="40" maxlength="40" required></td>
    </tr>
    <tr> 
      <td><font size="4">Zip</font></td>
      <td><input name="cusZip" type="text" id="cusZip" value="<?php echo $cusZip;?>" size="8" maxlength="5" required></td>
    </tr>
    <tr>
      <td><font size="4">Sex</font></td>
      <td><p>
        <label>
          <input type="radio" name="cusSex" value="m" id="cusSex_0" <?php if ($cusSex == "m") {echo " checked ";}?> >
          Male</label>
        <br>
        <label>
          <input type="radio" name="cusSex" value="f" id="cusSex_1" <?php if ($cusSex == "f") {echo " checked ";}?> >
          Female</label>
        <br>
        <label>
          <input name="cusSex" type="radio" id="cusSex_2" value="u" <?php if ($cusSex == "u") {echo " checked ";}?> >
          Not Given</label>
        <br>
      </p></td>
    </tr>
    <tr> 
      <td><font size="4">Source</font></td>
      <td><label>
        <select name="cusSource" id="select">
    

<?php 
	
$query = "SELECT * FROM srcTab order by srcName";
	$result = mysqli_query($conn, $query) or die(mysqli_error());
	while ($row = mysqli_fetch_array($result)) {
		$srcID = $row['srcID'];
		$srcName = $row['srcName'];
		if ($srcID == $cusSource) {
			$selected = " Selected ";
		} else {
			$selected = NULL;
		}
		$option = '<option value="' . $srcID . '"' .  $selected . '>' . $srcName . '</option>';
		echo $option . "\n";
	} // end while
?>
                 
        </select>
      </label></td>
    </tr>
    <tr> 
      <td><font size="4">Age</font></td>
      <td><input name="cusAge" type="text" id="cusAge" value="<?php echo $cusAge;?>" size="4" maxlength="2"></td>
    </tr>
    <tr>
      <td><font size="4">Birthday</font></td>
      <td><label>
      <input name="cusMM" type="text" id="cusMM" value="<?php echo $cusMM;?>" size="3" maxlength="2">
      - 
      <input name="cusDD" type="text" id="cusDD" value="<?php echo $cusDD;?>" size="3" maxlength="2">
      - 
      <input name="cusYY" type="text" id="cusYY" value="<?php echo $cusYY;?>" size="5" maxlength="4">
      mm dd yyyy</label></td>
    </tr>
    <tr>
      <td><font size="4">Comment</font></td>
      <td><label>
        <textarea name="cusComment" id="cusComment" cols="45" rows="3"><?php echo $cusComment;?></textarea>
      </label></td>
    </tr>
    <tr> 
      <td><input name="action" type="hidden" id="action" value="<?php echo $action;?>" />
        <input name="id" type="hidden" id="id" value="<?php echo $id;?>" /></td>
      <td><input type="submit" name="Submit" value="Submit"></td>
    </tr>
  </table>
</form>
<p><a href="index.php">Return </a></p>
</body>
</html>
