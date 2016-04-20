<?php
	class messageBoard extends db 
	{
		private $cID;
		private $cSubject;
		private $cContent;

		public function __construct( $id , $subject , $content )
		{
			$this->myConn = sqlConn();

			$this->cID = sanitizeInput( $id );
			$this->cSubject = sanitizeInput( $subject );
			$this->cContent = sanitizeInput( $content );
		}


		public function insert()
		{
			$tempConn = $this->myConn;
			$this->sqlInsert = $tempConn->prepare( "INSERT INTO messageBoard( subject , content ) VALUES(?,?)" );
			$tempInsert = $this->sqlInsert;

			$tempInsert->bind_param( "ss" , $this->cSubject , $this->cContent );

			$this->result = $tempInsert->execute();
			checkResult( $this->result , "messageBoard ins" , $tempConn );

			$this->cID = mysqli_insert_id( $tempConn );

			$tempInsert->close();
		}


		public function select() //will use to get subject and content per id
		{						 //assumes that NULL was passed to constructor for subject and content 
			$this->sqlSelect = "SELECT subject , content FROM messageBoard WHERE id = " . $this->cID;

			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "messageBoard sel" , $this->result );

			if( mysqli_num_rows( $this->result ) > 0 )
			{
				while( $row = mysqli_fetch_assoc( $this->result ) )
				{
					$this->cSubject = sanitizeInput( $row["subject"] );
					$this->cContent = sanitizeInput( $row["content"] );
				}
			}
		}

		public function getMessageID()
		{
			return $this->cID;
		}

		public function getMessageSubject()
		{
			return $this->cSubject;
		}

		public function getMessageContent()
		{
			return $this->cContent;
		}
	}











?>
