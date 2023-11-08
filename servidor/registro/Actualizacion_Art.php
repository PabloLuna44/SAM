<?php
include "../../clases/Auth.php";

 $NumeroControl=$_POST['NumeroControl'];
 $Marca=$_POST['Marca'];
 $Modelo=$_POST['Modelo'];
 $Material=$_POST['Material'];	
 $Color=$_POST['Color'];
 $Numero=$_POST['Numero']	;
 $TipoCalzado=$_POST['TipoCalzado']	;
 $Current=$_POST['Current'];
 
 if (empty($_FILES['Img']['name'])) {
  $Img = $_POST['CurrentImg'];
 }
 else{
  $Img2=$_FILES;
  $ruta1 = 'C:/Users/Hp Laptop/Desktop/SAM-ControlDeProyectos/SAM-Version7/ImagenesArt/' . $Img2['Img']['name'];
  $Img='../ImagenesArt/' . $Img2['Img']['name'];
  move_uploaded_file($Img2['Img']['tmp_name'], $ruta1);
  
 }
    


 $Auth=new Auth();


 if($Auth->ModifyArt($NumeroControl,$Marca,$Modelo,$Material,$Color,$Numero,$TipoCalzado,$Img,$Current)){
    header("location:../../Vistas/Ver_inventario.php");
 }
 else{
   echo "No se ha podido registrar";
 }

?>