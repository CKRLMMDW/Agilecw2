<!DOCTYPE html>
<html>
<!-- *********************************************
FEATURE:   VIEW COURSEWORK
SPRINT:    2
CALLED BY: menu.html
NEXT:      viewcw2.php
*********************************************
-->
<head>
   <title>List of Courseworks</title>
</head>
<body>
   <h2>List of Courseworks</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr> <!-- Table headings -->
   <th><strong>Coursework ID</strong> </th>
   <th><strong>Coursework Title</strong> </th>
</thead>
</tr>

<!-- START PHP -->
<?php
   require_once('dbinfo.php');
   $link = mysqli_connect($dbhost, $dbun, $dbpw, $dbname);

//check connection
if($link === false) {
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM cw ORDER BY cwid";
   $result = mysqli_query($link,$sql);

while($row = mysqli_fetch_assoc($result)) {
   echo "<tr>";
   echo "<td>" .$row['cwid']."</td>";
   echo "<td>" .$row['cwtitle']."</td>";
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
   <form name="gcwid" action="viewcw2.php" onsubmit="return validate()" method="post">
      <tr> <th>Enter Coursework ID</th> <td> <input name="cwid"  type="text"></td> </tr>
   </table><br>
   <input type="submit" value="Submit">
</body>
</html>
