<?php
	include '/Applications/MAMP/htdocs/hpgPortal/header.php';
	session_start();

?>

<style type = 'text/css'>
	#newClient {
		margin-top: 2%;
		padding: 10px;
		border: 1px solid black;
		width: 20%;
		float: left;
	}

	#newClientForm {
		padding: 1%;
		padding-bottom: 0;
	}

	#registerSubmit {
		margin-left: 32%;
		width: 30%;
	}

	#regCode {
		padding-left: 0%;
		text-align: center;
	}

	h2 {
		text-align: center;
	}

	#regInput {
		width: 100%;
	}


</style>

<div id = 'newClient'>
	<h2>Register For HPG Portal</h2>
	<div id = 'newClientForm'>
		<form method = 'post' action = './checkRegCode.php'>
			<p id = 'regCode'> Registration Code <input type = 'text' name = 'regCode' required id = 'regInput'/> </p>
			<br />
			<input type = 'submit' value = 'Register' id = 'registerSubmit' />
		</form>
	</div>
</div>

<?php include '/Applications/MAMP/htdocs/hpgPortal/footer.php'; ?>