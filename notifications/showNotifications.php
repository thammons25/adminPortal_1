<style type = 'text/css'>
	a.details:hover {
		text-transform: none;
		color: red;
		/*text-decoration: none;*/
		/*color: black;*/
	}


</style>
<?php
	include '/Applications/MAMP/htdocs/hpgPortal/database/allClasses.php';
	session_start();

	function showNotifications( $notifyIDs )
	{
		$i = 0;
		while( $i < count( $notifyIDs) )
		{
			$notifyLogin = new notifyLogin( $notifyIDs[$i] , NULL );
			$notifyLogin->selectLoginID();

			$loginID = $notifyLogin->getLoginID();

			$login = new logins( $loginID , NULL );
			$login->selectUsername();

			$notify = new notifications( $notifyIDs[$i] , NULL , NULL , NULL );
			$notify->select();

			$theDate = strtotime( $notify->getNotificationDate() );
			echo "<tr>";
				echo "<td>" . date( "m-d-Y" , $theDate ) . "</td>";
				echo "<td>" . $login->getUsername() . "</td>";
				echo "<td>" . $notify->getNotificationSubject() . "</td>";
				echo "<td><a href = '/hpgPortal/notifications/view.php?notifyID=" . $notifyIDs[$i] . "'> Details </a></td>";
				// echo "<td>" . $notify->getNotificationContent() . "</td>";
			echo "</tr>";

			$i++;
		}
	}

	$notifyClient = new notifyClient( NULL , $_SESSION["clientID"] );
	$notifyClient->setClientNotifIDs();
	$allNotificationIDs = $notifyClient->getClientNotifIDs();
	showNotifications( $allNotificationIDs );














?>
