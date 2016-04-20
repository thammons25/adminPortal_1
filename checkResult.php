<?php
	$dir = dirname( __FILE__ );
	include $dir . "/connect.php";
	function checkResult( $result , $procedure , $conn )
	{
		if( !($result) )
		{
			die( "FAILED( " . $procedure . " ) -> " . mysqli_error( $conn ) );
		}
	}
	// SAMPLE TEST BELOW FOR HOW TO WORK THIS 

	// $tom = "SELECT * FROM pretend";
	// $ham = mysqli_query( $myConn , $tom );
	// checkResult( $ham , "select" , mysqli_error( $myConn ) );

?>
