<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$gf=$_POST['q'];
$gd=$_POST['qq'];
$gs=$_POST['qqq'];
$ga=$_POST['date'];
//$gb=$_POST['qq'];
//$gc=$_POST['qq'];
//$gx=$_POST['qq'];
//echo $gf." ".$gd." ".$gs." ".$ga;
$query2="select * from studentdetails where branch='$gd' and year='$gf'";
$result2=mysql_query($query2,$connection);
$num2=mysql_num_rows($result2);
$rt=array();
$cv=mt_rand(1,7);
for($i=0;$i<$num2;$i++)
{
	$row=mysql_fetch_array($result2);
	$yy='pa'.$i;
	$ay=$_POST[$yy];
	$rt[$i]=$ay;
	$ax=$row[1];
	$az=$row[0];
	//echo $ay." ".$ax." ".$az;
	$query5="insert into attandance(year,branch,studentname,studentid,subject,date,prorab,period)values('$gf','$gd','$az','$ax','$gs','$ga','$ay','$cv')";
	$result5=mysql_query($query5,$connection);
}
echo "attandance is updated";
//for($i=0;$i<sizeof($rt);$i++)
//echo $rt[$i];
echo mysql_error();
?>