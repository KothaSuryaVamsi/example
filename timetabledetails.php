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
$query="select * from facultysuballocation";
$result=mysql_query($query,$connection);
$num=mysql_num_rows($result);
$arr=array();
$q=0;
for($i=0;$i<$num;$i++)
{
	$row=mysql_fetch_array($result);
	if($a==$row[0] && $b==$row[1])
	{
		$arr[$q]=$row[4];
		$arr[$q+1]=$row[3];
		$q=$q+2;
	}
}
for($i=0;$i<sizeof($arr);$i++)
{
	echo $arr[$i]." ";
}
$labs=array();
$pq=0;
while(sizeof($labs)<3)
{
	$m=mt_rand(1,5);
	$x=0;
	for($i=0;$i<sizeof($labs);$i++)
	{
		if($m==$labs[$i])
		{
			$x=1;
		}
	}
	if($x==0)
	{
		$labs[$pq]=$m;
		$pq=$pq+1;
	}
}
sort($labs);
for($i=0;$i<sizeof($labs);$i++)
{
echo $labs[$i]." ";
}
$peri=array();
for($i=0;$i<3;$i++)
{
	$r=mt_rand(1,4);
	$peri[$i]=$r;
}
echo "<table border='1'>";
echo "<th>1stperiod</th><th>2stperiod</th><th>3rdperiod</th><th>4thperiod</th><th>5thperiod</th><th>6thperiod</th><th>7thperiod</th><th>DAYS</th>";
echo $peri[0].$peri[1].$peri[2];
$mn=0;
$qq=0;
for($i=0;$i<5;$i++)
{
	$kk=$i+1;
	//echo "<tr";
	echo "<tr>";
	if(in_array($kk,$labs))
	{
		echo "<br>";
		
		for($j=0;$j<4;$j++)
		{

			if($j+1==$mn)
			{
				echo "<td>".$arr[$mn]." ".$arr[$mn+1]."years</td>";
			}
			else
			{
				echo "<td> - </td>";
			}	
		}
		echo "<td colspan='3' align='center'>".$arr[$qq]." lab</td>";
		//echo "</tr>";
		$mn=$mn+2;
		$qq=$qq+2;
	}
	else
	{
		$vamsi=array();
		$abc=0;
		$abcd=0;
		while(sizeof($vamsi)<3)
		{
			$ad=mt_rand(1,7);
			$xy=0;
			for($l=0;$l<sizeof($vamsi);$l++)
			{
				if($ad==$vamsi[$l])
				{
					$xy=1;
				}
			}
			if($xy==0)
			{
				$vamsi[$abcd]=$ad;
				$abcd=$abcd+1;
			}
		}
		sort($vamsi);
		//echo "<tr>";
		$asdf=0;
		$fdsa=4;
		//for($i=0;$i<sizeof($vamsi);$i++)
		//	echo "<br>".$vamsi[$i]." I";
		for($im=0;$im<7;$im++)
		{
			$imk=$im+1;
			if($imk+1==$vamsi[$asdf])
			{
				echo "<td>".$arr[$fdsa]." ".$arr[$fdsa+1]."years</td>";
				if($asdf<2)
				$asdf=$asdf+1;
				$fdsa=$fdsa-2;
			}
			else
			{
				echo "<td>-</td>";
			}
		}	
	}
	if($i==0)
	echo "<td>MONDAY</td>";
elseif($i==1)
echo "<td>TUESDAY</td>";
elseif($i==2)
	echo "<td>WEDNESDAY</td>";
elseif($i==3)
	echo "<td>THURSDAY</td>";
elseif($i==4)
	echo "<td>FRIDAY</td>";
	echo "<tr>";
}
echo "<tr>";
$vamsi2=array();
$pq=0;
while(sizeof($vamsi2)<3)
{
	$m=mt_rand(1,4);
	$x=0;
	for($i=0;$i<sizeof($vamsi2);$i++)
	{
		if($m==$vamsi2[$i])
		{
			$x=1;
		}
	}
	if($x==0)
	{
		$vamsi2[$pq]=$m;
		$pq=$pq+1;
	}
}
sort($vamsi2);
for($i=0;$i<sizeof($vamsi2);$i++)
echo $vamsi2[$i];
$gh=0;
$fg=4;
echo "<tr>";
for($i=0;$i<4;$i++)
{
	if($i+1==$vamsi2[$gh])
	{
		echo "<td>".$arr[$fg]." ".$arr[$fg+1]."years</td>";
		if($gh<2)
		$gh=$gh+1;
		$fg=$fg-2;
	}
	else
	{
		echo "<td>-</td>";
	}
}
echo "<td colspan='3' align='center'><------HOLIDAY-------></td><td>SATURDAY</td>";
echo "</tr>";
echo "</table>";
?>