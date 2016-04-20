<?php
	//-----> include '/Applications/MAMP/htdocs/hpgPortal/database/accounts/allClasses.php'; <------ 
	include '/Applications/MAMP/htdocs/hpgPortal/database/allClasses.php';
	session_start();

	$login = new logins( $_POST["username"] , $_POST["password"] );
	$login->select();  //sets loginVars which are used for session 

	$loginVars = $login->getLoginVars();

	if( !isset( $loginVars ) )
	{
		// 4/16
		// I HAVE INCLUDED THE HEADER FILE HERE 
		// BECAUSE IF THE LOGIN CREDENTIALS ARE CORRECT AN AUTOMATIC REDIRECT WILL OCCUR
		// END 4/16 COMMENT
		
		include '/Applications/MAMP/htdocs/hpgPortal/header.php';
		echo "<h3>Incorrect Login/Password</h3>";
		die( "<a href = '/hpgPortal/login/loginForm.php'>Try Again</a>" );
	}

	$_SESSION["logStatus"] = $loginVars["logStatus"];
	$_SESSION["logID"] = $loginVars["logID"];
	$_SESSION["logName"] = $loginVars["logName"];

	// AT THIS POINT SESSION VARIABLES ASSOCIATED WITH logins TABLE ARE SET

	// NEED TO NOW USE logins( id ) to aquire clients( id )


	// clientLog class constructor: public function __construct( $clientID , $loginID )

	$clientLog = new clientLog( 0 , $_SESSION["logID"] ); //PASS 0 FOR UNKNOWN RATHER THAN NULL
	$clientLog->select(); //WILL SET VALUE FOR clientLog( clientID )

	$_SESSION["clientID"] = $clientLog->getClientID(); //use this for clients( name )


	// client class constructor: public function __construct( $id  , $name )

	$client = new clients( $_SESSION["clientID"] , 0 ); //PASS 0 FOR UNKNOWN RATHER THAN NULL
	$client->select(); //sets clients(name) per clients( id )

	$_SESSION["clientName"] = $client->getClientName();



	echo "<script>window.onload=function(){window.location.href='/hpgPortal/';}</script>";














	







	// include '/Applications/MAMP/htdocs/hpgPortal/footer.php';
?>
