<?php 
    include "../../clases/Auth.php";
    $NombreVendedor=$_POST['NombreVendedor'];
    $usuario = $_POST['usuario'];
    $sexo=$_POST['sexo'];
    $horario=$_POST['horario'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $passwordHash=$_POST['passwordHash'];
    $CurrentTrabajador=$_POST['IdVendedor'];


    if (empty($_POST['password']) && trim($_POST['password']) === ""){
        $password=$passwordHash;
    }
    else{
    
        $password= password_hash($_POST['password'],PASSWORD_DEFAULT);
    }

    $Auth = new Auth();

    if ($Auth->UpdateTrabajador($NombreVendedor,$usuario,$password,$direccion,$sexo,$horario,$telefono,$CurrentTrabajador)) {
        header("location:../../Vistas/Ver_Empleados.php");

    } else {
        echo "No se pudo editar la informacion";
    }

?>