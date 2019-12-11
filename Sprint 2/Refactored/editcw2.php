<?php
/* *********************************************
FEATURE:   EDIT COURSEWORK
SPRINT:    2
CALLED BY: editcw.php
NEXT:      menu.html

Define link to database
Check connection if returns false die
   Escape cwid
   Escape cwtitle
   Escape hidate
   Escape creditw
   Escape fdd
   Escape status
UPDATE cw WHERE cwid=cwid
echo Coursework updated added
RTM  Return to Menu
*********************************************
*/

   require_once('dbinfo.php');
   $link = mysqli_connect($dbhost, $dbun, $dbpw, $dbname);
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
   for debugging just cut and paste as needed
   echo $link;
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
