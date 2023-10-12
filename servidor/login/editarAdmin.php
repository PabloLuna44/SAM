
<?php 
    include "../../clases/Auth_admin.php";
    $usuario = $_POST['usuario'];
    $password= password_hash($_POST['password'],PASSWORD_DEFAULT);
    $nombreAdmin=$_POST['nombreAdmin'];
    $passwordSH=$_POST['password'];

    $Auth = new Auth();

    if ($Auth->editar($usuario,$password,$nombreAdmin,$passwordSH)) {
        header("location:../../editar.php");

    } else {
        echo "No se pudo editar la informacion";
    }

?>