<?php
	class notifyLogin extends db 
	{
		private $cNotifyID;
		private $cLoginID;

		// private $cAllAuthorNotifs; //will be array that will store all notifcations posted by given loginID

		public function __construct( $notifyID , $loginID )
		{
			$this->myConn = sqlConn();

			$this->cNotifyID = sanitizeInput( $notifyID );
			$this->cLoginID = sanitizeInput( $loginID );

			// $this->cAllAuthorNotifs = array();
		}

		public function insert()
		{
			$tempConn = $this->myConn;

			$this->sqlInsert = $tempConn->prepare( "INSERT INTO notifyAuthor( notifyID , loginID ) VALUES(?,?)" );
			$tempInsert = $this->sqlInsert;

			$tempInsert->bind_param( "ii" , $this->cNotifyID , $this->cLoginID );

			$this->result = $tempInsert->execute();
			checkResult( $this->result , "notAuth ins" , $tempConn );
			$tempInsert->close();
		}

		public function select() //(4.18) should allow to select notifyAuthor( notifyID , loginID ) per notifyID OR loginID
		{						 //
			$this->sqlSelect = "SELECT notifyID , loginID FROM notifyAuthor 
								WHERE notifyID = " . $this->cNotifyID . "
								OR loginID = " . $this->cLoginID;
			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "notAuth sel" , $this->myConn );

			if( mysqli_num_rows( $this->result ) > 0 )
			{
				while( $row = mysqli_fetch_assoc( $this->result ) )
				{
					$this->cNotifyID = sanitizeInput( $row["notifyID"] );
					$this->cLoginID = sanitizeInput( $row["loginID"] );
				}
			}
		}


		public function selectLoginID()
		{
			$this->sqlSelect = "SELECT loginID FROM notifyAuthor WHERE notifyID = " . $this->cNotifyID;
			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "notAuth sel2" , $this->myConn );

			if( mysqli_num_rows( $this->result ) > 0 )
			{
				while( $row = mysqli_fetch_assoc( $this->result ) )
				{
					$this->cLoginID = sanitizeInput( $row["loginID"] );
				}
			}
		}


		// public function setLoginNotifIDs()
		// {
		// 	$this->sqlSelect = "SELECT loginID FROM notifyLogin WHERE notifyID = " . $this->cNotifyID;
		// 	$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
		// 	checkResult( $this->result , "notAuth sel" , $this->myConn );

		// 	if( mysqli_num_rows( $this->result ) > 0 ) 
		// 	{
		// 		while( $row = mysqli_fetch_assoc( $this->result ) )
		// 		{
		// 			array_push( $this->cAllAuthorNotifs , sanitizeInput( $row["loginID"] ) );
		// 		}
		// 	}

		// }

		// public function getLoginNotifIDs()
		// {
		// 	return $this->cAllAuthorNotifs;
		// }

		public function getNotificationID()
		{
			return $this->cNotifyID;
		}

		
		public function getLoginID()
		{
			return $this->cLoginID;
		}
	}
















?>
