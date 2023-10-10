
<?php session_start();
    include "../../clases/Auth_admin.php";
    include "../../clases/Auth_trabajador.php";
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $que_es=$_POST['dec'];

    $Auth = new Auth();
    $Auth_trabajador = new Auth_trabajador();


    if ($Auth->logear($usuario, $password) && $que_es) {
        header("location:../../inicio.php");

    } else {
        
        if($Auth_trabajador->logear($usuario, $password) && $que_es==0){
            header("location:../../inicio_trabajador.php");
        }

        echo "No se pudo logear";

    }

?>