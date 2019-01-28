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
			$data = checkDatosInsert($_POST['idtag']);

			require('../models/model_user.php');
			$conn = @new Users();
			$conn->updateUserStatus($data);

			require('../models/model_record.php');
			$conn = @new Records();
			$conn->insertRecord($data);
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
