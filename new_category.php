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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create Category</title>
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
<h2>Create New Category
</h2>
<p>_______________________________________________________

____________________________________________</p>
<form id="form1" name="form1" method="post" action="category_created.php">
Enter a New Category Name : 
<label for="cat"></label>
<input type="text" name="cat" id="cat" />
<input type="submit" name="submit" id="submit" value="Submit" />
</form>
</div>
</div>
</body>
</html>

