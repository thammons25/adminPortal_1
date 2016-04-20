<?php
	// NOTE -> __DIR__ = /Applications/MAMP/htdocs/hpgPortal/database

	//INCLUDE EVERYTHING IN /database EXCEPT:
		// -> ./generateRegCode.php


	//LOGIN AND REGISTER USER CLASSES

	include __DIR__ . "/abstractClass.php"; //1

	include __DIR__ . "/sqlConn.php"; //2

	include __DIR__ . "/sanitizeInput.php"; //3

	include __DIR__ . "/checkResult.php"; //4 

	include __DIR__ . "/clientClass.php"; //5 

	include __DIR__ . "/loginClass.php"; //6 

	include __DIR__ . "/clientLoginClass.php"; //7

	include __DIR__ . "/regLoginClass.php"; //8

	include __DIR__ . "/registerCodeClass.php"; //9

	include __DIR__ . "/regClientClass.php"; //10

	//ATTACHMENT CLASSES

	include __DIR__ . "/attachmentClass.php"; //15

	include __DIR__ . "/clientAttachClass.php"; //17

	//MESSAGE CLASSES

	include __DIR__ . "/messages/messageBoardClass.php"; //11

	//NOTIFICATION CLASSES

	include __DIR__ . "/notifications/notificationClass.php"; //12

	include __DIR__ . "/notifications/notifyClientClass.php"; //13

	include __DIR__ . "/notifications/notifyLoginClass.php"; //14

	include __DIR__ . "/notifications/notifyAttachClass.php"; //16

?>
