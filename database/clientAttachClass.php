<?php
	class clientAttach extends db 
	{
		private $cClientID;
		private $cAttachID;


		public function __construct( $clientID , $attachID )
		{
			$this->myConn = sqlConn();

			$this->cClientID = sanitizeInput( $clientID );
			$this->cAttachID = sanitizeInput( $attachID );
		}

		public function insert()
		{
			$tempConn = $this->myConn;

			$this->sqlInsert = $tempConn->prepare( "INSERT INTO clientAttach( clientID , attachID ) VALUES(?,?)" );
			$tempInsert = $this->sqlInsert;

			$tempInsert->bind_param( "ii" , $this->cClientID , $this->cAttachID );

			$this->result = $tempInsert->execute();
			checkResult( $this->result , "cliAtt ins" , $tempConn );

			$tempInsert->close();
		}

		public function select()
		{
			$this->sqlSelect = "SELECT clientID , attachID FROM clientAttach 
								WHERE clientID = " . $this->cClientID . "
								OR attachID = " . $this->cAttachID;
			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "cliAtt sel" , $this->myConn );

			if( mysqli_num_rows( $this->result ) > 0 ) 
			{
				while( $row = mysqli_fetch_assoc( $this->result ) ) 
				{
					$this->cClientID = sanitizeInput( $row["clientID"] );
					$this->cAttachID = sanitizeInput( $row["attachID"] );
				}
			}
		}

		public function getClientID()
		{
			return $this->cClientID;
		}

		public function getAttachmentID()
		{
			return $this->cAttachID;
		}


	}











?>
