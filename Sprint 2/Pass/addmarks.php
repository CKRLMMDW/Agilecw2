<?php
// ///////////////////////////
// Recieve sid
// Recieve cwid
// Define link
// Check connection
// if false die
// sanitise string mark
// UPDATE mark WHERE cwid=cwid AND sid=sid
// echo Mark added
// RTM  
// ///////////////////////////
   $sid=$_POST['sid'];
   $cwid=$_POST['cwid'];
   $link = mysqli_connect("localhost", "root", "", "gadb");
   if($link === false) {
	    die("ERROR: Could not connect. " . mysqli_connect_error());
   }
   $mark = mysqli_real_escape_string($link, $_POST['mark']);

   $sql="UPDATE scw SET md='$mark' WHERE cwid='$cwid' AND sid='$sid'";
   mysqli_query($link,$sql);
  
	  echo "<br>Mark added<br>";
	  echo "<a href='menu.html'><br>Return to Menu</a>";
?>
