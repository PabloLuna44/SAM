
<?php session_start();
    include "../../clases/Auth.php";
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $privilegio=$_POST['privilegio'];

    $Auth = new Auth();
   
    if ($Auth->logearAdmin($usuario, $password) && $privilegio) {
        header("location:../../inicio.php");
        

    } else {
        
        if($Auth->logearTrabajador($usuario, $password) && $privilegio==0){
            header("location:../../inicio_trabajador.php");
        }else{
            header("location:../../error.php");
        }

    }

?>