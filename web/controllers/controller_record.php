<?php
#start now session
session_start();
#verify if exists: $_POST
if(isset($_POST['submit'])){
	#create different cases
	switch($_POST['submit']){

		case "View":
			require('../models/model_record.php');
			$conn = @new Records();
			$result = $conn->selectRecords();
			echo json_encode($result);
		break;

		case "Insert":
			require('../models/model_record.php');
			$conn = @new Records();
			$data = insertRecords($_POST['idtag']);
			$conn->insertUser($data);
		break;

		case "Update":
			require('../models/model_record.php');
			$conn = @new Records();
			$conn->updateRecords($_POST['idrecord']);
		break;

		default:
			header("Location: ../");
		break;
	}
}else{
	header("Location: ../");
}

function checkDatosInsert($idusername){
	$strrestrict = array("!","?","=","'","\'","\"","\\","<",">",":",";","..","^","*","%","_","-","(",")","[","]","$");
	$datos = array();
	$datos[0] = htmlentities($idusername, ENT_QUOTES);
	return $datos;
}


?>
