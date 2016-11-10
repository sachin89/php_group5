
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="style.css" />
<style type="text/css">
body h2 {
color: #EE4902;
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
 
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($con,$username); 
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You have successfully registered!</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h2 align="center">&nbsp;</h2>
<h2 align="center">&nbsp;</h2>
<h2 align="center">Registration</h2>    
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<form name="registration" action="" method="post">
<p align="center"><input type="text" name="username" placeholder="Username" required />
<p align="center"><input type="email" name="email" placeholder="Email" required />
<p align="center"><input type="password" name="password" placeholder="Password" required />
<p align="center"><input type="submit" name="submit" value="Register" />
</form>
<br /><br />

<?php } ?>
</body>
</html>
