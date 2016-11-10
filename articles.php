<?php

$con = mysql_connect("localhost","root","");
if(!$con)
{
die("connection to database failed".mysql_error());
}

$dataselect = mysql_select_db("cms",$con);
if(!$dataselect)
{
die("Database namelist not selected".mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
a:link {
text-decoration: none;
}
a:visited {
text-decoration: none;
}
a:hover {
text-decoration: underline;
}
a:active {
text-decoration: none;
}
</style>
</head>

<body>
<div id="contain">
<div id="header">
<h1>Latest in NISS</h1>
</div>
<div id="menus">
<a href="index.php" target="_self">Home</a>
<?php

$qry=mysql_query("SELECT * FROM category LIMIT 0, 6", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

while($row=mysql_fetch_array($qry))
{
echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=articles.php?cat=".$row['category'].">".$row['category']."</a>

&nbsp;&nbsp;&nbsp;&nbsp;";
}
?>
</div>

<div id="l_space">
<h2>News:</h2>
<?php


if(isset($_GET['id']))
{
$id=$_GET['id'];
$qry=mysql_query("SELECT * FROM articles WHERE id=$id", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

while($row=mysql_fetch_array($qry))
{
echo "<h2>".$row['title']."</h2>";
echo "<img src=".$row['image']." />";
echo "<p>".$row['contents']."</p>";
}
}


if(isset($_GET['cat']))
{
//echo $_GET['cat'];
$cat=$_GET['cat'];
$qry=mysql_query("SELECT * FROM articles WHERE category='$cat' order by articles.id DESC LIMIT 0, 1", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

while($row=mysql_fetch_array($qry))
{
echo "<h2>".$row['title']."</h2>";
echo "<img src=".$row['image']." />";
echo "<p>".$row['contents']."</p>";
}
}

?>

</div>

 

  <div id="r_space">
<h2>News</h2>
<?php

if(isset($_GET['id']))
{
$id=$_GET['id'];
$qry=mysql_query("SELECT category FROM articles WHERE id='$id'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

$row=mysql_fetch_array($qry);
$cat=$row['category'];
                         
$qry=mysql_query("SELECT * FROM articles WHERE category='$cat' order by articles.id DESC", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
while($row=mysql_fetch_array($qry))
{
//echo $row['title'];
echo "<li><a href=articles.php?id=".$row['id'].">".$row['title']."</a></li>";
}
}
          
if(isset($_GET['cat']))
{
$cat=$_GET['cat'];


$qry=mysql_query("SELECT * FROM articles WHERE category='$cat' order by articles.id DESC", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
while($row=mysql_fetch_array($qry))
{
echo "<li><a href=articles.php?id=".$row['id'].">".$row['title']."</a></li>";
}

}
?>
</div>

<div id="footer">
<div align="center"><strong>Copyright @ 2016 - NISS All Rights Reserved</strong></div>

</body>
</html>