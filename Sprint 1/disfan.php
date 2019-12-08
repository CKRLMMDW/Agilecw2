<?php
/* 
***************************
session start
Receive p
link to database
check connection
   if returns false ERROR
SELECT * FROM ninelut WHERE p='$p'
echo an
free memory
close connection
***************************
*/ 
   echo "Display Final Alaphanumeric Grade";
   echo "<br><br><br><br><br>";
   session_start();
   $p = $_POST["p"];
   $link = mysqli_connect("localhost", "root", "", "gadb");
   if($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
   } 
   $sql="SELECT * FROM ninelut WHERE p='$p'";
   $result=mysqli_query($link,$sql);    
   while($row = mysqli_fetch_assoc($result)){
       echo $row['an']; echo "<br><br><br>";
}
   mysqli_free_result($result); //free memory
   mysqli_close($link);  //close connection
   
// Method 2 Refactored tidy faster readable code
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
?>
<br><a href="menu.html">Return to Menu</a>