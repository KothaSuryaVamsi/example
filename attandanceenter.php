<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$t=$_POST['kk'];
$y=$_POST['kl'];
$u=$_POST['km'];
$o=$_POST['subject'];
//echo $t." ".$y." ".$u." ".$o;
$query="select * from studentdetails where branch='$u' and year='$y'";
$result=mysql_query($query,$connection);
$num=mysql_num_rows($result);
echo "<form method='post' action=attandanceinsert.php>";
echo "Date:<input type='date' name='date'><br>";
echo "<input type='hidden' name='q' value='$y'>";
echo "<input type='hidden' name='qq' value='$u'>";
echo "<input type='hidden' name='qqq' value='$o'>";
echo "<table>";
echo "<th>StudentID</th><th>StudentName</th><th>Attandence</th>";
for($i=0;$i<$num;$i++)
{
	$row=mysql_fetch_array($result);
	echo "<tr>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[0]."</td>";
	//$pa="ab".$i;
	echo "<td><input type='radio' name='pa$i' value='present'>Present<input type='radio' name='pa$i' value='absent'>Absent</td>";
	echo "</tr>";
	//echo "pa$i";
}
echo "</table>";
echo "<input type='submit' value='submit'>";
?>