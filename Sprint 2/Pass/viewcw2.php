<!DOCTYPE html>
<html>
<head>
<title>List of Marks for Coursework</title>
</head>
<body>
<h2>List of Marks for Coursework</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr> <!-- Table headings -->
<th><strong>Student ID</strong> </th>
<th><strong>Coursework ID</strong> </th>
<th><strong>Teaching Staff ID</strong> </th>
<th><strong>Mark Deserved</strong> </th>
<th><strong>Mark Actual</strong> </th>
<th><strong>Comments</strong> </th>
</thead>
</tr>
<?php
$cwid = $_POST['cwid'];
$link = mysqli_connect("localhost", "root", "", "gadb");
//check connection
if($link === false) {
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
// make string
$sql = "SELECT * ";
$sql.= "FROM scw WHERE '$cwid'=cwid ";
$sql.= "ORDER BY cwid";
$result = mysqli_query($link,$sql);

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
	echo "<td>" .$row['sid']."</td>";
	echo "<td>" .$row['cwid']."</td>";
	echo "<td>" .$row['tsid']."</td>";
	echo "<td>" .$row['md']."</td>";
	echo "<td>" .$row['ma']."</td>";
	echo "<td>" .$row['comments']."</td>";	echo "</tr>";
}	
   mysqli_free_result($result); //free 
   mysqli_close($link);  //close connection
?>
</table>
<a href="menu.html">Return to Menu</a>
</body>
</html>

