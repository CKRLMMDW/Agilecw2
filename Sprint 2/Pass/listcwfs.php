<!DOCTYPE html>
<html>
<head>
<title>List CW</title>
</head>
<body>
<h2>List CW</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead><tr>
<th><strong>CW ID</strong></th>
<th><strong>Title</strong></th>
</thead></tr>

<?php
$sid=$_POST['sid'];
$link = mysqli_connect("localhost", "root", "", "gadb");
   if($link === false) {
	  die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM scw WHERE $sid='sid'";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
	echo "<td>" .$row['cwid']."</td>";
	echo "<td>" .$row['cwtitle']."</td>";
	echo "</tr>";
}
mysqli_free_result($result);       //free memory
mysqli_close($link);               //close connection
?>

</table><br><br>

<table> <th colspan="2"><center>Add Mark</center></th> 
<form name="form" action="addmarks.php" onsubmit="return validate()" method="post">
    <tr><th>Student ID</th><td><input name="sid" type="text" </td></tr>
	<tr><th>CW ID</th><td><input name="cwid" type="text" </td></tr>
	<tr><th>Mark</th><td><input name="mark" type="text" </td></tr>
</table>
<input type="submit" value="Submit">
</form>
<br><br>
<script> 
function validate() {
var mark = document.forms["form"]["mark"].value;
    if (mark < 0 || > 100 ) {
        alert("Please enter a percentage");
        return false;
}
</script>
</body>
</html>



