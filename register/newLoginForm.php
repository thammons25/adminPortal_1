<?php
	include '/Applications/MAMP/htdocs/hpgPortal/header.php';
	session_start();

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>



<div id = 'newLoginWhole'>
	<h2>Create Login Credentials</h2>
	<div id = 'newLoginForm'>
		<form method = 'post' action = './createNewLogin.php'>
			<p>Username: <input type = 'text' name = 'username' required /> </p>
			<p>Password: <input type = 'password' name = 'password' id = 'password' required /> </p>
			<p>Confirm Password: <input type = 'password' name = 'passwordTwo' id = 'passwordTwo' required /> </p>
			<p id = 'passwordMatch'></p>
			<br />
			<input type = 'submit' value = 'Submit' />
		</form>
	</div>
</div>
<script src = "/hpgPortal/register/passwordMatch.js"></script>

<?php include '/Applications/MAMP/htdocs/hpgPortal/footer.php'; ?>
