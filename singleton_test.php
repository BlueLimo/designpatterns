
<?php

//db connection class using singleton pattern
	class dbConnection
	{
		//variable to hold connection object.
		protected static $conn;
		 
		//private construct - class cannot be instatiated externally.
		private function __construct() {
		 
		try 
		{
			self::$conn = new PDO( 'mysql:host=127.0.0.1;dbname=test', 'root', '3rdNovember@2013' );
			self::$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			echo "Connection succesful";
		}
		catch (PDOException $e) 
		{
			echo "There is a connection error: " . $e->getMessage();
		}
		 
		}
		// get connection function. Static method - accessible without instantiation
		public static function getConnection() 
		{
			//Guarantees single instance, if no connection object exists then create one.
			if (!self::$conn) 
			{
			//new connection object.
			new dbConnection();
			}

			//return connection.
			return self::$conn;
		}
	 
	}
	
	$conn = dbConnection::getConnection();
 
?>