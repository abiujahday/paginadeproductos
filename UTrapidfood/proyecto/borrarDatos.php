<?php
if($_POST['dniusuario']!=""){
    $dniusuario=$_POST['dniusuario'];
    $sql="DELETE FROM misusuarios WHERE dniusuario=$dniusuario";
    include_once('basededatos.php');
    $resultado=mysqli_query($conex,$sql);
    if($resultado){
        echo "Registro borrado correctamente";
        
    }
    else{
        die('Error al borrar el registro');
    }
}
else{
    echo "Datos incorrectos para borrar el registro";
}
?>