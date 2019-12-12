<?php
/* *********************************************
FEATURE:   ADD MARKS
SPRINT:    2
CALLED BY: listcwfs.php
NEXT:      menu.html
*********************************************
Test Driven Development TDD
Programmer	xx
Mentor		xx

The user enters a mark to be stored
The Mark must be between 0 and 100
This is validated in javascript in listcwfs.php
This prevents human error
Prevents erroneous data from entering the database

What the user enters gets stored: Check manually
No other records are changed: Chek manually

UPDATE WHERE sid=sid AND cwid=cwid
is the correct code

UPDATE WHERE sid=sid would update all the student's courseworks
UPDATE WHERE cwid=cwid would update every coursework


*********************************************
Recieve sid  student id
Recieve cwid coursework id
Define link to database
Check connection if returns false die
Escape mark
UPDATE mark WHERE cwid=cwid AND sid=sid
echo Mark added
RTM  Return to Menu
*********************************************
*/
   $sid=$_POST['sid'];
   $cwid=$_POST['cwid'];
   require_once('dbinfo.php');
   $link = mysqli_connect($dbhost, $dbun, $dbpw, $dbname);
   if($link === false) {
	    die("ERROR: Could not connect. " . mysqli_connect_error());
   }
   $mark = mysqli_real_escape_string($link, $_POST['mark']);

   $sql="UPDATE scw SET md='$mark' WHERE cwid='$cwid' AND sid='$sid'";
      mysqli_query($link,$sql);

	 echo "<br>Mark added<br>";
	 echo "<a href='menu.html'><br>Return to Menu</a>";
?>
