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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/inicio.css"  as="style">
    <link rel="stylesheet" href="public/css/inicio_trabajador.css"  as="style">

    <title>Inicio de Trabajador</title>

</head>
<body>
    
    <div class="diseño">
        <div>
            <h4>Ver Inventario</h4>
            <form action="Vistas/Ver_inventario.php">
                <input class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit" value="Inventario" name="Inventario">
            </form>
        </div>

        <div>
            <h4>Ver Clientes</h4>
            <div>
                
            </div>
            <form action="Vistas/Ver_Clientes.php">
                <input class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit" value="Clientes" name="Clientes">
            </form>
        </div>

        <div>
            <h4>Ver Perfil</h4>
            <form action="Vistas/Ver_Perfil.php">
                <input class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit" value="Perfil" name="Perfil">
            </form>
        </div>

        <ul>
            <a style="color:red" class="nav-link" href="servidor/login/logout.php">Log out</a>
        </ul>
    </div>

</body>
</html>

