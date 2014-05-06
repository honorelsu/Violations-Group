<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
</head>
<body>
<?php
  require('../controller/accountcontroller.php');
	if(isset($_POST["usermail"])){
		try {
			/*Validate email address*/		
			if(!filter_var($_POST['usermail'], FILTER_VALIDATE_EMAIL))
				throw new Exception('Please use a valid email address');
			/*Ensure something is input into password and confirm*/
			if(!isset($_POST['password']) or !isset($_POST['confirm']))
				throw new Exception('Please input password and confirm');
			/*Ensure password is equal to confirm*/
			if(strcmp($_POST['password'], $_POST['confirm']) != 0)
				throw new Exception('Passwords don\'t match');
			createaccount($_POST['usermail'], $_POST['password']);
			echo 'Created account successfully';
		}
		catch(Exception $e) {
			echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}	
?>
<section class="loginform cf">


<form name="login" action="createaccount.php" method="post" accept-charset="utf-8">
	<ul>
		<li><label for="usermail">Email</label>
		<input type="email" name="usermail" placeholder="yourname@email.com" required></li>
		<li><label for="password">Password</label>
		<input type="password" name="password" placeholder="password" required></li>
		<li><label for="password">Confirm Password</label>
		<input type="password" name="confirm" placeholder="confirm" required></li>
		<li><input type="submit" value="Create Account"></li>
	</ul>
</form>
</section>
</body>
</html>