
<?php
session_start();
if(isset($_SESSION['loggeduser'])){
    header('location:profile.php');
}


?>
<html>
<head>
	<title> Login </title>
	<meta charset="UTF-8" />
	<?php include 'include/style.php' ?> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/login.css" >
	<script src="js/script_login.js"></script>
</head>

<body>
<!-- Header -->
<?php include 'include/header.php' ?> 

<!-- Cart -->
<?php include 'include/smal_cart.php'; ?> 

<div id="myDiv" style="margin-top: 200px;">
  <h3 align="center"> Login </h3>
  <form onsubmit="validation()" method="post" name="logform"  action="">
		
		<label>Email: *</label>
		<input type="text" name="email" size="25" placeholder="Your Email" />

		<label>Password: *</label>
		<input type="password" name="password" placeholder="Your Password" size="25" />
		

		<div align="center">
		<input type="submit" value="Login" name="login" />
		
		<div>
  </form>
</div>



<?php

require "config.php";

if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];

$login= "SELECT * FROM user WHERE password='$password' and email='$email' ";
 

$result=$pdo->query($login);
$user=$result->fetch();
$count=$result->rowCount();

if($count==1){
session_start();
$_SESSION['loggeduser']=$user['user_id'];
header('location:profile.php');
}else{
	echo "<h3 style='color:red'>Invalid user name and password</h3>";
}

}






?>
<?php include 'include/js.php'; ?>
</body>

</html>