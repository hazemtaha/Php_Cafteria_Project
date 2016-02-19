<?php
/**
* 
*/
class DbConnection
{
	public static function getConnection($host,$username,$password,$database)
	{
		$con = new mysqli($host,$username,$password,$database);   
		if ($con->connect_error) {
			die('Connection Error :	'.$con->connect_error);
		}
		return $con;
	}
	public static function closeConnection($connection)
	{
		$this->connection->close();
	}


}

?>