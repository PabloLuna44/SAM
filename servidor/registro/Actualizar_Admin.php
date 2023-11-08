<?php
include "../../clases/Auth.php";


$idAdmin=$_POST['idAdmin'];
$password=$_POST['password'];
$CurrentIdAdmin=$_POST['CurrentIdAdmin'];
$nombreAdmin=$_POST['nombreAdmin'];
$passwordHash=$_POST['passwordHash'];

if (empty($_POST['password']) && trim($_POST['password']) === ""){
    $password=$passwordHash;
}
else{

    $password= password_hash($_POST['password'],PASSWORD_DEFAULT);
}


 $Auth=new Auth();


 if($Auth->UpdateAdmin($idAdmin, $password, $nombreAdmin,$CurrentIdAdmin)){
    header("location:../../Vistas/Ver_Empleados.php");
 }
 else{
   echo "No se ha podido registrar";
 }

?>