<html><link rel="stylesheet" href="styles.css">
<head>
   <title>List Courseworks</title>
</head>   

<body>
   <h2>List Courseworks</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead><tr>
   <th><strong>Coursework ID</strong></th>
   <th><strong>Title</strong></th>
   <th><strong>Module ID</strong></th>
   <th><strong>Hand in date</strong></th>
   <th><strong>Credit Weighting</strong></th>
   <th><strong>Feedback Due Date</strong></th>
   <th><strong>Status</strong></th>
</thead></tr>

<!-- START PHP -->
<?php
$link = mysqli_connect("localhost", "root", "", "gadb");
   if($link === false) {
  	  die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM cw";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_assoc($result)){
   echo "<tr>";
	 echo "<td>" .$row['cwid']."</td>";
	 echo "<td>" .$row['cwtitle']."</td>";
	 echo "<td>" .$row['modid']."</td>";
	 echo "<td>" .$row['hidate']."</td>";
	 echo "<td>" .$row['creditw']."</td>";
	 echo "<td>" .$row['fdd']."</td>";
	 echo "<td>" .$row['status']."</td>";
	 echo "</tr>";
}
mysqli_free_result($result);    //free memory
mysqli_close($link);            //close connection
?>
<!-- END PHP -->

</table>

<br><br>
<table> 
<form name="form" action="editcw2.php" onsubmit="return validate()" method="post">
   <tr><th>Enter Coursework ID:      </th></td><td><input type="text" name="cwid" ></td></tr>
   <tr><th>Enter Coursework Title:   </th></td><td><input type="text" name="cwtitle" ></td></tr>
   <tr><th>Enter Hand in Date:       </th></td><td><input type="date" name="hidate" ></td></tr>
   <tr><th>Enter Credit Weighting:   </th></td><td><input type="text" name="creditw" ></td></tr>
   <tr><th>Enter Feedback Due Date:  </th></td><td><input type="date" name="fdd" ></td></tr>
   <tr><th>Enter Status:             </th></td><td>
   <select name="status">
      <option value="0" selected>In preperation</option>
      <option value="1">Live</option>
      <option value="2" >Handed in</option>
   </select></th></tr>
   <br><br>

   </table> 
   <br><br>
<input type="submit" value="Submit">
</form>
<br><br>

<script>
    function validate() {
    var cwtitle = document.forms["form"]["cwtitle"].length;
	var creditw = document.forms["form"]["creditw"].value;
    if ((cwtitle < 10 ) || (creditw < 1 || > 100) {
        alert("Please enter a title of at least 10 characters and Credit weighting between 1 and 100");
        return false;
    }
}
</script>
</body>
</html>
