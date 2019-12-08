<!DOCTYPE html>
<html>
<!-- View Student SPRINT 2           -->
<!-- List Students                   -->
<!-- Enter SID                       -->
<!-- Action viewcw2.php POST cwid    -->
<head>
   <title>List of Students</title>
</head>
<body>
   <h2>List of Students</h2>

<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
   <tr> <!-- Table headings -->
   <th><strong>Student ID</strong> </th>
   <th><strong>First Name</strong> </th>
   <th><strong>Last Name</strong> </th>
</thead>
</tr>

<!-- START PHP -->
<?php
   $link = mysqli_connect("localhost", "root", "", "gadb");
//check connection
   if($link === false) {
  	die("ERROR: Could not connect. " . mysqli_connect_error());
}
// make string
   $sql = "SELECT * FROM students ORDER BY sid";
   $result = mysqli_query($link,$sql);
   while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
	  echo "<td>" .$row['sid']."</td>";
	  echo "<td>" .$row['sfn']."</td>";
	  echo "<td>" .$row['sln']."</td>";
	  echo "</tr>";
}
   mysqli_free_result($result); //free memory
   mysqli_close($link);  //close connection
?>
<!-- END PHP -->
<!DOCTYPE html>
<html>
<body>
   <table> <th colspan="2"><center></center></th>
   <form name="gsid" action="views2.php" onsubmit="return validate()" method="post">
   <tr> <th>Enter Student ID</th> <td> <input name="sid"  type="text"></td> </tr>
</table><br>
   <input type="submit" value="Submit">
</body>
</html>
