<?php 
session_start();
//print_r($_SERVER['REQUEST_METHOD']);
if($_SERVER['REQUEST_METHOD']=='GET'){
	//echo "string";
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$conn=mysqli_connect('localhost','root','','libraries');
	if(! $conn){
		echo mysqli_connect_error();
		exit;
	}


	$email=mysqli_escape_string($conn,$_POST['email']);
	$password=sha1($_POST['password']);
	$query="SELECT * FROM `users` WHERE `email`='".$email."' and `password`='".$password."' LIMIT 1";
	//$query="SELECT * FROM `users` WHERE `id` = 1";
// echo $query;
	//echo $password;
	$result=mysqli_query($conn,$query);
	if($row=mysqli_fetch_assoc($result)){
		$_SESSION['id']=$row['id'];
		$_SESSION['email']=$row['email'];
		$_SESSION['loggedIn']=true;
		$_SESSION['name']=$row['name'];

		header('Location:index.php');
		exit;
	}
	else {
		$error='Invalid email or password';
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	 <div class="header">
                <h1 class="title">our Library</h1>
      </div>

            <div class="nav">
                <a href="index.php" class="home">HOME</a></div>
<div class="p_log">
	<?php if(isset($error)){?><span class="error"><?php echo $error;}?></span> 
	<form method="post" >
		<h1>Login form</h1>
		<label for="email" class="e">Your Email</label><br/><br/>
		<input type="email" name="email" id="email" value="<?=(isset($_POST['email']))? $_POST['email']:''?>" /><br/><br/>
		<label for="password" class="e">Your Password</label><br/><br/>
		<input type="password" name="password" id="password"/><br/>
		<br/>
		<input class="button" type="submit" name="sumit" value="LOGIN"/>

		

	</form>

</div>
</body>
</html>