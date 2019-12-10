<html>
<head>
   <title>List CW</title>
</head>
<body>
   <h2>List CW</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead><tr>
   <th><strong>Student ID</strong></th>
   <th><strong>CW ID</strong></th>
   <th><strong>Actual Mark</strong></th>
</thead></tr>

<!-- START PHP -->
<?php
$sid=$_POST['sid'];
//echo $sid;
$link = mysqli_connect("localhost", "root", "", "gadb");
   if($link === false) {
	  die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM scw WHERE sid='$sid'";
$result = mysqli_query($link,$sql);

$rt=0;   // Running total
$i=0;    // Counter


while($row = mysqli_fetch_assoc($result)){
   echo "<tr>";
   echo "<td>" .$row['sid']."</td>";
   echo "<td>" .$row['cwid']."</td>";
   echo "<td>" .$row['ma']."</td>";
   echo "</tr>";
   $rt=$rt+$row['ma'];
   $i++;
}
mysqli_free_result($result);       //free memory
mysqli_close($link);               //close connection

   $avg=$rt/$i;
   
	  echo "<br>Average: ";
      echo $avg;
      echo "%<br>";
	  echo "<a href='menu.html'><br>Return to Menu</a>";  


?>
<!-- END PHP -->

</body>
</html>
