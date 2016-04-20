function confirmPass()
{
	var pass = $("#password").val();
	var passTwo = $("#passwordTwo").val();

	if( pass != passTwo )
	{
		$("#passwordMatch").html( "Passwords Do Not Match" );
		$("#passwordMatch").css(
		{
			"color":"red"
		});
	}
	else
	{
		$("#passwordMatch").html( "Passwords Match" );
		$("#passwordMatch").css(
		{
			"color":"green"
		});
	}
}



$(document).ready( function()
{
	$("#passwordTwo").keyup( confirmPass );
});


