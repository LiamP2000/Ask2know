<?php
	class DB {
		private static $conn;

		public static function getInstance() {
			include_once(__DIR__ ."/../core/db-settings.php");

			if(self::$conn === null){
				self::$conn = new PDO("mysql:host=" . SETTINGS['db']['host'] . ";charset=utf8;dbname=" . SETTINGS['db']['db'] , SETTINGS['db']['user'] , SETTINGS['db']['password']);
				return self::$conn;
			} 
			else {
				return self::$conn;
				
			}
		}
	}


?>