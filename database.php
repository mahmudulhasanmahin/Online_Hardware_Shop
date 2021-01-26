<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', "hardwareshop");

class DB_con
{
	public $conn;

	function __construct()
	{
		$this->conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die('localhost connection problem'.mysqli_connect_error());
	}

	public function users_insert($name,$email,$password,$gender)
	{
		$sql = "INSERT into users(name,email,password,gender) VALUES('$name','$email','$password','$gender')";
		if(mysqli_query($this->conn, $sql)){
			return true;
		} else{
			return false;
		}
  }

	//search email
	public function serach_email($email)
	{
		$sql = "SELECT username FROM users WHERE email = '$email'";
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}

	public function log_in($email,$password)
	{
		$sql = "SELECT name,email,user_id FROM users WHERE email = '$email' and password='$password'";
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}


}

?>
