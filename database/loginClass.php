<?php
	class logins extends db 
	{
		private $cID;
		private $cUsername;
		private $cPassword;
		private $cLogVars;

		private $cNotifyUsername;
		private $cNotifyID;




		public function __construct( $username , $password )
		{
			// THIS IS BECAUSE I SCREWED UP THIS CLASS AND DONT WANT TO REDO THE WHOLE LOGIN PAGE 
			// IM GOING TO PASS A loginID for $username TO GET THE logins( username ) 

			$this->myConn = sqlConn();
			$this->cUsername = sanitizeInput( $username );
			$this->cNotifyID = sanitizeInput( $username );

			
			$this->cPassword = md5( $password );

			$this->cLogVars = array(
				'logStatus' => 0 , 
				'logID' => NULL , 
				'logName' => NULL 
				);

		}

		public function selectUsername()
		{
			$this->sqlSelect = "SELECT username FROM logins WHERE id = " . $this->cNotifyID;
			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "log sel" , $this->myConn );

			if( mysqli_num_rows( $this->result ) != 0 )
			{
				while( $row = mysqli_fetch_assoc( $this->result ) )
				{
					$this->cNotifyUsername = sanitizeInput( $row["username"] );
				}
			}
		}

		public function getUsername()
		{
			return $this->cNotifyUsername;
		}

		// I DONT KNOW IF THIS IS LEGIT OR NOT BUT I'M CREATING A FUNCTION THAT GIVES A USERNAME PER LOGIN ID 
		// IM USING IT FOR DISPLAYING THE NAME OF THE NOTIFICATION POSTER
		// I AM GOING TO MISUE THE CONSTRUCT FUNCTION THOUGH AND PASS IT AS logins( $id , NULL )

		// public function setUsername()
		// {
		// 	$this->sqlSelect = "SELECT username FROM logins WHERE id = " . $this->cIDforNotify;
		// 	$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
		// 	checkResult( $this->result , "log sel" , $this->myConn );
		// 	if( mysqli_num_rows( $this->result ) == 1 )
		// 	{
		// 		while( $row = mysqli_fetch_assoc( $this->result ) )
		// 		{
		// 			$this->cUsernameForNotify = sanitizeInput( $row["id"] );
		// 		}
		// 	}
		// }

		// public function getUsername()
		// {
		// 	return $this->cUsernameForNotify;
		// }


		public function insert() //NOTE THAT WHEN SIGNING SOMEONE UP , logID = $this->cID
		{
			$tempConn = $this->myConn;
			$this->sqlInsert = $tempConn->prepare( "INSERT INTO logins( username , password ) VALUES(?,?)" );
			$tempInsert = $this->sqlInsert;
			$tempInsert->bind_param( "ss" , $this->cUsername , $this->cPassword );
			$this->result = $tempInsert->execute();
			checkResult( $this->result , "log ins" , $tempConn );
			$this->cID = mysqli_insert_id( $tempConn );
			$tempInsert->close();
		}

		public function select() //NOTE THAT WHEN SIGNING SOMEONE IN (RETURNING) logID = row['id']
		{
			$this->sqlSelect = "SELECT id , username , password FROM logins 
								WHERE username = '" . $this->cUsername . "' 
								AND password = '" . $this->cPassword . "' ";
			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "log sel" , $this->myConn );

			if( mysqli_num_rows( $this->result ) == 1 )
			{
				$dummy = $this->cLogVars;
				$dummy['logStatus'] = 1 ;
				if( !isset( $this->cID ) )
				{
					while( $row = mysqli_fetch_assoc( $this->result ) )
					{
						$dummy['logID'] = sanitizeInput( $row["id"] );
					}

				}
				else
				{
					$dummy["logID"] = $this->cID;
				}

				

				
				$dummy['logName'] = $this->cUsername;

				$this->cLogVars = $dummy;
			}
			else
			{
				// $this->cLogVars = array();
				$this->cLogVars = NULL;
			}

		}

		public function getLoginVars()
		{
			return $this->cLogVars;
		}
	}
	// RAN THIS TEST AND IT WORKED

	// $tom = new logins( "tjh12003" , "qweasd" );
	// $tom->insert();
	// $tom->select();
	// $tomVars = $tom->getLoginVars();
	// print_r( $tomVars );







?>
