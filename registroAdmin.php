<?php session_start();

if((!isset($_SESSION['usuario'])) or $_SESSION['privilegio']==0){//Si el usuario no se a logeado o no tiene privilegios nesesarios no va a poder acceder a esta pagina
    header("location:error_privilegio.php");
}
   
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/registro.css"  as="style">

    <title>Resgistro</title>
  </head>
  <body>
    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

        <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
  <div class="container">
    <a class="navbar-brand" href="inicio.php">SAM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="Vistas/Ver_inventario.php">Inventario</a>
        </li>
        <li class="nav-item">
          <!-- Agregar en about infomacion sobre la empresa -->
          <a class="nav-link" href="Vistas/Ver_Clientes.php">Clientes</a>
        </li>
        <li class="nav-item">
          <!-- Agregar en about infomacion sobre la empresa -->
          <a class="nav-link" href="Vistas/Ver_Empleados.php">Empleados</a>
        </li>

        <li  class="nav-item">
          <!-- Muestra la usuario de la session activa -->
          <a style="color:black" class="nav-link" href="editar.php"><?php echo $_SESSION['usuario'];?></a>
        </li>

        <li class="nav-item">
          <!-- Saca al usuario de la session y muestra la pagina de login -->
          <a style="color:red" class="nav-link" href="servidor/login/logout.php">Log out</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
    <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Registrarse Administrador</h5>
            <form action="servidor/registro/registrarAdmin.php" method="post">

              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="usuario" name="usuario" placeholder="usuario" required autofocus>
                <label for="usuario">Usuario</label>
              </div>



              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required >
                <label for="password">Password</label>
              </div>

            

              <div class="d-grid mb-2">
                <button style="background-color:red; border-color:red;" class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Register</button>
              </div>

           
              <hr class="my-4">


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
   
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>