<?php


 include "../../clases/Auth.php";


 $usuario= $_POST['usuario'];
 $password= password_hash($_POST['password'],PASSWORD_DEFAULT);



 $Auth=new Auth();


 if($Auth->registrarAdmin($usuario,$password)){
    header("location:../../registroAdmin.php");
 }
 else{
   echo "No se ha podido registrar";
 }


?>