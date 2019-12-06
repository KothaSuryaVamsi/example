<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$aa=$_POST['name'];
$a=$_POST['id'];
$b=$_POST['branch'];
$c=$_POST['year'];
$query="select * from faculty";
$result=mysql_query($query,$connection);
$num=mysql_num_rows($result);
$query15="select * from facultysuballocation";
$result15=mysql_query($query15,$connection);
$num15=mysql_num_rows($result15);
$xyz=0;
for($n=0;$n<$num15;$n++)
{
	$row15=mysql_fetch_array($result15);
	if($a==$row15[1])
		$xyz=$xyz+1;
}
if($xyz<3)
{
for($i=0;$i<$num;$i++)
{
	$row=mysql_fetch_array($result);
	if($b==$row[1] && $c==$row[0])
	{
		$f=mt_rand(2,7);
		$d=$row[$f];
		$x=explode(",",$d);
		$query1="select * from facultysuballocation";
		$result1=mysql_query($query1,$connection);
		$num2=mysql_num_rows($result1);
		$m=0;
		for($j=0;$j<$num2;$j++)
		{
			$row2=mysql_fetch_array($result1);
			if($row2['subject']==$x[0])
			{
				$m=1;
				echo $x[0]." is already taken by ".$row2['facultyid'];
				break;
			}
		}
		if($m==0)
		{
			$query2="insert into facultysuballocation(facultyname,facultyid,branch,year,subject,coursename)values('$aa','$a','$b','$c','$x[0]','$x[1]')";
			$result2=mysql_query($query2,$connection);
			if($result2)
				echo $x[0]." is given to ".$a;
		}
	}
}
}
else
{
	echo "For Faculty ".$aa." already 3 subjects are completed";
}
echo mysql_error();
?>