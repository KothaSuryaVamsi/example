<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$c=$_POST['a'];
$query2="select * from facultysuballocation where facultyid='$c'";
$result2=mysql_query($query2,$connection);
$num2=mysql_num_rows($result2);
echo "choose year";
echo "<form method='post' action='subject.php'><input type='radio' name='year' value='2'>2";
echo "<input type='radio' name='year' value='3'>3";
echo "<input type='radio' name='year' value='4'>4<br><br>";
echo "Branch: <input type='text' name='branch'><br><br>";
/*echo "choose subject";
echo "<select name='subject'>";
for($i=0;$i<$num2;$i++)
{
	$row=mysql_fetch_array($result2);
	echo "<option value=$row[4]>".$row[4]."</option>";
}
echo "</select>";*/
//echo "<br><br>";
echo "<body>";
echo "<input type='hidden' name='e' value='$c'>";
echo "<input type='submit' name='submit' value='submit'/>";
echo mysql_error();
?>
