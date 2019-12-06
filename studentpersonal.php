<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$a=$_POST['jntuno'];
$query="select * from afterallocation where jntuno='$a'";
$result=mysql_query($query,$connection);
$row=mysql_fetch_array($result);
echo "<center>";
echo "<table  cellpadding='10'>";
$l=$row[1]." ".$row[2];
echo "<tr><td>StudentName</td><td>:</td><td>$l</td></tr>";
echo "<tr><td>FatherName</td><td>:</td><td>$row[3]</td></tr>";
echo "<tr><td>MotherName</td><td>:</td><td>$row[4]</td></tr>";
echo "<tr><td>Branch</td><td>:</td><td>$row[5]</td></tr>";
echo "<tr><td>DateOfBirth</td><td>:</td><td>$row[6]</td></tr>";
echo "<tr><td>Gender</td><td>:</td><td>$row[7]</td></tr>";
echo "<tr><td>Address</td><td>:</td><td>$row[8]</td></tr>";
echo "<tr><td>PhoneNumber</td><td>:</td><td>$row[12]</td></tr>";

echo "</table";
?>
