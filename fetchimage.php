<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
header("content-type:image/*");
$name1=$_POST['photo'];
$query2="select * from studentsregistraion where photo='$name1' ";
$result2=mysql_query($query2,$connection);
$num=mysql_num_rows($result);
for($i=0;$i<$num;$i++)
{
	$row=mysql_fetch_array($result2);
	$image11=$row['photo'];
	$image12=$row['photo1'];
	echo $image;
}
?>