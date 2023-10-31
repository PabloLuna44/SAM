<?php


 include "../../clases/Auth.php";


 $usuario= $_POST['usuario'];
 $password= password_hash($_POST['password'],PASSWORD_DEFAULT);



 $Auth=new Auth();


 if($Auth->registrarTrabajador($usuario,$password)){
    header("location:../../index.php");
 }
 else{
   echo "No se ha podido registrar";
 }


?>