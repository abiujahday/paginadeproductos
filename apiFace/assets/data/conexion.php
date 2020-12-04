<?php

 class Conexion{
  var $conn;

  function conectar(){
    $conn=NULL;
    try{
      $conn = new PDO ('mysql:host=localhost;dbname=id15590805_utrapidfood',
      'id15590805_egan','Q8jB9j>Ekbc31pIb');

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo 'Conectando a la base de datos <br> <br>';

    }catch(PDOException $e){
      die(print_r ('Error conectando con la base de datos: '
            . $e->getMesage()));
    }
    return $conn;
  }// Fin function conectar()


  
  function guardarComentario($nombre, $correo, $asunto, $mensaje){
    $con = $this->conectar();

    $consulta = 'INSERT INTO comentario(nombre, correo, asunto, mensaje)
    VALUES (:nombre, :correo, :asunto, :mensaje)';

  $stmt = $con->prepare($consulta);
  $rows = $stmt->execute(array(':nombre'=>$nombre,
                                  ':correo'=>$correo,
                                  ':asunto'=>$asunto,
                                  ':mensaje'=>$mensaje));
    /*
  if($rows == 1){
      echo 'Inserción correcta';
  }*/
  return $rows;
}
  
    function buscarUsuario($user, $pass){
      $con = $this->conectar();
 
      $consulta = 'SELECT nombre
                    FROM usuario
                    WHERE nombre=:usuario         
                    AND contrasena=:pass';
                     
      $stmt = $con->prepare($consulta);
      $stmt->execute(array(':usuario'=>$user,':pass'=>$pass));
      $registro = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $numRegistros = count($registro);

      return $numRegistros;
    }

    function buscarProducto() {
			$con = $this->conectar();
			$stmt = $con->prepare("SELECT * FROM producto");
			$stmt->execute();
			$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
			json_encode($registros,JSON_FORCE_OBJECT);
			return $registros;
		}

  }


?>