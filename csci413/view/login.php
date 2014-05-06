<?php
session_start();
session_regenerate_id(true);
?>
<html>
 <head>
  <title>Welcome to Lake Charles City Court</title>
 </head>
 <body>
	 <?php
	 require('../controller/sessioncontroller.php');
	 if(isset($_POST['usermail'])) {
	 	try {
		 	//Validate email address
		 	if(!filter_var($_POST['usermail'], FILTER_VALIDATE_EMAIL))
		 		throw new Exception('Please use a valid email address');
		 	/*Ensure something is input into email and password*/
			if(!isset($_POST['usermail']) or !isset($_POST['password']))
				throw new Exception('Please input username and password');
			echo 'Login successful';
	 	}
	 	catch(Exception $e) {
		 	echo '<p class="error">'.$e->getMessage().'</p>';
		 	}
	 	}
	/*
	 require('../controller/sessioncontroller.php');
		 if(!isset($_SESSION['username']))
		 	throw new Exception('User is already logged in');
		 if(!isset($_POST['usermail'], $_POST['password'])) {
			throw new Exception('Please enter a valid username and password');
		 }
		 else {
			 $username = filter_var($_POST['usermail'], FILTER_SANITIZE_STRING);
		 	 $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		 	 log_in($username, $password);
		 	 }
*/
	 ?>
	 <section class="loginform cf">
		 <form name="login" action="login.php" method="post" accept-charset="utf-8">
	<ul>
		<li><label for="usermail">Email</label>
		<input type="email" name="usermail" placeholder="yourname@email.com" required></li>
		<li><label for="password">Password</label>
		<input type="password" name="password" placeholder="password" required></li>
		<li><input type="submit" value="Login"></li>
	</ul>
</form>
</section>
 </body>
</html>