
<html>
<head>
<title>View marks</title>
</head>
<body>
<h2>View marks</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead><tr>
<th><strong>CW ID</strong></th>
<th><strong>Mark Deserved</strong></th>
<th><strong>Mark Actual</strong></th>
</thead></tr>

<?php
$sid=$_POST['sid'];
$link = mysqli_connect("localhost", "root", "", "gadb");
   if($link === false) {
	  die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM scw WHERE $sid='cwid'";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
	echo "<td>" .$row['cwid']."</td>";
    echo "<td>" .$row['md']."</td>";
	echo "<td>" .$row['ma']."</td>";
	echo "</tr>";
}
mysqli_free_result($result);       //free memory
mysqli_close($link);               //close connection
?>

</table><br><br>
<a href='menu.html'><br>Return to Menu</a>
</body>
</html>



