<!-- THIS CLASS IS BROKEN(4/16) -->

<!-- ITS FUNCTIONS ALL TECHNICALLY WORK -->
	<!-- IT CANNOT INSERT VALUES BECAUSE IT DOES NOT HAVE ANY WAY TO OBTAIN A clientID VALUE -->
	<!-- CONVERSELY, IT CANNOT SELECT ANY INFORMATION BECAUSE THE ROW FROM WHICH DATA SHOULD BE SELECTED CAN NEVER BE PUT THERE -->

<!-- IT WAS SCREWED UP BECAUSE I WANTED TO ASCERTAIN SESSION VARIABLES clientID AND clientName  -->

<!-- IT WASNT COMPATIBLE WITH THE REGISTRATION PROCESS THOUGH -->
<!-- RELEVANT PAGES -->
	<!-- LOGIN: /hpgPortal/login/validateLogin.php -->
	<!-- REGISTER: /hpgPortal/register/createNewLogin.php -->

<!-- I MADE A FUNCTION: /hpgPortal/register/auxInsertClientLog.php TO AID THE REGISTRATION PROCESS UNTIL IT IS FIXED -->

<?php
	
	class clientLog extends db 
	{
		private $cClientID;
		private $cLoginID;

		// IF YOU NEED TO USE THIS CLASS BUT LACK A PIECE OF INFORMATION FOR CONSTRUCTOR JUST USE ZERO
		// I TRIED USING NULL FOR UNKNOWN VALUES BUT IT DIDNT WORK
		// I HAVE NO EXPLANATION FOR IT THOUGHT BUT THE ZERO THING WORKS 4/16
		public function __construct( $clientID , $loginID ) 
		{
			$this->myConn = sqlConn();

			$this->cClientID = sanitizeInput( $clientID );
			$this->cLoginID = sanitizeInput( $loginID );
		}

		public function select()  //THIS WILL SELECT clients per logins
		{
			$this->sqlSelect = "SELECT clientID FROM clientLog WHERE loginID = " . $this->cLoginID;
			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "clientLog sel" , $this->myConn );

			if( mysqli_num_rows( $this->result ) == 1 )
			{
				while( $row = mysqli_fetch_assoc( $this->result ) )
				{
					$this->cClientID = sanitizeInput( $row["clientID"] );
				}
			}
		}

		public function insert()
		{
			$tempConn = $this->myConn;
			$this->sqlInsert = $tempConn->prepare( "INSERT INTO clientLog( clientID , loginID ) VALUES(?,?)" );
			$tempInsert = $this->sqlInsert;

			$tempInsert->bind_param( "ii" , $this->cClientID , $this->cLoginID );

			$this->result = $tempInsert->execute();
			checkResult( $this->result , "clientLog ins" , $tempConn );
			$tempInsert->close();
		}




		public function getClientID()
		{
			return $this->cClientID;
		}

	}





	// class clientLog extends db 
	// {
	// 	private $cClientID;
	// 	private $cLoginID;

	// 	public function __construct( $loginID )
	// 	{
	// 		$this->myConn = sqlConn();

	// 		$this->cLoginID = sanitizeInput( $loginID );
	// 	}

	// 	public function insert()
	// 	{
	// 		$tempConn = $this->myConn;

	// 		$this->sqlInsert = $tempConn->prepare( "INSERT INTO clientLog( clientID , loginID ) VALUES(?,?)" );
	// 		$tempInsert = $this->sqlInsert;

	// 		$tempInsert->bind_param( "ii" , $this->cClientID , $this->cLoginID );
	// 		$this->result = $tempInsert->execute();
	// 		checkResult( $this->result , "CL ins" , $tempConn );
	// 		$tempInsert->close();
	// 	}

	// 	public function select()
	// 	{
	// 		$this->sqlSelect = "SELECT clientID FROM clientLog WHERE loginID = " . $this->cLoginID;
	// 		$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
	// 		checkResult( $this->result , "cliLog sel" , $this->myConn );

	// 		if( mysqli_num_rows( $this->result ) > 0 )
	// 		{
	// 			while( $row = mysqli_fetch_assoc( $this->result ) )
	// 			{
	// 				$this->cClientID = sanitizeInput( $row["clientID"] );
	// 			}
	// 		}
	// 	}

	// 	public function getClientID()
	// 	{
	// 		return $this->cClientID;
	// 	}
	// }






?>
