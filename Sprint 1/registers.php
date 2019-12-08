<?php
/* 
***************************
session start
Receive fn, ln
link to database
check connection
   if returns false ERROR
INSERT INTO students (sfn, sln)
if ok 
   echo ai inserted
   else echo ERROR
close connection
Return to menu
***************************
*/ 
session_start();
$fn   = $_POST["fn"];
$ln   = $_POST["ln"];
//check connection
$link = mysqli_connect("localhost", "root", "", "gadb");
if($link === false) {
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "INSERT INTO students (sfn, sln) VALUES ('$fn', '$ln');";
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