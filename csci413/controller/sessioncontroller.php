<?php
if (!isset($_SESSION)) {
  session_start();
}
  require('../init.php');
  
  	  
  
  function update_session() {
  	session_regenerate_id();
  	
  	$session_last_update = get_session_last_update();
                               
	if( $session_last_update == 0 )
		log_out();
                               
	if( time() - $session_last_update > SESSION_EXP_TIME )
		log_out();
		}
?>