<!-- 4/16/16 NEED TO CHANGE THIS SO THAT CONSTRUCTOR PARAMETERS ACCEPT BOTH ID AND NAME -->
<!-- CAN JUST SET ONE TO NULL DURING INSTANTIATION IF NEEDED -->
<?php
	class clients extends db
	{
		private $cID;
		private $cName;

		// IF YOU NEED TO USE THIS CLASS BUT LACK A PIECE OF INFORMATION FOR CONSTRUCTOR JUST USE ZERO
		// I TRIED USING NULL FOR UNKNOWN VALUES BUT IT DIDNT WORK
		// I HAVE NO EXPLANATION FOR IT THOUGHT BUT THE ZERO THING WORKS 
		public function __construct( $id  , $name )
		{
			$this->myConn = sqlConn();

			$this->cID = sanitizeInput( $id );
			$this->cName = sanitizeInput( $name );
		}




		public function insert()
		{
			$tempConn = $this->myConn;

			$this->sqlInsert = $tempConn->prepare( "INSERT INTO clients( name ) VALUES(?)" );
			$tempInsert = $this->sqlInsert;

			$tempInsert->bind_param( "s" , $this->cName );
			$this->result = $tempInsert->execute();
			checkResult( $this->result , "ins client" , $tempConn );

			$this->cID = mysqli_insert_id( $tempConn );
		}

		public function select()
		{
			$this->sqlSelect = "SELECT name FROM clients WHERE id = " . $this->cID;
			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "client sel" , $this->myConn );
			if( mysqli_num_rows( $this->result ) != 0 )
			{
				while( $row = mysqli_fetch_assoc( $this->result ) )
				{
					$this->cName = sanitizeInput( $row["name"] );
				}
			}
			else
			{
				echo "mysqli_num_rows equals zero!<br />";
			}
			// while( $row = mysqli_fetch_assoc( $this->result ) )
			// {
			// 	$this->cName = sanitizeInput( $row["name"] );
			// }
		}

		public function getClientID()
		{
			return $this->cID;
		}
		public function getClientName()
		{
			return $this->cName;
		}
	}

	// RAN THIS TEST AND IT WORKED

	// $tom = new clients( "CVS" );
	// $tom->insert();

	// $tom = new clients( NULL , "hello" );



	









?>
