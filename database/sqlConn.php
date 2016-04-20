<?php
	function sqlConn()
	{
		$tomConn = mysqli_connect(  );
		if( !$tomConn )
		{
			die( "FAILED -> " . mysqli_connect_error( $tomConn ) );
		}
		return( $tomConn );
	}


?>
