<?php
    if ($_POST['nombreusuario']!=""&&$_POST['correousuario']!=""&&$_POST['edad']!=""){
        //guardar la info 
        
        $nombreusuario=$_POST['nombreusuario'];
        $correousuario=$_POST['correousuario'];
        $edad=$_POST['edad'];
        //$total=$precio*
        //echo $_POST['dniusuario'];
         if($_POST['dniusuario']==""){
            $sql="INSERT INTO misusuarios (nombreusuario,correousuario,edad) values('$nombreusuario','$correousuario','$edad')";
            include_once('basededatos.php');
            $resultado=mysqli_query($conex,$sql);
            if(!$resultado){
                die("Error al insertar en la Base de Datos".$sql);
            }
            else{
                echo "Los datos se han insertado satisfactoriamente";
            }
        }else{
                        $dniusuario=$_POST['dniusuario'];
                        $sql=" UPDATE misusuarios set nombreusuario='$nombreusuario',correousuario='$correousuario',edad=$edad where dniusuario=$dniusuario";
                        include_once('basededatos.php');
                        $resultado=mysqli_query($conex,$sql);
                        if($resultado){
                            echo "Registro actualizado correctamente";
                        }
                        else {
                            die("Error al modificar el registro".$sql);
                        }
                    }
                }
                else{
                    echo "Datos incompletos";
                }
    
    ?>
