<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$b=$_POST['a'];
$c=$_POST['year'];
//echo $b;
//echo $c;
echo "<form method='post' action='getweek.php'>";
$query="select * from facultysuballocation where facultyid='$b' and year='$c'";
$result=mysql_query($query,$connection);
$num=mysql_num_rows($result);
echo "choose subject";
echo "<select name='select'>";
for($i=0;$i<$num;$i++)
{
	$row=mysql_fetch_array($result);
	echo "<option value='$row[4]'>$row[4]</option>";
}
echo "</select><br><br>";
echo "<input type='hidden' name='d' value='$b'>";
echo "<input type='hidden' name='e' value='$c'>";
//echo "<input type='hidden' name='' value=''>";
echo "<input type='submit' value='search'>";
echo "</form>";
?>
