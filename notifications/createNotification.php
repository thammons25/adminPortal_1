<?php
	//RAN TEST OF THIS ON 4.18 WITH notifications , notifyClient , notifyLogin and it works

	
	include '/Applications/MAMP/htdocs/hpgPortal/database/allClasses.php';
	session_start();








	//constructor -> public function __construct( $id , $subject , $content , $date )
	$notify = new notifications( NULL , $_POST["subject"] , $_POST["content"] , NULL );

	$notify->insert(); //inserts( id , subject , content , date ) , gets the id of the insert

	$notifyID = $notify->getNotificationID();



	//need to maintain relationship between which notifications correspond to which clients

	//CONSTRUCTOR -> public function __construct( $notifyID , $clientID )
	$notifyClient = new notifyClient( $notifyID , $_SESSION["clientID"] ); 
	$notifyClient->insert();


	//need relation between notifications and who posts them 

	//constructor -> public function __construct( $notifyID , $loginID )
	$notifyLogin = new notifyLogin( $notifyID , $_SESSION["logID"] );
	$notifyLogin->insert();


	// if( isset( $_FILES["uploadFile"] ) && ( $_FILES["uploadFile"]["size"] != 0 ) )
	if( isset( $_FILES["uploadFile"]["name"] ) )
	{

		echo "name -> " . $_FILES["uploadFile"]["name"] . "<br />";
		echo "type -> " . $_FILES["uploadFile"]["type"] . "<br />";
		echo "size -> " . $_FILES["uploadFile"]["size"] . "<br />";

		$clientExtension = $_SESSION["clientID"];

		$fileDir = $fileDir = '/Applications/MAMP/htdocs/hpgPortal/fileSystem/' . $clientExtension;

		$fileDir = $fileDir . $_FILES["uploadFile"]["name"];
		if( $fileDir != '/Applications/MAMP/htdocs/hpgPortal/fileSystem/' ) //THIS TEST WORKED FOR ENSURING FILE UPLOAD
		{
			$attachment = new attachments( NULL , $_FILES["uploadFile"]["name"] , $fileDir );

			$attachment->insert();

			$attachID = $attachment->getAttachmentID();

			$notifyAttach = new notifyAttach( $notifyID , $attachID );
			$notifyAttach->insert();


			// CONSTRUCTOR: public function __construct( $clientID , $attachID )
			$clientAttach = new clientAttach( $_SESSION["clientID"] , $attachID );
			$clientAttach->insert();



			move_uploaded_file( $_FILES["uploadFile"]["tmp_name"] , $fileDir );
		}
	}








	echo "<script>window.onload=function(){window.location.href='/hpgPortal/notifications/';}</script>";

















?>
