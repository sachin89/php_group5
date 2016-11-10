<?php
session_start();
if(isset($_SESSION['username']))
{
if(!$_SESSION['username']=='admin')
{
header("Location:login.php?id=You are not authorised to access this page!");
}
}
else
{
header("Location:login.php?id=You are not authorised to access this page!");
}
?>
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
<title>Admin Panel</title>
<style type="text/css">
#hold #log {
color: #EE4902;
}
</style>
<link href="admin_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="hold">
<div id="top">
<h2 align="center">NATIONAL INSTITUTE OF SPORTS AND SCIENCE ADMINISTRATION PANEL </h2>
</div>
<div id="log">
<?php
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "Welcome ".$_SESSION['username'];
echo"!";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<a href=logout.php>Logout</a>";
?>
</div>
<div id="left">
<a href=new_category.php >Create New Category</a><br/>
<a href=remove_category.php >Remove a Category</a><br/>
<a href=create_new.php >Create New Article</a><br/>
<a href=admin_panel.php?id=viewall>View all Articles</a><br/><br/>
<b>
<font color="#000080">Articles by Category</font>    
    </b>
<?php
$qry=mysql_query("SELECT * FROM category ", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

while($row=mysql_fetch_array($qry))
{
echo "<li><a href=admin_panel.php?cat=".$row['category'].">".$row['category']."</a></li>";
}
?>
</div>
<div id="right">

    <?php
if(isset($_GET['id'])=="viewall")
{
$qry=mysql_query("SELECT * FROM articles order by articles.id DESC ", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
echo "<table>";

while($row=mysql_fetch_array($qry))
{
echo "<tr>";
echo "<td><a href=articles.php?id=".$row['id'].">".$row['title']."</a></td>";
echo "<td><a href=edit_article.php?id=".$row['id'].">edit</a></td>";
echo "<td><a href=delete_article.php?id=".$row['id'].">delete</a></td>";
echo "</tr>";
}
echo "</table>";
}
?>
  <?php
if(isset($_GET['cat']))
{
$cat=$_GET['cat'];


$qry=mysql_query("SELECT * FROM articles WHERE category='$cat' order by articles.id DESC", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
echo "<table>";
while($row=mysql_fetch_array($qry))
{
//echo $row['title'];
echo "<tr>";
echo "<td><a href=articles.php?id=".$row['id'].">".$row['title']."</a></td>";
echo "<td><a href=edit_article.php?id=".$row['id'].">edit</a></td>";
echo "<td><a href=delete_article.php?id=".$row['id'].">delete</a></td>";
echo "</tr>";
}
echo "</table>";
}
?>
</div>
</div>
</body>
</html>