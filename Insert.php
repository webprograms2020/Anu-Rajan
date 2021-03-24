<?php
$con=mysql_connect("localhost","root","");
if(!$con)
{
	die('Could not connect:'.mysql_error());
}
mysql_select_db("mydb",$con);
$sql="INSERT INTO tbl_person (Fname,Lname,Age)VALUES ('$_POST[fname]','$_POST[lname]','$_POST[txtage]')";
if(!mysql_query($sql,$con))
{
	die('Error:'.mysql_error());
}
$result=mysql_query("SELECT * FROM tbl_person");
echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
</tr>";
while($row=mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>".$row['Fname'],"</td>";
	echo "<td>".$row['Lname'],"</td>";
	echo "<td>".$row['Age'],"</td>";
	echo "</tr>";
}
echo "</table>";
mysql_close($con);
?>