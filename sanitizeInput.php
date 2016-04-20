<?php
	function sanitizeInput( $inputVar )
	{
		$varType = gettype( $inputVar );

		switch( $varType )
		{
			case "boolean":
				$outputVar = filter_var( $inputVar , FILTER_VALIDATE_BOOLEAN );
				break;
			case "double":
				$outputVar = filter_var( $inputVar , FILTER_VALIDATE_FLOAT );
				break;
			case "integer":
				$outputVar = filter_var( $inputVar , FILTER_VALIDATE_INT );
				break;
			case "string":
				if( strpos( $inputVar , "@" ) == 1 )
				{
					$outputVar =  filter_var( $inputVar , FILTER_VALIDATE_EMAIL );
					$outputVar = filter_var( $outputVar , FILTER_SANITIZE_EMAIL );
				}
				else
				{
					$outputVar = filter_var( $inputVar , FILTER_SANITIZE_STRING );
				}
				break;
			default:
				echo "wtf?";
				exit();
		}
		return $outputVar;
	}













?>
