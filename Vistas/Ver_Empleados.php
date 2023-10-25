<?php session_start();

if (!isset($_SESSION['usuario']) or $_SESSION['privilegio']==0) {//Solo pagina para administradores
  header("location:../error_privilegio.php"); //Si el usuario no esta logiado no va a poder acceder a inicio NOTA:usar esto para cuando un usuario sea admin
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
</head>
<body>
    <h1>Empleados</h1>
    <a style="color:red" class="small" href="../registro.php">Registrar empleado!</a>
    
</body>
</html>