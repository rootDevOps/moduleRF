<?php
require_once('config.php');

class Users{
	protected $link;
	function __construct(){ $this->link = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);	}
	function __destruct(){	$link = $this->link; mysqli_close($link); }

	function selectUsers(){
		$link = $this->link;
		if (mysqli_connect_errno()){ printf("Falló la conexión: %s\n", mysqli_connect_error()); exit(); }
		$query = " SELECT * FROM user; ";
		if ($result = mysqli_query($link,$query)){ $array = array(); while ($row = mysqli_fetch_object($result)){ $array[] = $row; } return $array; }
	}
	function selectUserID($data){
		$link = $this->link;
		if (mysqli_connect_errno()){ printf("Falló la conexión: %s\n", mysqli_connect_error()); exit(); }
		$query = " SELECT * FROM user WHERE idtag = $data; ";
		if ($result = mysqli_query($link,$query)){ $array = array(); while ($row = mysqli_fetch_object($result)){ $array[] = $row; } return $array; }
	}
	function insertUser($data){
		$link = $this->link;
		if (mysqli_connect_errno()){ printf("Falló la conexión: %s\n", mysqli_connect_error()); exit(); }
		$query = "INSERT INTO user(user,idtag,status,create_datetime,modified_date) VALUES('$data[0]',$data[1],0,now(),now());";
		if ($result = mysqli_query($link, $query)){ return TRUE; }else{ return FALSE; }
	}
	function updateUser($data){
		$link = $this->link;
		if (mysqli_connect_errno()){ printf("Falló la conexión: %s\n", mysqli_connect_error()); exit(); }
		$query = "UPDATE user SET user='$data[0]', modified_date=now() WHERE idtag = $data[1]; ";
		if ($result = mysqli_query($link,$query)){ $array = array(); while ($row = mysqli_fetch_object($result)){ $array[] = $row; } return $array; }
	}
}
?>
