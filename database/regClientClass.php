<?php
	class regClient extends db 
	{
		private $cRegID;
		private $cClientID;

		public function __construct( $regID , $clientID )
		{
			$this->myConn = sqlConn();
			$this->cRegID = sanitizeInput( $regID );
			$this->cClientID = sanitizeInput( $clientID );
		}

		public function insert() {} //this doesnt need anything because i will insert it manually on terminal

		public function select() //this function will set $this->cClientID w/ value regClient( clientID )
		{
			$this->sqlSelect = "SELECT clientID FROM regClient WHERE regID = " . $this->cRegID;
			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "regClient sel" , $this->myConn );

			if( mysqli_num_rows( $this->result ) == 1 )
			{
				while( $row = mysqli_fetch_assoc( $this->result ) )
				{
					$this->cClientID = sanitizeInput( $row["clientID"] );
				}
			}
		}

		public function getClientID() 
		{
			return $this->cClientID;
		}
	}












?>
