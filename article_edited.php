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
<?php
$id=$_POST['id'];
$cat=$_POST['category'];
$tit=$_POST['title'];
$img=$_FILES["image"]["name"];
$cont=$_POST['contents'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
</style>
<link href="admin_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="hold">
<div id="top">
<h2 align="center">NATIONAL INSTITUTE OF SPORTS AND SCIENCE ADMINISTRATION PANEL</h2>
</div>
<div id="log"></div>
<div id="work_area">
<?php
if($img)
{

$name=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];
$err=$_FILES['image']['error'];
if($err==0)
{
move_uploaded_file($tmp, $name);
}

$qry=mysql_query("UPDATE articles SET image='$img' WHERE id='$id'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
}
?>

<?php

$qry=mysql_query("UPDATE articles SET category='$cat',title='$tit',contents='$cont' WHERE id='$id'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
echo "<br/>";
echo "Article updated successfully!";
echo "<br/>";
}

?>

<a href=admin_panel.php>Go back to the Admin Panel</a>
</div>
</div>
</body>
</html>