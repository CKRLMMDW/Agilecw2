<html>
<!-- *********************************************
FEATURE:   ADD MARKS
SPRINT:    2
CALLED BY: menu.html
NEXT:      listcwfs.php
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

-->
<head>
   <title>List Students</title>
</head>
<body>
   <h2>List Students</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead><tr>
   <th><strong>Student ID</strong></th>
   <th><strong>First Name</strong></th>
   <th><strong>Last Name</strong></th>
</thead></tr>

<!-- START PHP -->
<?php
   require_once('dbinfo.php');
   $link = mysqli_connect($dbhost, $dbun, $dbpw, $dbname);
   if($link === false) {
  	  die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM students";
$result = mysqli_query($link,$sql);

while($row = mysqli_fetch_assoc($result)){
   echo "<tr>";
	 echo "<td>" .$row['sid']."</td>";
	 echo "<td>" .$row['sfn']."</td>";
	 echo "<td>" .$row['sln']."</td>";
	 echo "</tr>";
}
mysqli_free_result($result);    //free memory
mysqli_close($link);            //close connection
?>
<!-- END PHP -->

</table>

<br><br>
<table> <th colspan="2"><center>Pick Student</center></th>
<form name="form" action="listcwfs.php" onsubmit="return validate()" method="post">
   <tr><th>Enter Student ID: </th></td><td><input type="text" name="sid" ></td></tr>
   <br><br>
</table>
<input type="submit" value="Submit">
</form>
<br><br>

<script>
    function validate() {
    var rt = document.forms["form"]["sid"].value;
    if ((sid === "" )) {
        alert("Please enter a valid student ID");
        return false;
    }
}
</script>
</body>
</html>
