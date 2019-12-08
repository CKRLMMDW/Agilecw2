<?php
/*
***************************
session start
Receive tsid
link to database
check connection
   if returns false ERROR
SELECT * FROM teachingstaff WHERE tsid='$tsid'
   if tsid in list menu
   else ID incorrect
free memory
close connection
***************************
*/
   session_start();
   $tsid = $_POST["tsid"];
   $link = mysqli_connect("localhost", "root", "", "gadb");
   //check connection
   if($link === false) {
	    die("ERROR: Could not connect. " . mysqli_connect_error());
   }
   $sql="SELECT * FROM teachingstaff WHERE tsid='$tsid'";
   $result=mysqli_query($link,$sql);
   if(mysqli_num_rows($result)) {
      header("Location: menu.html");
   }
   else {
     echo "<script>alert('$tsid ID incorrect')</script>";
	}
    mysqli_free_result($result); //free memory
    mysqli_close($link);  //close connection
?>
