<?php
	
	include __DIR__ . "/notificationHeader.php";
	session_start()
?>


<style type = 'text/css'>

	#newNotificationForm {
		padding: 5px;
		/*padding-left: 1%;*/
		position: absolute;
		border: 1px solid black;
		width: 35%;
		background-color: orange;
		margin-left: 10.5%;
		bottom: 7px;
		/*visibility: hidden;*/

		display: none;
	}

/*	#hideMessageForm {
		position: absolute;
		top: 0;
		right: 15px;
		border: .5px solid black;
	}*/

	#hideForm {
		position: absolute;
		top: 0;
		right: 15px;
		border: .5px solid black;
		padding: 1px;
	}

	#allNotifications {
		position: absolute;
		/*margin-top: 0;*/
		top: 150px;
		width: 40%;
		margin-left: 55%;
	}



	#notificationTable {
		/*width: ;*/
		/*margin-left: 70%;*/
		border: 1px solid black;
	}


	th , td {
		border: .5px solid black;
		padding: 5px;
		/*width: 25%;*/
	}

	#note {
		margin-left: 25%;
		/*text-align: center;*/
	}

	#newFile {
		/*padding-left: 10px;*/
	}




</style>




<div id = 'newNotificationForm'>
	<p id = 'hideForm'>Hide</p>
	<h3>New Notification</h3>
	<form id = 'newNotification' method = 'post' action = '/hpgPortal/notifications/createNotification.php' enctype = 'multipart/form-data'>
		<p>Subject: <input type = 'text' name = 'subject' required /> </p>
		<p>Content: <textarea name = 'content'></textarea> </p>
		<p>Attachments:<br /><input id = 'newFile' type = 'file' name = 'uploadFile' /> </p>
		<br />
		<input id = 'submitNotification' type = 'submit' value = 'Post Notification' />
		<!-- <input id = 'newFile' type = 'file' name = 'uploadFile' /> -->
	</form>
</div>




<div id = 'allNotifications'>
	<h2 id = 'note'>Notifications</h2>
	<table id = 'notificationTable'>
		<tr>
			<th>Date Posted</th>
			<th>Posted By</th>
			<th>Subject</th>
			<th></th>
			<!-- <th>Content</th> -->
		</tr>
		<tr>
		<?php
			include __DIR__ . "/showNotifications.php";
		?>






	</table>















</div>

<?php
	
	include '/Applications/MAMP/htdocs/hpgPortal/footer.php';
?>
