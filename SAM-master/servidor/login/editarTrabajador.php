<?php 
    include "../../clases/Auth_trabajador.php";
    $NombreVendedor=$_POST['NombreVendedor'];
    $usuario = $_POST['usuario'];
    $password= password_hash($_POST['password'],PASSWORD_DEFAULT);
    $sexo=$_POST['sexo'];
    $horario=$_POST['horario'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $passwordSH=$_POST['password'];

    $Auth = new Auth_trabajador();

    if ($Auth->editar($NombreVendedor,$usuario,$password,$direccion,$sexo,$horario,$telefono,$passwordSH)) {
        header("location:../../Vistas/Ver_Perfil.php");

    } else {
        echo "No se pudo editar la informacion";
    }

?>