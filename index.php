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
<title>Site News</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="contain">
<div id="header">
<h1>Latest News! </h1>

</div>
<div id="menus">
<a href="index.php" target="_self">Home</a>

<?php

$qry=mysql_query("SELECT * FROM category LIMIT 0, 10", $con);
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="login.php" target="_self">Login</a>
</div>
<div id="l_space">
<h2>Latest...</h2>
<?php


$qry=mysql_query("SELECT * FROM articles order by articles.id DESC LIMIT 0, 1", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}


while($row=mysql_fetch_array($qry))
{
echo "<h2>".$row['title']."</h2>";
echo "<img src=".$row['image']." />";
echo "<p>".substr($row['contents'],0,200)."<a href=articles.php?id=".$row['id']." > Read more</a></p>";
}
?>
<p>&nbsp;</p>
</div>
<div id="r_space">
<h2>News:</h2>
<?php

$qry=mysql_query("SELECT * FROM articles order by articles.id DESC LIMIT 0, 3", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

while($row=mysql_fetch_array($qry))
{
echo "<li><a href=articles.php?id=".$row['id'].">".$row['title']."</a></li>";
}
?>
</div>
<div id="footer">
<div align="center"><strong>Copyright @ 2016 - NISS All Rights Reserved</strong></div>
</div>
"</div>
</body>
</html>