<?php
if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("attandance",$connection)))
showerror();
$a=$_POST['loginname'];
$b=$_POST['pwd'];
$query="select * from admindatabase";
$result=mysql_query($query,$connection);
$num=mysql_num_rows($result);
$e=0;
for($i=0;$i<$num;$i++)
{
	$row=mysql_fetch_array($result);
	if($a==$row[0] && $b==$row[1])
	{
		echo "<br><br><br><br><br><center><font size='50'>Welcome to Admin";
		$e=1;
		echo "</font size>";
	}
}
if($e==0)
{
echo "enter correct adminid or password";
exit;
}
echo mysql_error();
?>
<html>
<head>
<style type="text/css">
a
{
 background-color:blue;
 border-radius:200px;
 text-decoration:none;
 text-align:center;
 padding:6px;
 color:white;
}

a:hover
{
background-color:#FF8000;
transform:scale(7.5);
}

body
 {
  background-image: url("2.jpg");
  background-repeat:no-repeat;
  background-size:1370px 1200px;
}
</style>
</head>
<body>
<table align='center' cellpadding="10" cellspacing="10">
<form>
</br></br>
<tr>
<td><a href="studentdetails.html" target="right">STUDENT DETAILS</a></td></tr><tr>
<td><a href="staffdetails.html"target="right">STAFF DETAILS</td>
</tr><tr><td><a href="timetabledetails.html" target="right">TIME TABLE DETAILS</td></tr><tr>
<td><a href="attendancedetails.html" target="right">ATTENDANCE DETAILS</td></tr><tr>
<td><a href="reportdetails.html" target="right">REPORT DETAILS</td>
</tr>
<tr>
<td><a href="facultypassword.html" target="right">FACULTYPASSWORD DETAILS</td>
</tr>

</form>
</table>
</body>
</html>

