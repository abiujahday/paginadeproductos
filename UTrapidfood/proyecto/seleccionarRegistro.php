<?php
if($_POST['dniusuario']!=""){
    $dniusuario=$_POST['dniusuario'];
    $sql="SELECT * from misusuarios where dniusuario=$dniusuario";
    include_once("basededatos.php");
    $respuesta=mysqli_query($conex,$sql);
    if($respuesta){
        while($row=mysqli_fetch_array($respuesta)){
            $json[]=array(
                'dniusuario'       =>$row['dniusuario'],
                'nombreusuario'    =>$row['nombreusuario'],
                'correousuario'    =>$row['correousuario'],
                'edad'             =>$row['edad'],
            );
        }
        $jsonString=json_encode($json);
        echo $jsonString;
    }
    else{
        die("Error al seleccionar registro");
    }
}
else{
    echo ("Datos incompletos");
}

?>