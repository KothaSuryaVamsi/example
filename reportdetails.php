<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$a=$_POST['fid'];
$b=$_POST['pwd'];
$query="select * from facultypassword";
$result=mysql_query($query,$connection);
$num=mysql_num_rows($result);
$f=0;
for($i=0;$i<$num;$i++)
{
	$row=mysql_fetch_array($result);
	if($a==$row[0] && $b==$row[2])
	{
		echo "welcome Mr ".$row[1];
		$f=1;
	}
}
if($f==0)
{
	echo "invalid facultyid or password";
	exit();
}
echo "<form method='post' action='getbranch.php'>";
echo "<input type='hidden' name='a' value='$a'>";
echo "<table>";
echo "<tr><td>year</td><td><input type='text' name='year'></td></tr>";
echo "</table>";
echo "<input type='submit' value='search'>";
echo "</form>";
?>