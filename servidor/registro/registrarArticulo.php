<?php


 include "../../clases/Auth.php";

 $NumeroControl=$_POST['NumeroControl'];
 $Marca=$_POST['Marca'];
 $Modelo=$_POST['Modelo'];
 $Material=$_POST['Material'];	
 $Color=$_POST['Color'];
 $Numero=$_POST['Numero']	;
 $TipoCalzado=$_POST['TipoCalzado']	;
 $Img=$_FILES;



 $Auth=new Auth();


 if($Auth->registrarArticulo($NumeroControl,$Marca,$Modelo,$Material,$Color,$Numero,$TipoCalzado,$Img)){
    header("location:../../Vistas/Ver_inventario.php");
 }
 else{
   echo "No se ha podido registrar";
 }


?>