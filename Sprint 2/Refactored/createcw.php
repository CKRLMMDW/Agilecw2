<?php
/*
***************************
session start
Receive title, modid, hidate, creditw, fdd, status
link to database
check connection
   if returns false ERROR
INSERT INTO cw (title, modid, hidate, creditw, fdd, status)
if ok
   echo ai inserted
   else echo ERROR
close connection
Return to menu
***************************
*/
session_start();
   $title   = $_POST["title"];
   $modid   = $_POST["modid"];
   $hidate  = $_POST["hidate"];
   $creditw = $_POST["creditw"];
   $fdd     = $_POST["fdd"];
   $status  = $_POST["status"];

   require_once('dbinfo.php');
   $link = mysqli_connect($dbhost, $dbun, $dbpw, $dbname);

//check connection
if($link === false) {
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
// make string
$sql = "INSERT INTO cw (cwtitle, modid, hidate, creditw, fdd, status) ";
         $sql.="VALUES ('$title', '$modid', '$hidate', '$creditw', '$fdd', '$status');";

//echo $sql;

if (mysqli_query($link, $sql)) {
	$lastid = mysqli_insert_id($link);
	echo "$lastid Inserted";
}
else {
	echo "ERROR: $sql. " . mysqli_error($link);
}
mysqli_close($link);  //close connection
echo "<a href='menu.html'></a>";
?>
