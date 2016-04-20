<!-- (4.19) ITS POSSIBLE I MIGHT NEEED TO MOVE THIS TO __DIR__ . "/notifications/" but havent used it yet so not sure -->
<?php
	class attachments extends db 
	{
		private $cID;
		private $cDescription;
		private $cDirName;

		public function __construct( $id , $description , $dirName )
		{
			$this->myConn = sqlConn();

			$this->cID = sanitizeInput( $id );
			$this->cDescription = sanitizeInput( $description );
			$this->cDirName = sanitizeInput( $dirName );
		}

		public function insert()
		{
			$tempConn = $this->myConn;

			$this->sqlInsert = $tempConn->prepare( "INSERT INTO attachments( description , dirName ) VALUES(?,?)" );
			$tempInsert = $this->sqlInsert;

			$tempInsert->bind_param( "ss" , $this->cDescription , $this->cDirName );

			$this->result = $tempInsert->execute();
			checkResult( $this->result , "attach ins" , $tempConn );

			$this->cID = mysqli_insert_id( $tempConn );
			$tempInsert->close();
		}


		public function select()
		{
			$this->sqlSelect = "SELECT id , description , dirName FROM attachments WHERE id = " . $this->cID;
			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "attach sel" , $this->myConn );

			if( mysqli_num_rows( $this->result) == 1 )
			{
				while( $row = mysqli_fetch_assoc( $this->result ) )
				{
					$this->cDescription = sanitizeInput( $row["description"] );
					$this->cDirName = sanitizeInput( $row["dirName"] );
				}
			}
		}

		public function getAttachmentID()
		{
			return $this->cID;
		}

		public function getAttachmentDescription()
		{
			return $this->cDescription;
		}

		public function getAttachmentDirectory()
		{
			return $this->cDirName;
		}
	}
















?>
