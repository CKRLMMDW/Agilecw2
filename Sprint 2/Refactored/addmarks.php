<?php
   $sid=$_POST['sid'];
   $cwid=$_POST['cwid'];
   
   // refactored code
   require_once('dbinfo.php'); 
   $link = mysqli_connect($dbhost, $dbun, $dbpw, $dbname);
  
   if($link === false) {
	die("ERROR: Could not connect. " . mysqli_connect_error());
   }
   $mark = mysqli_real_escape_string($link, $_POST['mark']);
   $sql="UPDATE scw SET md='$mark' WHERE cwid='$cwid' AND sid='$sid'";
      $result=mysqli_query($link, $sql);
	  
	  echo "<br>Mark added<br>";
	  echo "<a href='menu.html'><br>Return to Menu</a>";
?>
