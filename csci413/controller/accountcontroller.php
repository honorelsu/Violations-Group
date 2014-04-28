<?php
	require('../init.php');
	$db_conn = db_connect();
	
	function createaccount($email, $password) {
		global $db_conn;
		$statement = $db_conn->prepare('INSERT INTO User(email, password, create_time) VALUES (?,?,?)');
		$passhash = hash('sha512', $email.$password);
		$currenttime = date("Y-m-d H:i:s", time());
		if($statement->execute(array($email, $passhash, $currenttime)) == false) {
			if(strcmp($statement->errorInfo()[0],'23000')== 0)
				throw new Exception('User '.$email.' already exists');
			$error_msg = $statement->errorInfo();
			throw new Exception('ERROR adding user '. $error_msg[2].' . Error code: '.$error_msg[0]);
		}
	}
?>