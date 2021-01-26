<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', "database");

class DB_con
{	
	public $conn;
	
	function __construct()
	{
		$this->conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die('localhost connection problem'.mysqli_connect_error());
	}
	//admin authentication
	public function log_in_admin($username,$password)
	{	
		$sql = "SELECT 1 FROM admins WHERE username = '$username' and password='$password'";
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}
	

}

?>