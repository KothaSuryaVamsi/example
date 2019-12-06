<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$f=$_POST['d'];
$g=$_POST['e'];
$h=$_POST['select'];
echo $f.$g.$h;
$query="select * from courseduration where subject='$h' ";
$result=mysql_query($query,$connection);
$row=mysql_fetch_array($result);
echo "<form method='post' action='getdata.php'>";
$date1=$row[1];
$date2=$row[2];
//echo $date1.$date2;
$one=explode('-', $date1);
$two=explode('-', $date2);
$yy=$two[0]-$one[0];
if($one[1]==1)
$sum=0+$one[2];
elseif($one[1]==2)
$sum=31+$one[2];
elseif($one[1]==3)
$sum=59+$one[2];
elseif($one[1]==4)
$sum=90+$one[2];
elseif($one[1]==5)
$sum=120+$one[2];
elseif($one[1]==6)
$sum=151+$one[2];
elseif($one[1]==7)
$sum=181+$one[2];
elseif($one[1]==8)
$sum=212+$one[2];
elseif($one[1]==9)
$sum=243+$one[2];
elseif($one[1]==10)
$sum=273+$one[2];
elseif($one[1]==11)
$sum=304+$one[2];
elseif($one[1]==12)
$sum=334+$one[2];
if($two[1]==1)
$sum1=0+$two[2];
elseif($two[1]==2)
$sum1=31+$two[2];
elseif($two[1]==3)
$sum1=59+$two[2];
elseif($two[1]==4)
$sum1=90+$two[2];
elseif($two[1]==5)
$sum1=120+$two[2];
elseif($two[1]==6)
$sum1=151+$two[2];
elseif($two[1]==7)
$sum1=181+$two[2];
elseif($two[1]==8)
$sum1=212+$two[2];
elseif($two[1]==9)
$sum1=243+$two[2];
elseif($two[1]==10)
$sum1=273+$two[2];
elseif($two[1]==11)
$sum1=304+$two[2];
elseif($two[1]==12)
$sum1=334+$two[2];
$res=abs($sum1-$sum)+$yy*365;
//echo $res;
$week=round($res/7);
//echo $week;
echo "choose week ";
echo "<select name='select'>";
for($i=0;$i<$week;$i++)
{
	$j=$i+1;
	echo "<option value='$i'>week$j</option>";
}
echo "</select><br>";
echo "<input type='hidden' name='i' value='$f'>";
echo "<input type='hidden' name='j' value='$g'>";
echo "<input type='hidden' name='k' value='$h'>";
echo "<input type='submit' value='show'>";
echo "</form>";
echo mysql_error();
?>
