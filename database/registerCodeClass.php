<?php
	class registerCode extends db
	{
		private $cID ;
		private $cRegNum;

		public function __construct( $id )
		{
			$this->myConn = sqlConn();

			$this->cID = sanitizeInput( $id );
		}

		public function select()
		{
			$this->sqlSelect = "SELECT regNum FROM registerCode 
								WHERE id = " . $this->cID ;
			$this->result = mysqli_query( $this->myConn , $this->sqlSelect );
			checkResult( $this->result , "regCode sel" , $this->myConn );

			if( mysqli_num_rows($this->result ) == 1 )
			{
				while( $row = mysqli_fetch_assoc( $this->result ) )
				{
					$this->cRegNum = sanitizeInput( $row["id"] );
				}
			}

			else
			{
				echo "dunno";
				exit();
			}
		}

		public function insert() {} 

		public function getRegCode()
		{
			return $this->cRegNum;
		}
	}








?>
