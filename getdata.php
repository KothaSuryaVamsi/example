<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$i=$_POST['i'];
$j=$_POST['j'];
$k=$_POST['k'];
$l=$_POST['select']+1;
echo $i.$j.$k.$l;
$query3="select * from courseduration where subject='$k'";
$result3=mysql_query($query3,$connection);
$row=mysql_fetch_array($result3);
$date=$row[1];
$datee=explode('-',$date);
$ll=($l-1)*7;
//$ff=$datee[2]+$ll;
//echo " ".$ff;
if($datee[1]==1)
$sum=0+$datee[2];
elseif($datee[1]==2)
$sum=31+$datee[2];
elseif($datee[1]==3)
$sum=59+$datee[2];
elseif($datee[1]==4)
$sum=90+$datee[2];
elseif($datee[1]==5)
$sum=120+$datee[2];
elseif($datee[1]==6)
$sum=151+$datee[2];
elseif($datee[1]==7)
$sum=181+$datee[2];
elseif($datee[1]==8)
$sum=212+$datee[2];
elseif($datee[1]==9)
$sum=243+$datee[2];
elseif($datee[1]==10)
$sum=273+$datee[2];
elseif($datee[1]==11)
$sum=304+$datee[2];
elseif($datee[1]==12)
$sum=334+$datee[2];
echo "<br>".$sum;
$ff=$sum+$ll;
echo $ff;
if($ff<=31)
{
$nm=1;
$ee=$ff;
}
else if($ff<=59)
{	$nm=2;
	$ee=$ff-31;
}
else if($ff<=90)
{	$nm=3;
	$ee=$ff-59;
}
else if($ff<=120)
{	$nm=4;
	$ee=$ff-90;
}
else if($ff<=151)
{	$nm=5;
	$ee=$ff-120;
}
else if($ff<181)
{	$nm=6;
	$ee=$ff-151;
}
else if($ff<=212)
{	$nm=7;
	$ee=$ff-181;
}
else if($ff<=243)
{	$nm=8;
	$ee=$ff-212;
}
else if($ff<=273)
{	$nm=9;
	$ee=$ff-243;
}
else if($ff<=304)
{	$nm=10;
	$ee=$ff-273;
}
else if($ff<=334)
{	$nm=11;
	$ee=$ff-304;
}
else if($ff<=365)
{	$nm=12;
	$ee=$ff-334;
}
echo "<br>".$ee.$nm."<br>";
echo "<table>";
if($ee<22)
{

	$query6="select * from attandance where year='$j' and subject='$k'";
	$result6=mysql_query($query6,$connection);
	$num6=mysql_num_rows($result6);
	for($iii=0;$iii<$num6;$iii++)
	{
		echo "<tr>";
		$row6=mysql_fetch_array($result6);
		$ttt=explode("-",$row6[5]);
		$asx=round($ttt[1]);
		//echo $asx;
		$ggg=$ttt[0]."-".$asx."-".$ttt[2];
		//echo $ggg."<br>";
		for($jjj=$ee;$jjj<($ee+6);$jjj++)
		{
			$fff=$datee[0]."-".$nm."-".$jjj;
			//echo $fff;
			if($fff==$ggg)
			{
				//echo "<td>$row6[2]</td>";
				echo "<td>$row6[6]</td>";
			}
		}
		//echo "<br>";
	}
	/*for($ii=$ee;$ii<($ee+7);$ii++)
	{
		$fff=$datee[0]."-".$nm."-".$ii;
		$query5="select * from attandance where year='$j' and subject='$k' and date='$fff'";
		$result5=mysql_query($query5);
		$num5=mysql_num_rows($result5);
		for($kk=0;$kk<$num5;$kk++)
		{

		}
	}*/
}
?>