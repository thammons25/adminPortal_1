<?php
	class notifyClient extends db 
	{
		private $cNotifyID;
		private $cClientID;

		private $cAllClientNotifs; //array that will hold all notification ID's correspoinding to clientID

		public function __construct( $notifyID , $clientID )
		{
			$this->myConn = sqlConn();

			$this->cNotifyID = sanitizeInput( $notifyID );
			$this->cClientID = sanitizeInput( $clientID );

			$this->cAllClientNotifs = array();
		}

		public function insert()
		{
			$tempConn = $this->myConn;
			$this->sqlInsert = $tempConn->prepare( "INSERT INTO notifyClient( notifyID , clientID ) VALUES(?,?)" );

			$tempInsert = $this->sqlInsert;

			$tempInsert->bind_param( "ii" , $this->cNotifyID , $this->cClientID );

			$this->result = $tempInsert->execute();
			checkResult( $this->result , "notCli ins" , $tempConn );
			$tempInsert->close();
		}

		public function select()
		{
			$this->sqlSelect = "SELECT notifyID , clientID FROM notifyClient 
								WHERE notifyID = " . $this->cNotifyID . "
								OR clientID = " . $this->cClientID;
			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "notCli sel" , $this->myConn );

			if( mysqli_num_rows( $this->result ) > 0 )
			{
				while( $row = mysqli_fetch_assoc( $this->result ) )
				{
					$this->cNotifyID = sanitizeInput( $row["notifyID"] );
					$this->cClientID = sanitizeInput( $row["clientID"] );
				}
			}
		}




		public function getNotificationID()
		{
			return $this->cNotifyID;
		}


		//(4.18 I MIGHT DELETE THIS FUNCTION IT REALLY ISNT NECESSARY BECAUSE THE CLIENT ID IS SET UPON LOGGING IN)
		public function getClientID()
		{
			return $this->cClientID;
		}

		public function setClientNotifIDs() //will select all notification ID's for clientID
		{									//stores them sequentially into cAllClientNotifs
			$this->sqlSelect = "SELECT notifyID FROM notifyClient WHERE clientID = " . $this->cClientID;

			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "cliNot sel" , $this->myConn );

			if( mysqli_num_rows( $this->result ) > 0 )
			{
				while( $row = mysqli_fetch_assoc( $this->result ) )
				{
					array_push( $this->cAllClientNotifs , sanitizeInput( $row["notifyID"] ) );
				}
			}
		}


		public function getClientNotifIDs() //returns the array containing all notificationIDs
		{
			return $this->cAllClientNotifs;
		}
	}














?>
