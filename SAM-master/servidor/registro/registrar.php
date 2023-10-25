<?php


 include "../../clases/Auth_trabajador.php";


 $usuario= $_POST['usuario'];
 $password= password_hash($_POST['password'],PASSWORD_DEFAULT);



 $Auth=new Auth_trabajador();


 if($Auth->registrar($usuario,$password)){
    header("location:../../index.php");
 }
 else{
   echo "No se ha podido registrar";
 }


?>