<?php
	session_start();

?>
<style type = "text/css">
	#header {
		/*padding-bottom: 4%;*/
		margin-top: 0;
		/*border-bottom: 1px solid black;*/
		background-color: pink;
		/*margin-bottom: 10px;*/
		/*margin-bottom: 15px;*/
		padding-bottom: 100px;
	}


	h1 {
		/*margin-top: 0;*/
		/*display: inline;*/
		text-transform: uppercase;
		/*margin-left: 27.5%;*/
		text-align: center;
		float: left;
		margin-bottom: 0;
		width: 50%;
		margin-left: 25%;
		position: absolute;
	}
	img {
		margin-top: 0;
		display: inline;
		float: left;
		/*padding: 1%;*/

	}

	#sideBar {
		background-color: yellow;
		margin-left: none;
		height: 100%;
		position: relative;
		/*padding-left: 25px;*/
		/*border: 1px solid black;*/
		/*border-top:;*/
		/*height: 100%;*/
		width: 10%;
		float: left;

		/*border-right: 1px solid black;*/
		/*float: left;*/
		/*margin-top: 5%;*/


	}

	div.userFlow {
		padding-top: none;
		/*padding-left: 10px;*/
		text-align:center;
		/*border: 1px solid black;*/
		/*border-bottom: 1px solid black;*/
		width: 100%;
	}

	a {
		text-decoration: none;
	}
	a:hover {
		text-transform: uppercase;
	}
</style>

<html> <!-- CLOSING HTML TAG FOUND IN /hpgPortal/footer.php -->
	<head>
		<title>HPG Portal</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	</head>

	<body> <!-- CLOSING BODY TAG FOUND IN /hpgPortal/footer.php -->
		<div id = 'header'>
			<a href = '/hpgPortal/'> 
				<img src = '/hpgPortal/logo.png' alt = 'hpg' />
			</a>
			<h1>HPG Client Portal</h1>
			<?php print_r( $_SESSION ); ?>
			<br />
			<br />
			
			<?php
				if( isset( $_SESSION["clientID"] ) && isset( $_SESSION["clientName"] ) )
				{
					echo "<h1>HPG/" . $_SESSION["clientName"] . "</h1>";
				}
			?>	

		</div> <!-- ENDS div id = 'header' -->

		<div id = 'sideBar'> <!-- change this whole div so that there are two displays: one for logged in and one not -->

		<?php
			if( !isset( $_SESSION["logName"] ) || $_SESSION["logStatus"] != 1 )
			{
				echo "<div class = 'userFlow'>";
					echo "<h3>";
						echo "<a href = '/hpgPortal/register/newClientForm.php'>Register</a>";
					echo "</h3>";
				echo "</div>";
				echo "<br />";
			}
		?>

			<div class = 'userFlow'>
				<h3>

					<?php
						if( !isset( $_SESSION["logName"] ) || $_SESSION["logStatus"] != 1 )
						{
							echo "<a href = '/hpgPortal/login/loginForm.php'>Login</a>";
						}
						else
						{
							echo "<a href = '/hpgPortal/logout/logout.php'>Logout</a>";

						}
					?>

				</h3>
			</div> <!-- ENDS div class = 'userFlow' -->
		
			<?php
				if( isset( $_SESSION["clientID"] ) && $_SESSION["logStatus"] == 1 )
				{
					echo "<br />";
					echo "<div class = 'userFlow'>";
						echo "<h3>";
							echo "<a href = '/hpgPortal/notifications/'>Notifications</a>";
						echo "</h3>";
					echo "</div>";

					
					echo "<br />";
					echo "<div class = 'userFlow'>";
						echo "<h3>";
							echo "<a href = '/hpgPortal/messages/'>Messages</a>";
						echo "</h3>";
					echo "</div>";

					echo "<br />";

					echo "<div class = 'userFlow'>";
						echo "<h3>";
							echo "<a href = '/hpgPortal/fileSystem/'>Documents</a>";
						echo "</h3>";
					echo "</div>";

					echo "<br />";

					echo "<div class = 'userFlow'>";
						echo "<h3>";
							echo "<a href = '/hpgPortal/contacts/'>Contacts</a>";
						echo "</h3>";
					echo "</div>";
				}
			?>
		</div> <!-- ENDS div id = 'sideBar' -->











				


			

			
















