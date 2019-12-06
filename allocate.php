<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$a=$_POST['branch'];
$query="select * from studentsregistraion where branch='$a' order by lastname";
$result=mysql_query($query,$connection);
$num=mysql_num_rows($result);
$c="allocation".$a;
if($a=='ece')
	$d='17241A04';
elseif ($a=='cse') {
	$d='17341A05';
}
elseif ($a=='mech') {
	$d='17341A03';
}
elseif ($a=='civil') {
	$d='17341A01';
}
elseif($a=='it'){
	$d='17341A06';
}
elseif($a=='eee'){
	$d='17341A02';
}
else
$d='17341A07';
for($i=0;$i<$num;$i++)
{
	$row=mysql_fetch_array($result);
	$f=$d.($i+1);
	$query1="insert into $c(jntuno,firstname,lastname,fathername,mothername,branch,date,gender,address,tenth,inter,rank,phoneno)values('$f','$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]')";
	$result1=mysql_query($query1,$connection);
	$query2="insert into afterallocation(jntuno,firstname,lastname,fathername,mothername,branch,date,gender,address,tenth,inter,rank,phoneno)values('$f','$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]')";
	$result2=mysql_query($query2,$connection);
}
if($result1)
		echo "allocation is done for ".$a." branch";
echo mysql_error();
?>