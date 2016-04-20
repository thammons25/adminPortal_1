<!-- 
THIS PAGE SEEKS TO ACHIEVE THE FOLLOWING RESULTS  
	1). insert the username and password into the logins table 
	2). ascertain the corresponding clientID through the association between regClient( regID , clientID )
	3). update the clientLog table that keeps track of which logins belong to which clients
	4). ascertain the clientName associated with the clientID from #2
	5). set the following session variables
		-logStatus
		-logID
		-logName
		-clientID
		-clientName
		-regID -> NULL
	6). redirect back to the index without user accessing this page.
-->

<!-- RAN TEST 4/16/16 @ 9:15PM AND WORKS JUST FINE THANK FUCKING GOD-->



<!-- THE REASON YOU CANNOT USE NULL IN THE CONSTRUCTOR IS BECAUSE THE DEFAULT ON sanitizeInput() WAS TO exit() -->
<!-- 4/16 CHANGED IT SO THAT sanitizeInput($inputVar) default is $inputVar=$outputVar; -->

<!-- 4/16/2016 THIS WORKS RAN TEST WITH logins( thh09 , daisy3 ) -->
<?php

	// ------> include '/Applications/MAMP/htdocs/hpgPortal/database/accounts/allClasses.php'; <-----
	include '/Applications/MAMP/htdocs/hpgPortal/database/allClasses.php';
	session_start();

	if( $_POST["password"] != $_POST["passwordTwo"] )
	{
		include '/Applications/MAMP/htdocs/hpgPortal/header.php';

		echo "<h3>Passwords did not match</h3>";
		die( "<a href = '/hpgPortal/register/newClientForm.php'>Please Try Again</a>" );
	}

	// login class constructor: public function __construct( $username , $password )
	$login = new logins( $_POST["username"] , $_POST["password"] );
	$login->insert(); //puts into logins( usernbame , password )
	$login->select(); //sets loginVars

	$loginVars = $login->getLoginVars();

	$_SESSION["logStatus"] = $loginVars["logStatus"];
	$_SESSION["logID"] = $loginVars["logID"];
	$_SESSION["logName"] = $loginVars["logName"];

	// BY THIS POINT WE HAVE logins( id ) 
		// NEED clients( id ) 
		// NEED clients( name )


	// regClient class constructor: public function __construct( $regID , $clientID )
	$regClient = new regClient( $_SESSION["regID"] , NULL );
	$regClient->select(); //sets clientID value associated with registerCode( id )

	$_SESSION["clientID"] = $regClient->getClientID();


	// clientLog class constructor: public function __construct( $clientID , $loginID ) 
	$clientLog = new clientLog( $_SESSION["clientID"] , $_SESSION["logID"] );

	$clientLog->insert(); //inserts clientLog( clientID , loginID )

	// regLogin class constructor: public function __construct( $regID , $loginID )
	$regLogin = new regLogin( $_SESSION["regID"] , $_SESSION["logID"] );
	$regLogin->insert(); //insert keeps association between registerCodes and loginID

	$client = new clients( $_SESSION["clientID"] , NULL );
	$client->select(); //sets value for clients( name )

	$_SESSION["clientName"] = $client->getClientName();
	$_SESSION["regID"] = NULL;

	echo "<script>window.onload=function(){window.location.href='/hpgPortal/';}</script>";



?>
