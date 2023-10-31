<?php
include "../../clases/Auth.php";

 $NumeroControl=$_GET['Eliminar'];
 

 $Auth=new Auth();


 if($Auth->DeleteArt($NumeroControl)){
    header("location:../../Vistas/Ver_inventario.php");
 }
 else{
   echo "No se ha podido registrar";
 }

?>