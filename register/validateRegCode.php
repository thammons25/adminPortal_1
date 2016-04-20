<!-- FUNCTION TRIES TO SELECT THE registerCode( id ) BASED UPON THE registerCode( regNum ) PROVIDED BY USER (./newClientForm.php) -->


<!-- 4/16 -->
<!-- THIS CAN BE DONE THROUGH THE registerCodeClass PROBABLY  -->
<!-- THIS WORKS BUT IT SHOUYLD BE CHANGED -->
<?php
	function validateRegCode( $regCode )
	{
		$sqlSelect = "SELECT id , regNum FROM registerCode 
					  WHERE regNum = '" . $regCode . "' ";

		$result = mysqli_query( sqlConn() , $sqlSelect );

		checkResult( $result , "regCode sel" , sqlConn() );

		if( mysqli_num_rows( $result ) == 1 )
		{
			while( $row = mysqli_fetch_assoc( $result ) )
			{
				$regID = sanitizeInput( $row["id"] );
			}
		}



		return $regID;
	}


?>
