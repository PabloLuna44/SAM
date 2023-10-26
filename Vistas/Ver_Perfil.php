<?php session_start();

if (!isset($_SESSION['usuario']) or $_SESSION['privilegio']==1) {
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
                    <tr>
                      <th scope="col">Dato</th>
                      <th scope="col">Información</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <th scope="row">Nombre</th>
                      <td><?php echo $_SESSION['NombreVendedor']?></td>
                    </tr>
                   
                    <tr>
                      <th scope="row">Usuario</th>
                      <td><?php echo $_SESSION['usuario']?></td>
                    </tr>

                    <tr>
                      <th scope="row">Dirección</th>
                      <td><?php echo $_SESSION['direccion']?></td>
                    </tr>


                    <tr>
                      <th scope="row">Sexo</th>
                      <td><?php echo $_SESSION['sexo']?></td>
                    </tr>

                   
                    <tr>
                      <th scope="row">Horario</th>
                      <td><?php echo $_SESSION['horario']?></td>
                    </tr>

                    
                    <tr>
                      <th scope="row">Teléfono</th>
                      <td><?php echo $_SESSION['telefono']?></td>
                    </tr>

                  </tbody>
                </table>



                <!-- Sign In Form -->
                <form action="../servidor/login/editarTrabajador.php" method="post">


                <div class="form-floating mb-3">
                    <input value="<?php echo $_SESSION['NombreVendedor'] ?>" type="text" class="form-control" name="NombreVendedor"required autofocus
                      id="NombreVendedor" placeholder="Usuario">
                    <label for="NombreVendedor">Nombre</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input value="<?php echo $_SESSION['usuario'] ?>" type="number" class="form-control" name="usuario"required autofocus
                      id="usuario" placeholder="Usuario">
                    <label for="usuario">Usuario</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input value="<?php echo $_SESSION['password'] ?>" type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input value="<?php echo $_SESSION['direccion']?>" type="direccion" class="form-control" name="direccion" id="direccion"required
                      placeholder="Direccion">
                    <label for="direccion">Direccion</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input value="<?php echo $_SESSION['sexo']?>" type="sexo" class="form-control" name="sexo"required
                      id="sexo" placeholder="Sexo">
                    <label for="sexo">Sexo</label>
                  </div>
                  
                  <div class="form-floating mb-3">
                    <input value="<?php echo $_SESSION['horario']?>"horario" type="time" class="form-control" name="horario" id="horario" placeholder="Horario" required>
                    <label for="horario">Horario</label>
                  </div>


                  <div class="form-floating mb-3">
                    <input value="<?php echo $_SESSION['telefono']?>" type="telefono" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required>
                    <label for="telefono">Telefono</label>
                  </div>


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