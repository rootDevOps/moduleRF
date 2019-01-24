<?php
require_once('config.php');

class Records{
	protected $link;
	function __construct(){ $this->link = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);	}
	function __destruct(){	$link = $this->link; mysqli_close($link); }

	function selectRecords(){
		$link = $this->link;
		if (mysqli_connect_errno()){ printf("Falló la conexión: %s\n", mysqli_connect_error()); exit(); }
		$query = " SELECT * FROM record; ";
		if ($result = mysqli_query($link,$query)){ $array = array(); while ($row = mysqli_fetch_object($result)){ $array[] = $row; } return $array; }
	}
	function insertRecord($data){
		$link = $this->link;
		if (mysqli_connect_errno()){ printf("Falló la conexión: %s\n", mysqli_connect_error()); exit(); }
		$query = "INSERT INTO record(iduser,create_datetime, modified_date) VALUES((SELECT id FROM user WHERE idtag = $data ),now(),now());";
		if ($result = mysqli_query($link, $query)){ return TRUE; }else{ return FALSE; }
	}
	function updateRecord($data){
		$link = $this->link;
		if (mysqli_connect_errno()){ printf("Falló la conexión: %s\n", mysqli_connect_error()); exit(); }
		$query = "UPDATE record SET modified_date=now() WHERE id = $data; ";
		if ($result = mysqli_query($link,$query)){ $array = array(); while ($row = mysqli_fetch_object($result)){ $array[] = $row; } return $array; }
	}


}
?>
