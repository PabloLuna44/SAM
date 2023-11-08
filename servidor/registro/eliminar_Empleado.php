
<?php
include "../../clases/Auth.php";


  
$clave=$_GET['IdVendedor'];
    


 $Auth=new Auth();


 if($Auth->DeleteTrabajador($clave)){
    header("location:../../Vistas/Ver_Empleados.php");
 }
 else{
   echo "No se ha podido registrar";
 }

?>


