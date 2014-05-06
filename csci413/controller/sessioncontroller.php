<?php
require('../init.php');
$db_conn = db_connect();
  
function log_in() {
	global $db_conn;
	$statement = $db_conn->prepare("SELECT * FROM user WHERE email=? AND password=?");
	$passhash = hash('sha512', $email.$passhash);
	/* $currenttime = date("Y-m-d H:i:s", time()); */
	if($statement->execute(array($email, $passhash)) == false) {
		if(strcmp($statement->errorInfo()[0], '23000')== 0)
			throw new Exception('Email and password incorrect');
		$error_msg = $statement->errorInfo();
		throw new Exception('Error logging in '.'Error Code '.$error_msg[0]);
		}
	}

function log_out() {
	session_start();
	$_SESSION = array();
	if(ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]);
	}
	session_destroy();
}
  	  
function update_session() {
  	session_regenerate_id();
  	
  	$session_last_update = get_session_last_update();
                               
	if( $session_last_update == 0 )
		log_out();
                               
	if( time() - $session_last_update > SESSION_EXP_TIME )
		log_out();
		}
?>