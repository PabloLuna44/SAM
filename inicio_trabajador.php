<?php session_start();

if(!isset($_SESSION['usuario'])){
    header("location:index.php");//Si el usuario no esta logiado no va a poder acceder a inicio NOTA:usar esto para cuando un usuario sea admin
}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Trabajador</title>
</head>
<body>
    <h1>Inicio de Trabajador</h1>
</body>
</html>

