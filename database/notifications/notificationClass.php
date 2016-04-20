<?php
	class notifications extends db 
	{
		private $cID;
		private $cSubject;
		private $cContent;
		private $cDate;


		public function __construct( $id , $subject , $content , $date ) //(4/18)included date in case need to search per date added?
		{
			$this->myConn = sqlConn();

			$this->cID = sanitizeInput( $id );
			$this->cSubject = sanitizeInput( $subject );
			$this->cContent = sanitizeInput( $content );
			$this->cDate = sanitizeInput( $date );
		}

		public function insert() //user creates message with subject/content 
		{						 //this inserts it and then grabs the id number afterwards for use
			$tempConn = $this->myConn;

			$this->sqlInsert = $tempConn->prepare( "INSERT INTO notifications( subject , content ) VALUES(?,?)" );
			$tempInsert = $this->sqlInsert;

			$tempInsert->bind_param( "ss" , $this->cSubject , $this->cContent );

			$this->result = $tempInsert->execute();
			checkResult( $this->result , "notification ins" , $tempConn );

			$this->cID = mysqli_insert_id( $tempConn );

			$tempInsert->close();
		}

		public function select() //will prepare subject and content values per notifications( id )
		{
			$this->sqlSelect = "SELECT id , subject , content , date FROM notifications 
								WHERE id = " . $this->cID;
			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "notifications select" , $this->myConn );

			if( mysqli_num_rows( $this->result ) > 0 ) 
			{
				while( $row = mysqli_fetch_assoc( $this->result ) )
				{
					$this->cSubject = sanitizeInput( $row["subject"] );
					$this->cContent = sanitizeInput( $row["content"] );
					$this->cDate = sanitizeInput( $row["date"] );
				}
			}
		}

		public function getNotificationID()
		{
			return $this->cID;
		}

		public function getNotificationSubject()
		{
			return $this->cSubject;
		}

		public function getNotificationContent()
		{
			return $this->cContent;
		}

		public function getNotificationDate()
		{
			return $this->cDate;
		}
	}





















?>
