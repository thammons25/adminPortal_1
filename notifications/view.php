<?php
	include __DIR__ . '/notificationHeader.php';
	include '/Applications/MAMP/htdocs/hpgPortal/database/allClasses.php';
	session_start();


	$notifyID = $_GET["notifyID"];

	$notify = new notifications( $_GET["notifyID"] , NULL , NULL , NULL ); //dont need other columns b/c id=primary key
	$notify->select(); //will get subject , content , date 


	$notifyLogin = new notifyLogin( $notifyID , NULL );

	$notifyLogin->selectLoginID();

	$loginID = $notifyLogin->getLoginID();

	$login = new logins( $loginID , NULL );

	$login->selectUsername();

?>
<style type = 'text/css'>
	#singleNotify {
		position: absolute;
		border: 1px solid black;
		background-color: red;
		width: 50%;
		height: 50%;
		margin-top: 50px;
		/*margin-left: 50px;*/
		margin-left: 12.5%;
		/*padding-left: 100px;*/


	}


</style>
<div id = 'singleNotify'>
	<div id = 'authorSubject'>

	<?php
		echo "<h2>Posted by " . 
				$login->getUsername() . " on " . 
				date( "m-d-Y" , strtotime( $notify->getNotificationDate() ) ) . 
			"</h2>";

		echo "<h3>Subject: " . $notify->getNotificationSubject() . "</h3>";
	?>

	</div> <!-- ends div authorSubject -->
	<hr />
	<div id = 'notifyContent'>

	<?php
		echo "<h4>" . $notify->getNotificationContent() . "</h4>";
	?>

	</div> <!-- ends div notifyContent -->
</div> <!-- ends div singleNotify -->



<?php include '/Applications/MAMP/htdocs/hpgPortal/footer.php'; ?>
