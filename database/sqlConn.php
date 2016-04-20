<?php
	function sqlConn()
	{
		$tomConn = mysqli_connect( "localhost:3306" , "root" , "qweasd" , "hpg" );
		if( !$tomConn )
		{
			die( "FAILED -> " . mysqli_connect_error( $tomConn ) );
		}
		return( $tomConn );
	}


?>
