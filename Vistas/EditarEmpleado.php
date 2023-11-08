<?php session_start();

if (!isset($_SESSION['usuario']) or $_SESSION['privilegio']==0) {
  header("location:../error_privilegio.php"); 
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/css/editar.css">
  <title>Editar</title>
</head>

<body >

  <!-- Navigation -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light  fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../inicio_trabajador.php">SAM</a>
      <button class="navbar-toggler" type="button" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../inicio_trabajador.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>

          <li class="nav-item">
            <a style="color:black" class="nav-link" href="Ver_Perfil.php">
              <?php echo $_SESSION['usuario']; ?>
            </a>
          </li>

          <li class="nav-item">
            <a style="color:red" class="nav-link" href="../servidor/login/logout.php">Log out</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid ps-md-0">
    <div class="row g-0">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">Editar Perfil</h3>


                <table class="table">
                  <thead>

                  <?php
                    
                    include("../clases/Auth.php");
                    $Auth = new Auth();
                    $idAdmin=$_GET['IdVendedor'];
                    $registro = $Auth->SearchTrabajador($idAdmin);
            
                    ?>
                    <tr>
                      <th scope="col">Dato</th>
                      <th scope="col">Información</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <th scope="row">ID</th>
                      <td><?php echo $registro['IdVendedor']?></td>
                    </tr>
                   
                    <tr>
                      <th scope="row">Nombre</th>
                      <td><?php echo $registro['NombreVendedor']?></td>
                    </tr>

                    <tr>
                      <th scope="row">Dirección</th>
                      <td><?php echo $registro['Direccion']?></td>
                    </tr>


                    <tr>
                      <th scope="row">Sexo</th>
                      <td><?php echo $registro['Sexo']?></td>
                    </tr>

                   
                    <tr>
                      <th scope="row">Horario</th>
                      <td><?php echo $registro['Horario']?></td>
                    </tr>

                    
                    <tr>
                      <th scope="row">Teléfono</th>
                      <td><?php echo $registro['Telefono']?></td>
                    </tr>

                  </tbody>
                </table>



                <!-- Sign In Form -->
                <form action="../servidor/registro/Actualizar_Empleado.php" method="post">


                <div class="form-floating mb-3">
                    <input value="<?php echo $registro['IdVendedor'] ?>" type="number" class="form-control" name="usuario"required autofocus
                      id="usuario" placeholder="usuario">
                    <label for="usuario">Usuario</label>
                  </div>

                <div class="form-floating mb-3">
                    <input value="<?php echo $registro['NombreVendedor'] ?>" type="text" class="form-control" name="NombreVendedor"required autofocus
                      id="NombreVendedor" placeholder="Usuario">
                    <label for="NombreVendedor">Nombre</label>
                  </div>


                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
                    <label for="password">Password</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input value="<?php echo $registro['Direccion']?>" type="direccion" class="form-control" name="direccion" id="direccion"required
                      placeholder="direccion">
                    <label for="direccion">Direccion</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input value="<?php echo $registro['Sexo']?>" type="sexo" class="form-control" name="sexo"required
                      id="sexo" placeholder="Sexo">
                    <label for="sexo">Sexo</label>
                  </div>
                  
                  <div class="form-floating mb-3">
                    <input value="<?php echo $registro['Horario']?>"horario" type="time" class="form-control" name="horario" id="horario" placeholder="Horario" required>
                    <label for="horario">Horario</label>
                  </div>


                  <div class="form-floating mb-3">
                    <input value="<?php echo $registro['Telefono']?>" type="telefono" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required>
                    <label for="telefono">Telefono</label>
                  </div>

                  <input type="hidden" id="passwordHash" name="passwordHash" placeholder="passwordHash" value="<?php echo $registro['password'] ?>">
                  <input type="hidden" id="IdVendedor" name="IdVendedor" placeholder="Idvendedor"  value="<?php echo $registro['IdVendedor']?>">



                  <div class="d-grid">
                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2"
                      type="submit" >Guardar</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>