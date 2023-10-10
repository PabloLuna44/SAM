<?php 
    include "../../clases/Auth.php";
    $usuario = $_POST['usuario'];
    $password= password_hash($_POST['password'],PASSWORD_DEFAULT);
    $sexo=$_POST['sexo'];
    $horario=$_POST['horario'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];

    $Auth = new Auth();

    if ($Auth->editar($usuario, $password,$sexo,$horario,$direccion,$telefono)) {
        header("location:../../editar.php");

    } else {
        echo "No se pudo editar la informacion";
    }

?>