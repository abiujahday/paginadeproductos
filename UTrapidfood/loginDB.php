<?php 
session_start();

if ($_POST["usuario"] != "" && $_POST["pass"] != "") {
	$usuario = $_POST["usuario"];
	$password = $_POST["pass"];
	include_once("bd.php");
	$sql = "SELECT * FROM usuario WHERE usuario = '".$usuario."' OR correo = '".$usuario."'";
	$res=mysqli_query($conex,$sql);
	if($row=mysqli_fetch_array($res)){
		if ($row["password"] == $password) {
			$_SESSION["usuario"] = $usuario;
			if ($row["tipo_usuario"] == "Administrador") {
				$respuesta = "admin";
			}else {
				if ($row["tipo_usuario"] == "Estudiante"){
					$respuesta="student";
				}else {
					if ($row["tipo_usuario"] == "Maestro") {
						$respuesta="teacher";
					}
				}
			}
		}else {
			$respuesta = "Usuario o contraseña incorrectos!";
		}
	}else {
		$respuesta = "Usuario o contraseña incorrectos!";
	}
}else {
	$respuesta = "Datos incompletos!";
}
echo $respuesta;
?>