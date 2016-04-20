<!-- THIS PAGE IS JUST THE LOGIN BOX THAT APPEARS -->
<!-- USER ENTERS LOGIN INFORMATION , SENDS TO /hpgPortal/login/validateLogin.php -->
<?php
	include '/Applications/MAMP/htdocs/hpgPortal/header.php';
	session_start();
?>

<style type = 'text/css'>
	#entireForm {
		margin: 20px;
		/*margin-top: 2%;*/
		padding: 10px;
		border: 1px solid black;
		width: 20%;
		float: left;
	}

	#loginForm {
		padding: 1%;
		padding-bottom: 0;
	}

	#loginSubmit {
		margin-left: 32%;
		width: 30%;
	}




</style>

<div id = 'entireForm' style = 'background-color: green;'>
	<h2>Returning User Login</h2>
	<div id = 'loginForm'>
		<form method = 'post' action = './validateLogin.php'>
			<p>Username: <br /><input type = 'text' name = 'username' required /> </p>
			<p>Password: <br /><input type = 'password' name = 'password' required /></p>
			<br />
			<input type = 'submit' value = 'Login' id = 'loginSubmit' />
		</form>
	</div>
</div>


<?php
	include '/Applications/MAMP/htdocs/hpgPortal/footer.php';
?>
