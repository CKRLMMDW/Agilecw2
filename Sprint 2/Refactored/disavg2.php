<html>
<!-- *********************************************
FEATURE:   DISPLAY AVERAGE
SPRINT:    2
CALLED BY: disavg.php
NEXT:      menu.html
*********************************************
-->
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

   $p=$rt/$i; // avg = total / counter 

	 echo "<br>Average: ";
   echo $p;
   echo "%   ";
   switch($p){
	case $p > 94 :	   echo "A1  <br>";	   break;
	case $p > 88 :	   echo "A2  <br>";	   break;
	case $p > 82 :	   echo "A3  <br>";	   break;
	case $p > 75 :	   echo "A4  <br>";	   break;
	case $p > 69 :	   echo "A5  <br>";	   break;
	case $p > 66 :	   echo "B1  <br>";	   break;
	case $p > 63 :	   echo "B2  <br>";	   break;
	case $p > 59 :	   echo "B3  <br>";	   break;
	case $p > 56 :	   echo "C1  <br>";	   break;
	case $p > 53 :	   echo "C2  <br>";	   break;
	case $p > 49 :	   echo "C3  <br>";	   break;
	case $p > 46 :	   echo "D1  <br>";	   break;
	case $p > 43 :	   echo "D2  <br>";	   break;
	case $p > 39 :	   echo "D3  <br>";	   break;
	case $p > 36 :	   echo "MF1 <br>";	   break;
	case $p > 33 :	   echo "MF2 <br>";	   break;
	case $p > 29 :	   echo "MF3 <br>";	   break;
	case $p > 19 :	   echo "CF  <br>";	   break;
	case $p > 0 :	   echo "BF  <br>";	   break;	   
} 
   echo "<br>";
	 echo "<a href='menu.html'><br>Return to Menu</a>";
?>
<!-- END PHP -->

</body>
</html>
