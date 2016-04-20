
<!-- COMMENTS 4/16 -->

<!-- THIS PAGE DOES NOT NEED ANY INCLUDES BECAUSE THE USER WILL NEVER NOTCIE IT -->

<!-- ALL IT DOES IT STRIP AWAY ALL THE SESSION VARIABLES AND RETURN TO THE INDEX PAGE -->

<!-- END 4/16 COMMENTS -->



<script language = "JavaScript">
<!--
	window.onload = function()
	{
		window.location.href = '/hpgPortal/';
	}
//-->
</script>
<?php
	session_start();

	$_SESSION = array();

	if( ini_get( "session.use_cookies" ) )
	{
		$params = session_get_cookie_params();
		setcookie( session_name() , '' , time()-42000 ,
			$params["path"] , $params["domain"] , 
			$params["secure"] , $params["httponly"]
		);
	}
	session_destroy();

?>
