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
$b=$_POST['lname'];
$c=$_POST['fathername'];
$d=$_POST['mothername'];
$e=$_POST['branch'];
$f=$_POST['date'];
$g=$_POST['gender'];
$h=$_POST['address'];
$i=$_POST['tenth'];
$j=$_POST['inter'];
$k=$_POST['rank'];
$l=$_POST['phoneno'];
$imagename=$_FILES["photo"]["name"];
$imagetmp=addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$query="insert into studentsregistraion(firstname,lastname,fathername,mothername,branch,date,gender,address,tenth,inter,rank,phoneno,photo,photo1)values('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$imagename','$imagetmp')";
$result=mysql_query($query,$connection);
if($result)
echo "data is entered";
else
echo mysql_error();
?>