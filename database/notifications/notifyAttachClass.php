<?php
	class notifyAttach extends db 
	{
		private $cNotifyID;
		private $cAttachID;

		public function __construct( $notifyID , $attachID )
		{
			$this->myConn = sqlConn();

			$this->cNotifyID = sanitizeInput( $notifyID );
			$this->cAttachID = sanitizeInput( $attachID );
		}

		public function insert()
		{
			$tempConn = $this->myConn;

			//not a typo - column name is actually "notifID" there is no "y"
			$this->sqlInsert = $tempConn->prepare( "INSERT INTO notifyAttach( notifID , attachID ) VALUES(?,?)" );
			$tempInsert = $this->sqlInsert;

			$tempInsert->bind_param( "ii" , $this->cNotifyID , $this->cAttachID );
			$this->result = $tempInsert->execute();
			checkResult( $this->result , "notAtt ins" , $this->myConn );
			$tempInsert->close();
		}

		public function select()
		{
			$this->sqlSelect = "SELECT notifID , attachID FROM notifyAttach
								WHERE notifID = " . $this->cNotifyID . "
								OR attachID = " . $this->cAttachID ;
			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "notatt sel" , $this->myConn );

			if( mysqli_num_rows( $this->result ) > 0 )
			{
				while( $row = mysqli_fetch_assoc( $this->result ) )
				{
					$this->cNotifyID = sanitizeInput( $row["notifID"] );
					$this->cAttachID = sanitizeInput( $row["attachID"] );
				}
			}
		}

		public function getNotificationID()
		{
			return $this->cNotifyID;
		}

		public function getAttachmentID()
		{
			return $this->cAttachID;
		}
	}












?>
