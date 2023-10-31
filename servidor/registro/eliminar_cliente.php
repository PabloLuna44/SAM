
<?php
include "../../clases/Auth.php";


  
    $clave=$_GET['Clave'];
    


 $Auth=new Auth();


 if($Auth->eliminar_clientes()){
    header("location:../../Vistas/Ver_Clientes.php");
 }
 else{
   echo "No se ha podido registrar";
 }

?>


