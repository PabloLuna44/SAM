<?php session_start();

if (!isset($_SESSION['usuario']) or $_SESSION['privilegio']==0) {
  header("location:../error_privilegio.php");
}

?>

<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/css/style.css">
  <title>Editar</title>
</head>

<body class="bg-image">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container">
      <a class="navbar-brand" href="../inicio.php">SAM</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Ver_Inventario.php">Inventario</a>
          </li>
          <li class="nav-item">
            <!-- Agregar en about infomacion sobre la empresa -->
            <a class="nav-link" href="Ver_Clientes.php">Clientes</a>
          </li>
          <li class="nav-item">
            <!-- Agregar en about infomacion sobre la empresa -->
            <a class="nav-link" href="Ver_Empleados.php">Empleados</a>
          </li>

          <li class="nav-item">
            <!-- Muestra la usuario de la session activa -->
            <a style="color:black" class="nav-link" href="editar.php"><?php echo $_SESSION['usuario']; ?></a>
          </li>

          <li class="nav-item">
            <!-- Saca al usuario de la session y muestra la pagina de login -->
            <a style="color:red" class="nav-link" href="../servidor/login/logout.php">Log out</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5 box-table">
    <table class="table table-secondary table-bordered border-primary table-striped table-hover">

      <h2>Empleados</h2>
      <?php
      //esto normalmente esta en una clase que maneja consultas Genericas a la base de datos:
      include("../clases/Auth.php");
      $Auth = new Auth();
      $resultado = $Auth->MostarTrabajadores();

      if (mysqli_num_rows($resultado) > 0) {
        echo  '<div';
        echo '<table>';
        echo '<tr><th>NombreVendedor</th><th>IdVendedor</th><th>Direccion</th><th>Sexo</th><th>Telefono</th><th>Horario</th><th>Opciones</th></tr>';


        //esto esta en una capa/clase que se encarga de tomar datos y acomodarlos
        while ($registro = mysqli_fetch_assoc($resultado)) {
          $NombreVendedor = $registro["NombreVendedor"];
          $IdVendedor = $registro["IdVendedor"];
          $direccion =  $registro["Direccion"];
          $sexo =  $registro["Sexo"];
          $telefono=$registro["Telefono"];;
          $horario=$registro["Horario"];;

          echo '<tr>';
          echo '<td>' . $NombreVendedor . '</td>';
          echo '<td>' . $IdVendedor . '</td>';
          echo '<td>' . $direccion . '</td>';
          echo '<td>' . $sexo. '</td>';
          echo '<td>' . $telefono . '</td>';
          echo '<td>' . $horario . '</td>';
          echo "<td>
            <a href='EditarEmpleado.php?IdVendedor=". $registro['IdVendedor'] . "'>Editar</a> |
            <a href='../servidor/registro/Eliminar_Empleado.php?IdVendedor=" . $registro['IdVendedor'] . "'>Eliminar</a> </td>";

          echo '</tr>';
        }
        echo '</table>';
        echo  '</div';
      } else {
        echo 'No se encontraron resultados.';
      }

      ?>
    </table>
    <div class="text-center">
    <a href="../registroTrabajador.php" class="btn btn-primary">Agregar Empleado</a>
    </div>
  </div>


  <div class="container mt-5 box-table">
    <table class="table table-secondary table-bordered border-primary table-striped table-hover">

      <h2>Administradores</h2>
      <?php
      //esto normalmente esta en una clase que maneja consultas Genericas a la base de datos:
      
      $resultado = $Auth->MostrarAdmins();

      if (mysqli_num_rows($resultado) > 0) {
        echo  '<div';
        echo '<table>';
        echo '<tr><th>Nombre</th><th>Id</th><th>Opciones</th></tr>';


        //esto esta en una capa/clase que se encarga de tomar datos y acomodarlos
        while ($registro = mysqli_fetch_assoc($resultado)) {
          $nombre = $registro['nombreAdmin'];
          $id = $registro['idAdmin'];
          
          echo '<tr>';
          echo '<td>' . $nombre . '</td>';
          echo '<td>' . $id . '</td>';
          echo "<td>
            <a href='EditarAdmin.php?idAdmin=" . $registro['idAdmin'] . "'>Editar</a> |
            <a href='../servidor/registro/eliminar_Admin.php?idAdmin=" . $registro['idAdmin'] . "'>Eliminar</a> </td>";

          echo '</tr>';
        }
        echo '</table>';
        echo  '</div';
      } else {
        echo 'No se encontraron resultados.';
      }

      ?>
    </table>
    <div class="text-center">
    <a href="../RegistroAdmin.php" class="btn btn-primary">Agregar Administrador</a>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>