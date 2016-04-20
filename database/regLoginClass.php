<?php
	class regLogin extends db 
	{
		private $cRegID;
		private $cLoginID;

		public function __construct( $regID , $loginID )
		{
			$this->myConn = sqlConn();

			$this->cRegID = sanitizeInput( $regID );
			$this->cLoginID = sanitizeInput( $loginID );
		}

		public function insert()
		{
			$tempConn = $this->myConn;

			$this->sqlInsert = $tempConn->prepare( "INSERT INTO regLogin( regID , loginID ) VALUES(?,?)" );
			$tempInsert = $this->sqlInsert;
			$tempInsert->bind_param( "ii" , $this->cRegID , $this->cLoginID );
			$this->result = $tempInsert->execute();
			checkResult( $this->result , "reglog ins" , $tempConn );

			$tempInsert->close();
		}

		public function select() {}

		public function getRegID()
		{
			return $this->cRegID;
		}

		public function getLoginID()
		{
			return $this->cLoginID;
		}
	}

?>
