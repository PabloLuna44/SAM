
<?php session_start();
    include "../../clases/Auth_admin.php";
    include "../../clases/Auth_trabajador.php";
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $privilegio=$_POST['privilegio'];

    $Auth = new Auth();
    $Auth_trabajador = new Auth_trabajador();


    if ($Auth->logear($usuario, $password) && $privilegio) {
        header("location:../../inicio.php");
        

    } else {
        
        if($Auth_trabajador->logear($usuario, $password) && $privilegio==0){
            header("location:../../inicio_trabajador.php");
        }else{
            header("location:../../error.php");
        }

    }

?>