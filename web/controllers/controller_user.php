<?php
#start now session
session_start();
#verify if exists: $_POST
if(isset($_POST['submit'])){
	#create different cases
	switch($_POST['submit']){

		case "View":
			require('../models/model_user.php');
			$conn = @new Users();
			$result = $conn->selectUsers();
			echo json_encode($result);
		break;

		case "ViewID":
			require('../models/model_user.php');
			$conn = @new Users();
			$result = $conn->selectUserID($_POST['tag']);
			echo json_encode($result);
		break;

		case "Insert":
			require('../models/model_user.php');
			$conn = @new Users();
			$data = checkDatosInsert($_POST['user'],$_POST['tag']);
			$conn->insertUser($data);
		break;

		case "Update":
			require('../models/model_user.php');
			$conn = @new Users();
			$data = checkDatosUpdate($_POST['user'],$_POST['tag']);
			$conn->updateUser($data);

		break;

		default:
			header("Location: ../");
		break;
	}
}else{
	#when don't exists: $_POST
	header("Location: ../");
}

function checkDatosInsert($username,$idtag){
	$strrestrict = array("!","?","=","'","\'","\"","\\","<",">",":",";","..","^","*","%","_","-","(",")","[","]","$");
	$datos = array();
	$datos[0] = htmlentities($username, ENT_QUOTES);
	$datos[1] = htmlentities($idtag, ENT_QUOTES);
	return $datos;
}

function checkDatosUpdate($new_username,$idtag){
	$strrestrict = array("!","?","=","'","\'","\"","\\","<",">",":",";","..","^","*","%","_","-","(",")","[","]","$");
	$datos = array();
	$datos[0] = htmlentities($new_username, ENT_QUOTES);
	$datos[1] = htmlentities($idtag, ENT_QUOTES);
	return $datos;
}
?>
