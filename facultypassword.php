<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$a=$_POST['fname'];
$b=$_POST['fid'];
$query="select * from facultypassword";
$result=mysql_query($query,$connection);
$num=mysql_num_rows($result);
$e=0;
for($i=0;$i<$num;$i++)
{
$row=mysql_fetch_array($result);
if($b==$row[0] and $a==$row[1])
{
echo $row[2];
$e=1;
break;
}
}
if($e==0)
echo "wrong facultyid or facultyname";
echo mysql_error();
?>