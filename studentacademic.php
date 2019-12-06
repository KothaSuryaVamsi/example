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
echo "<tr><td>JNTU Number</td><td>:</td><td>$row[0]</td></tr>";
echo "<tr><td>Branch</td><td>:</td><td>$row[5]</td></tr>";
echo "<tr><td>Tenth Points</td><td>:</td><td>$row[10]</td></tr>";
echo "<tr><td>Inter Marks</td><td>:</td><td>$row[11]</td></tr>";
echo "<tr><td>Eamcet Rank</td><td>:</td><td>$row[12]</td></tr>";
echo "</table>";
$getname=$_POST['photo'];
echo "<img src=fetchimage.php?name=".$getname."width=200 height=200>";

?>