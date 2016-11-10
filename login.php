
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css" />
<style type="text/css">
body h2 {
color: #000080;
}
#form1 p {
color: #EE4902;
}
.para {
color: #F00;
}
</style>
</head>
<body>
<?php
	$con = mysqli_connect("localhost","root","","cms");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	session_start();
    
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); 
		$username = mysqli_real_escape_string($con,$username); 
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: admin_panel.php"); 
            }else{
				echo "<div class='form'><h3>Username/password is incorrect!</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<div class="form">


<h2 align="center">&nbsp;</h2>
<h2 align="center">&nbsp;</h2>
<h2 align="center">Administrator Login Page</h2>    
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<form action="" method="post" name="login">
<p align="center"><input type="text" name="username" placeholder="Username" required />
<p align="center"><input type="password" name="password" placeholder="Password" required />
<p align="center"><input name="submit" type="submit" value="Login" />
</form>
<p align="center">Not registered yet? <a href='registration.php'>Register Here</a></p>

<br /><br />

<?php } ?>


</body>
</html>
