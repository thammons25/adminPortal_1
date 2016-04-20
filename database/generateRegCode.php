<?php
	$myConn = mysqli_connect( "localhost:3306" , "root" , "qweasd" , "hpg" );

	$code = sha1("tom3dhhq1p" );
	echo "regCode -> "  . $code . "<br />";

	$insert = $myConn->prepare( "INSERT INTO registerCode(regNum) VALUES(?)" );
	$insert->bind_param( "s" , $code );

	$confirm = $insert->execute();

	if( !$confirm )
	{
		die( "FAILED" );
	}

	else
	{
		echo "good";
	}




?>
