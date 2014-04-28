
<html>
 <head>
  <title>Welcome to Lake Charles City Court</title>
 </head>
 <body>
	 <?php
		 require('../controller/sessioncontroller.php');
		 if(isset($_SESSION['usermail']))
		 	throw new Exception('User is already logged in');
		 if(!isset($_POST['usermail'], $_POST['password'])) {
			throw new Exception('Please enter a valid username and password');
		 }
		 else {
			 $username = filter_var($_POST['usermail'], FILTER_SANITIZE_STRING);
		 	 $username = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		 	 }
	 ?>
	 <section class="loginform cf">
		 <form name="login" action="index_submit" method="get" accept-charset="utf-8">
	<ul>
		<li><label for="usermail">Email</label>
		<input type="email" name="usermail" placeholder="yourname@email.com" required></li>
		<li><label for="password">Password</label>
		<input type="password" name="password" placeholder="password" required></li>
		<li>
		<input type="submit" value="Login"></li>
	</ul>
</form>
</section>
 </body>
</html>