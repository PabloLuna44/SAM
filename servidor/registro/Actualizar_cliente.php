<?php
include "../../clases/Auth.php";


    $nombre=$_POST['Nombre'];
    $clave=$_POST['Clave'];
    $domicilio=$_POST['Domicilio'];
    $telefono=$_POST['Telefono'];
 

 $Auth=new Auth();


 if($Auth->actualizar_clientes($nombre, $clave, $domicilio, $telefono)){
    header("location:../../Vistas/Ver_Clientes.php");
 }
 else{
   echo "No se ha podido registrar";
 }

?>