<?php
class Json {

	public static function encode($var) {
		return json_encode($str);
	}

	public static function decode($str) {
			$json = json_decode($str);
		    switch(json_last_error()) {
		        case JSON_ERROR_NONE:
		            $error = '';
		        break;
		        case JSON_ERROR_DEPTH:
		            $error = 'The maximum stack depth has been exceeded';
		        break;
		        case JSON_ERROR_STATE_MISMATCH:
		            $error = 'Invalid or malformed JSON';
		        break;
		        case JSON_ERROR_CTRL_CHAR:
		            $error = 'Control character error, possibly incorrectly encoded';
		        break;
		        case JSON_ERROR_SYNTAX:
		            $error = 'Syntax error';
		        break;
		        case JSON_ERROR_UTF8:
		            $error = "Malformed UTF-8 characters, possibly incorrectly encoded";
		        break;
		        default:
		            $error = 'Unknown error';
		        break;
	        }
			if (!empty($error)) {
				echo "JSON Error: $error<br />";
			}

			return $json;
	}

}
?>