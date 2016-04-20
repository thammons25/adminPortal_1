$(document).ready( function()
{
	$("#createNotify").mouseenter( function()
	{
		$(this).css(
		{
			"cursor":"pointer" ,
			"color":"red"
		});
	});

	$("#createNotify").mouseleave( function()
	{
		$(this).css(
		{
			"color":"black"
		});
	});

	$("#createNotify").click( function()
	{
		$("#newNotificationForm").show("slow");
	});

	$("#alterNotify").mouseenter( function()
	{
		$(this).css(
		{
			"color":"red",
			"cursor":"pointer"
		});
	});

	$("#alterNotify").mouseleave( function()
	{
		$(this).css(
		{
			"color":"black"
		});
	});

	$("#hideForm").mouseenter( function()
	{
		$(this).css(
		{
			"cursor":"pointer"
		});
	});

	$("#hideForm").click( function()
	{
		$("#newNotificationForm").hide("slow");
	});

});