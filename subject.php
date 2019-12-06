<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$f=$_POST['e'];
$g=$_POST['year'];
$h=$_POST['branch'];
//echo $h;
//echo $g;
//echo $f;
$query4="select * from facultysuballocation where facultyid='$f' and year='$g' and branch='$h'";
$result4=mysql_query($query4,$connection);
if($result4==0)
{
	echo "there is no section for faculty";
exit();
}
$num4=mysql_num_rows($result4);
echo "<form method='post' action='attandanceenter.php'>";
echo "choose subject";
echo "<select name='subject'>";
for($i=0;$i<$num4;$i++)
{
	$row=mysql_fetch_array($result4);
	echo "<option value=$row[4]>".$row[4]."</option>";
}
echo "</select><br><br>";
echo "<input type='hidden' name='kk' value='$f'>";
echo "<input type='hidden' name='kl' value='$g'>";
echo "<input type='hidden' name='km' value='$h'>";
echo "<input type='submit' value='get details'>";
echo "</form>";
echo mysql_error();
?>