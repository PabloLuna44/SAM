
<?php
include "../../clases/Auth.php";


  
$clave=$_GET['idAdmin'];
    


 $Auth=new Auth();


 if($Auth->DeleteAdmin($clave)){
    header("location:../../Vistas/Ver_Empleados.php");
 }
 else{
   echo "No se ha podido registrar";
 }

?>


