<?php
	abstract class db 
	{
		protected $myConn;
		protected $sqlSelect;
		protected $sqlInsert;
		protected $result;

		abstract public function insert();
		abstract public function select();
	}

?>
