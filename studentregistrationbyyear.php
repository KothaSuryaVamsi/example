<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$a=$_POST['sname'];
$b=$_POST['sid'];
$c=$_POST['branch'];
$d=$_POST['year'];
$e=$_POST['dob'];
$f=$_POST['email'];
$g=$_POST['add'];
$h=$_POST['phone'];
$query="insert into studentdetails(sname,sid,branch,year,dob,email,address,phoneno)values('$a','$b','$c','$d','$e','$f','$g','$h')";
$result=mysql_query($query,$connection);
if($result)
	echo "data is inserted";

