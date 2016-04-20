<!-- THIS PAGE WILL ONLY INCLUDE THE HEADER AND FOOTER IF THE LOGIN STUFF IS WRONG -->

<!-- IF THE REGISTRATION CODE PROVIDED IS CORRECT IT WILL USE JAVASCRIPT TO REDIRECT THE PAGE TO /register/newLoginForm.php -->
<!-- USER WILL NOT SEE ANYTHING IF IT IS CORRECT -->
<?php
	// include '/Applications/MAMP/htdocs/hpgPortal/header.php';

	// ----> include '/Applications/MAMP/htdocs/hpgPortal/database/accounts/allClasses.php'; <-----
	include '/Applications/MAMP/htdocs/hpgPortal/database/allClasses.php';
	include __DIR__ . "/validateRegCode.php";
	session_start();


	$regCode = sanitizeInput( $_POST["regCode"] );

	$regID = validateRegCode( $regCode );

	// I AM INCLUDING THIS SESSION VARIABLE FOR LATER USE ON ./createNewLogin.php 

	// I WILL MOST LIKELY TERMINATE IT THEN BUT I NEED IT FOR GETTING THE clientID 

	// THIS IS BECAUSE THE validateRegCode function will return a regID , which can be used to query
	// regClient( regID ) and yield regClient( clientID )
	$_SESSION["regID"] = $regID;

	if( !isset( $regID ) )
	{
		include '/Applications/MAMP/htdocs/hpgPortal/header.php';
		echo "<h1>Incorrect Registration Code</h1>";
		echo "<h2><a href = '/hpgPortal/register/newClientForm.php'>Try Again</a></h2>";
		include '/Applications/MAMP/htdocs/hpgPortal/footer.php';
	}
	else
	{
		echo "<script>window.onload=function(){window.location.href='/hpgPortal/register/newLoginForm.php';}</script>";
		// echo "<h4>
		// 		<a href = '/hpgPortal/register/newLoginForm.php'>Proceed With HPG Registration</a>
		// 	  </h4>";
	}
















?>
