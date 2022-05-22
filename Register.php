<?php 
session_start();
if(isset($_SESSION['loggeduser'])){
    header('location:profile.php');
}
?>
<html>
<head>
	<title>Registar Form </title>

	<meta charset="UTF-8" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/login.css" >
	<script src="js/script_register.js"></script>
	<style>


	</style>
</head>

<body>
<div id="myDiv">
  <h2 style="text-align:center"> Registration Form </h2>
  <form id="form" onsubmit="return validation()" method="post" name="regForm"  action="Registerform.php">
		<label>User Name: *</label>
		<input type="text" name="username" placeholder="user name" size="25" />
		
		<label>Email: *</label>
		<input type="text" name="email" size="25" placeholder="Your Email" />

		<label>Password: *</label>
		<input type="password" name="password" placeholder="Your Password" size="25" />
		<label>City:</label>
		<input type="text" name="city" size="25" placeholder="Your city" />
		<label>Address:</label>
		<input type="text" name="address" size="25" placeholder="Your Address" />
		<label>Phone:</label><br><br>
		<input style=" height :35px  " type="tel" name="mobile" size="35" placeholder="Your Phone" /><br><br>

		<div align="center">
		<input type="submit" value="Register" name="submit" />
		<input type="reset" value="Clear" onclick="clear2();" /><br><br>
		<?php  echo "<span>Have already an account?</span><a id='login' href='login.php'>login<a>";?>
		<div>
  </form>
</div>


<?php

require "config.php";

if(isset($_POST['submit'])){
if(!empty($_POST['username'] ) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['city']) && !empty($_POST['address']) && !empty($_POST['address']) && !empty($_POST['address']))
{
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$city=$_POST['city'];
$address=$_POST['address'];
$phone=$_POST['mobile'];



$insertUser= "INSERT INTO  user (password,email,address,city,phone,username)
 VALUES (:password,:email,:address,:city,:phone,:username)";
 
// injection

$result=$pdo->prepare($insertUser);
$result->execute([':password'=>$password,':email'=>$email,':address'=>$address,':city'=>$city,':phone'=>$phone,':username'=>$username]);
$count=$result->rowCount();
if($count==1){
    echo "<h2 style='color:blue'>User Created succssfully</h2>";
    //  echo "<span>Have already an account?</span><a id='login' href='loginform.php'>login<a>";
    
}else{
    echo "User failed to login";
}
}
}

?>


</body>

</html>

<!-- $login= "SELECT * FROM user WHERE password='$password' and email='$email' ";
 

$result=$pdo->query($login);
$user=$result->fetch();
$count=$result->rowCount();

if($count==1){
session_start();
$_SESSION['loggeduser']=$email;
header('location:profile.php');
}else{
	echo "<h3 style='color:red'>Invalid user name and password</h3>";
}

} -->