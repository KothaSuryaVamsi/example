<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$b=$_POST['name'];
$c=$_POST['branch'];
$d=$_POST['exp'];
$e=$_POST['qf'];
$f=$_POST['pc'];
$query1="select * from facultydetails where branch='$c'";
$result1=mysql_query($query1,$connection);
$num=mysql_num_rows($result1);
$x=$num+1;
$a="$c"."$x";
$query="insert into facultydetails(facultyname,branch,experience,qualification,previouscollege,facultyid)values('$b','$c','$d','$e','$f','$a')";
$result=mysql_query($query,$connection);
if($result)
	echo "data is inserted<br>";
$query10="select * from facultypassword";
$result10=mysql_query($query10,$connection);
$num10=mysql_num_rows($result10);
$py=$num10+1;
$pass="$a"."@"."$py";
$query11="insert into facultypassword(facultyid,facultyname,facultypassword)values('$a','$b','$pass')";
$result12=mysql_query($query11,$connection);
if($result12)
echo "data is inseted into password page also";
?>