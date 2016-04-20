<?php
	$myConn = mysqli_connect(  );

	if( !$myConn )
	{
		die( "FAILED -> " . mysqli_connect_error( $myConn ) );
	}
?>
