<?php
   
   $sid=$_POST['sid'];
   $cwid=$_POST['cwid'];
   $mark=$_POST['mark'];
   $link = mysqli_connect("localhost", "root", "", "gadb");
   if($link === false) {
	die("ERROR: Could not connect. " . mysqli_connect_error());
   }
   $cwid = mysqli_real_escape_string($link, $_POST['cwid']);
   $mark = mysqli_real_escape_string($link, $_POST['mark']);
   
   $sql="UPDATE scw SET md='$mark' WHERE cwid='$cwid' AND sid='$sid'";
      $result=mysqli_query($link, $sql);
	  
	  echo "<br>Mark added<br>";
	  echo "<a href='menu.html'><br>Return to Menu</a>";
?>
