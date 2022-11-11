<html>
<head>
<title>List Customer 4</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<h1>List Customer</h1>
<p><br>
  <br>
  
  
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

// read search name if selected
// else set to null
if (isset($_REQUEST["searchName"])) {
    $searchName = $_REQUEST["searchName"] ; 
} else {
$searchName = null; }
//print "see search name $searchName";  // test selection technique

// set condition for search
$condition = " and (cusLast like '%$searchName%' )";

// the customers file is sorted last name, first name
// add condition for name search
$query = "select * from cusTab, srcTab where cusSource = srcID $condition order by cusLast, cusFirst";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);
// print "There are currently $num customers on file<br><br>"; // rows selected
 
print "<table>";
print "<tr><td><b>First Name </b></td>";
print "<td><b> Last Name </b></td>";
print "<td><b> Street </b></td>";
print "<td><b>  Source </b></td>";
print "<td><b> Change </b></td>";
print "<td><b> Delete </td></b></tr>";

while($row = mysqli_fetch_assoc($result)) {
	$cusID = $row['cusID'];
	$cusFirst = $row['cusFirst'];
	$cusLast = $row['cusLast'];
	$cusStreet = $row['cusStreet'];
	$cusZip = $row['cusZip'];
	$cusSource = $row['cusSource'];
	
	print "<tr>";
	print "<td>$cusFirst</td>";
	print "<td>$cusLast</td>";
	print "<td>$cusStreet</td>";
	print "<td>$cusSource</td>";
	print "<td><a href=customerJ_update4.php?action=u&id=";
	print $cusID;
	print ">Change</a></td>";	
//  and now add a second link for a delete
//	except I don't need to go to the update form
//  so I am going directly to the update program
	
	print "<td><a href=customerJ_action4.php?action=d&id=";
	print $cusID;
	print "> Delete </a></td>";	
	print "</tr>";
}
print "</table>";
?>
</p>

<!-- note that I create a link to the update form for an add here               -->
<!-- it passes an update code of 'a' so that the update form knows it is an add -->
<a href="customerJ_update4.php?action=a">Add a Customer</a>

<br><br>

<!--  this recalls the page - now holding any search criteria entered  -->
<form id="form" name="form" method="get" action="index.php">  
  <input name="searchName" type="text"  id="searchName" size="25" maxlength="25" />
  <input name="button" type="submit"  id="button" value="Search" />
  &nbsp;&nbsp; search for any part of Last Name
</form> 

<br> 

<!-- this recalls the page with no search selected  -->
<input type=button onClick="parent.location='index.php'" value='Return All'>

<br><br>

<a href="index.php">Return </a>

<br>
</body>
</html>
