<?php
class Session {

	private static $isStarted = false;

	public static function start() {
		if (!self::$isStarted) {
			session_start();
			self::$isStarted = true;
		}
	}

	public static function close() {
		if (self::$isStarted) {
			session_write_close ();
			self::$isStarted = false;
		}
	}

}
?>