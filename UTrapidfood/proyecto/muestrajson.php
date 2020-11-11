<?php
$sql="SELECT * FROM misusuarios";
include_once('basededatos.php');
$resul=mysqli_query($conex,$sql);
if(!$resul){
    die("Error al encontrar la base de datos".mysqli_error($conex));
}
else{
    while($row=mysqli_fetch_array($resul)){
        
            $json[]=array(
            'dniusuario'=>$row['dniusuario'],
            'nombreusuario'=>$row['nombreusuario'],
            'correousuario'=>$row['correousuario'],
            'edad'=>$row['edad']
            );
        }
    
    $jsonstring=json_encode($json);
    echo $jsonstring;
}
?>