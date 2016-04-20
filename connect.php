<?php
	$myConn = mysqli_connect( "localhost:3306" , "root" , "qweasd" , "hpg" );

	if( !$myConn )
	{
		die( "FAILED -> " . mysqli_connect_error( $myConn ) );
	}
?>
