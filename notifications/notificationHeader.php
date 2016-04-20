<?php 
	session_start();
	include '/Applications/MAMP/htdocs/hpgPortal/header.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src = '/hpgPortal/notifications/newNotificationBox.js'></script>
<style type = 'text/css'>
	#notificationMenu {
		width: 100%;
		padding-bottom: 50px;
	}


	div.notifyChoice {
		/*border: .5px solid black;*/
		/*display: inline;*/
		float: left;
		padding: 10px;
		padding-left: 25px;
		display: block;
		/*width: %;*/
	}
</style>


</script>
<div id = 'notificationWhole'>
	<div id = 'notificationMenu'>

		<div class = 'notifyChoice'>
			<h2 id = 'createNotify'>New Notification</h2>
		</div>

		<div class = 'notifyChoice'>
			<h2 id = 'alterNotify'>Alter Notification</h2>
		</div>
	</div> <!-- ends div notificationMenu -->

