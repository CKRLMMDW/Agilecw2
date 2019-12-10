<?php
// ///////////////////////////

// Define link
// Check connection
// if false die
// Recieve cwid sanitize
// Recieve cwtitle sanitize
// Recieve hidate sanitize
// Recieve creditw sanitize
// Recieve fdd sanitize
// Recieve status sanitize
// Make STRING
// UPDATE cw WHERE cwid=cwid
// echo cw updated
// RTM  
// ///////////////////////////
 
   $link = mysqli_connect("localhost", "root", "", "gadb");
   if($link === false) {
	    die("ERROR: Could not connect. " . mysqli_connect_error());
   }

   $cwid = mysqli_real_escape_string($link, $_POST['cwid']);
   $cwtitle = mysqli_real_escape_string($link, $_POST['cwtitle']);
   $hidate = mysqli_real_escape_string($link, $_POST['hidate']);
   $creditw = mysqli_real_escape_string($link, $_POST['creditw']);
   $fdd = mysqli_real_escape_string($link, $_POST['fdd']);
   $status = mysqli_real_escape_string($link, $_POST['status']);
  
   $sql="UPDATE cw SET ";
      $sql.="cwtitle='$cwtitle', ";
      $sql.="hidate='$hidate', ";
      $sql.="creditw='$creditw', ";
      $sql.="fdd='$fdd', ";
      $sql.="status='$status' ";
   $sql.="WHERE cwid='$cwid'";
	
// modid not updated
      mysqli_query($link,$sql);
   
	  echo "<br>Coursework updated<br>";
	  echo "<a href='menu.html'><br>Return to Menu</a>";  
/*
***************************
   echo $sql;
   echo $cwid;
   echo $cwtitle;
   echo $hidate;
   echo $creditw;
   echo $fdd;
   echo $status;
***************************
*/
?>
