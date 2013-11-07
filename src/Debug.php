<?php
class Debug {

	public static function info($var) {
		$max_length = 1024;

		if ($var === true) {
			$var = 'true (boolean)';
		} else if ($var === false) {
			$var = 'false (boolean)';
		}

		$var = print_r($var, true);
		if(mb_strlen($var) > $max_length) {
			$var = mb_substr($var, 0, $max_length) . '...';
		}

		$trace = self::getBacktrace(2);

		echo
			'<div style="border:2px solid red;background-color: #F4F2DF;margin: 10px;padding: 10px;z-index: 10000">'.
			'<h1 style=\"text-align:left;font-size:1.1em;\">'.$trace.':</h1><pre style="white-space: pre-wrap;">'.
			$var.
			'</pre></div>';
	}

	public static function getBacktrace($deep) {
		$trace = debug_backtrace();
		$line = @$trace[$deep - 1]['line'];
		if (count($trace) > $deep) {
			$functionName = @$trace[$deep]['function'];
			$className = @$trace[$deep]['class'];
		} else {
			$functionName = basename($trace[$deep-1]['file']);
			$className = '';
		}

		return "$className $functionName, line $line";
	}

	public static function backtrace() {
		echo '<div style="border:1px solid red;background-color: #F4F2DF;margin: 10px;padding: 10px;display: inline-block;text-align: left;line-height:2em;">';
		ob_start();
		debug_print_backtrace();
		$trace = str_replace(_ROOT_PATH, '', ob_get_contents());
		ob_end_clean();

		$html = '';
		$rows = array();
		$trace = explode("\n", $trace);
		foreach($trace as $line) {
			$html .= '<tr><td>';
			$parts = explode(' called at ', $line);
			$html .= implode('</td><td style="white-space: nowrap">', $parts);
			$html .= '</td></tr>';
		}

		echo '<table class="std"><tr><th>Code</th><th>Called at</th></tr>'.$html.'</table>';
		echo '</div>';
	}


}
?>