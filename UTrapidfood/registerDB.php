<?php 	
if ($_POST["usuario"] != "" && $_POST["correo"] != "" && $_POST["password"] != "" && $_POST["repeatpassword"] != "") {
	$usuario = $_POST["usuario"];
	$correo = $_POST["correo"];
	$password = $_POST["password"];
	$repeatpassword = $_POST["repeatpassword"];
	include_once("bd.php");
	$sql="SELECT * FROM usuario WHERE usuario = '".$usuario."'";
	$res = mysqli_query($conex,$sql);
	if (mysqli_num_rows($res) != 0) {
		$respuesta="Este usuario ya existe";
		echo $respuesta;
		return;
	}
	$sql="SELECT * FROM usuario WHERE correo = '".$correo."'";
	$res = mysqli_query($conex,$sql);
	if (mysqli_num_rows($res) != 0) {
		$respuesta="Ya existe un usuario asociado con este correo";
		echo $respuesta;
		return;
	}

	if ($password == $repeatpassword) {
		$sql="INSERT INTO usuario VALUES (NULL,'".$usuario."','NULL','".$correo."','".$password."',NULL,NULL)";
		$res = mysqli_query($conex,$sql);
		if (!$res) {
			die("No se pudo registrar");
		}else {
			$respuesta="OK";
		}
	}
}
echo $respuesta;
?>