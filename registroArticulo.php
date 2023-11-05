<?php session_start();

if (!isset($_SESSION['usuario']) or $_SESSION['privilegio']==0 ){
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
  <link rel="stylesheet" href="public/css/editar.css">
  <title>Editar</title>
</head>

<body >

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
                <h3 class="login-heading mb-4">Registro Articulo</h3>


                              <!-- Sign In Form -->
                <form enctype="multipart/form-data" action="../servidor/registro/registrarArticulo.php" method="post">


                <div class="form-floating mb-3">
                    <input  type="number" class="form-control" name="NumeroControl"required autofocus
                      id="NumeroControl" placeholder="Nombre">
                    <label for="NumeroControl">Numero De Control</label>
                  </div>

                  
                  <div class="form-floating mb-3">
                    <input  type="text" class="form-control" name="Marca" id="Marca"  placeholder="Marca" required>
                    <label for="Marca">Marca</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="Modelo" id="Modelo"required
                      placeholder="">
                    <label for="Modelo">Modelo</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="Material" id="Material"required
                      placeholder="Material">
                    <label for="Material">Material</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="Color" id="Color"required
                      placeholder="Telfono">
                    <label for="Color">Color</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="Numero" id="Numero"required
                      placeholder="Numero">
                    <label for="Numero">Numero</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="TipoCalzado" id="TipoCalzado"required
                      placeholder="TipoCalzado">
                    <label for="TipoCalzado">TipoCalzado</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="file" class="form-control" name="Img" id="Img" acecept=".jpg, .jpeg, .png"required
                      placeholder="Img">
                    <label for="Img">Imagen</label>
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