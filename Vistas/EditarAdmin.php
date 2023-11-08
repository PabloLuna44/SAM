<?php session_start();

if ((!isset($_SESSION['usuario'])) or $_SESSION['privilegio'] == 0) {
  header("location:error_privilegio.php"); //Si el usuario no esta logiado no va a poder acceder a inicio NOTA:usar esto para cuando un usuario sea admin
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

<body>

  <!-- Navigation -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light  fixed-top">
    <div class="container">
      <a class="navbar-brand" href="inicio.php">SAM</a>
      <button class="navbar-toggler" type="button" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item active">
            <a class="nav-link" href="inicio.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>

          <li class="nav-item">
            <a style="color:black" class="nav-link" href="editar.php">
              <?php echo $_SESSION['usuario']; ?>
            </a>
          </li>

          <li class="nav-item">
            <a style="color:red" class="nav-link" href="servidor/login/logout.php">Log out</a>
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
                    $idAdmin=$_GET['idAdmin'];
                    $registro = $Auth->SearchAdmin($idAdmin);
                    
                    ?>

                    <tr>
                      <th scope="col">Dato</th>
                      <th scope="col">Información</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <th scope="row">Id</th>
                      <td>
                        <?php echo $registro['idAdmin'] ?>
                      </td>
                    </tr>

                    <tr>

                      <th scope="row">Nombre</th>
                      <td>
                        <?php echo $registro['nombreAdmin'] ?>
                      </td>
                    </tr>

                  </tbody>
                </table>



                <!-- Sign In Form -->
                <form action="../servidor/registro/Actualizar_Admin.php" method="post">

                  <div class="form-floating mb-3">
                    <input value="<?php echo $registro['idAdmin'] ?>" type="number" class="form-control"
                      name="idAdmin" required id="idAdmin" placeholder="idAdmin">
                    <label for="idAdmin">Nombre</label>
                  </div>


                  <div class="form-floating mb-3">
                    <input value="<?php echo $registro['nombreAdmin'] ?>" type="text" class="form-control" name="nombreAdmin"
                      required autofocus id="nombreAdmin" placeholder="nombreAdmin">
                    <label for="nombreAdmin">Usuario</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input   type="password" class="form-control"
                      name="password" id="password" placeholder="Password" >
                    <label for="password">Password</label>
                  </div>


                  <input type="hidden" id="passwordHash" name="passwordHash" placeholder="passwordHash" value="<?php echo $registro['password'] ?>">
                  <input type="hidden" id="CurrentIdAdmin" name="CurrentIdAdmin" placeholder="CurrentIdAdmin"  value="<?php echo $registro['idAdmin']?>">

                  <div class="d-grid">
                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2"
                      type="submit">Guardar</button>
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