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
<title>Edit Post</title>
<style type="text/css">
</style>
<link href="admin_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="hold">
<div id="top">
<h2 align="center">NATIONAL INSTITUTE OF SPORTS AND SCIENCE ADMINISTRATION PANEL</h2>
</div>
<div id="log"> </div>
<div id="work_area">
<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$qry=mysql_query("SELECT * FROM articles WHERE id=$id", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

$row=mysql_fetch_array($qry);

//echo $row['id'];
//echo $row['category'];
//echo $row['title'];
//echo $row['image'];
//echo $row['contents'];

}

?>
<form action="article_edited.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<p>Article Id &nbsp;&nbsp;:
<input type="text" name="id" id="idd" value="<?php echo $row['id']; ?>" />
</p>
<p>Category &nbsp;&nbsp;: 
<label for="cat"></label>
<input type="text" name="category" id="category" value="<?php echo $row['category']; ?>" />
</p>
<p>Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
<label for="tit"></label>
<input type="text" name="title" id="title" value="<?php echo $row['title']; ?>" />
</p>
<p>Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 
<label for="image"></label>
<input type="file" name="image" id="image" />
(Upload new image if only there is a change in the existing image)</p>
<p>Contents &nbsp;&nbsp;&nbsp;: 
<label for="cont"></label>
<textarea name="contents" id="contents" cols="100" rows="12" ><?php echo $row['contents']; ?></textarea>
</p>
<p align="center">
<input type="submit" name="Submit" id="Submit" value="Submit" />
</p>
</form>
</div>
</div>
</body>
</html>