<?php session_start();

if((!isset($_SESSION['usuario'])) or $_SESSION['privilegio']==1){//Si el usuario no se a logeado o no tiene privilegios nesesarios no va a poder acceder a esta pagina
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
    <link rel="stylesheet" href="public/css/inicio_trabajador.css"  as="style">

    <title>Inicio</title>
  </head>
  <body>
    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top diseño">
  <div class="container">
    <a style="color:white" class="navbar-brand" href="inicio_trabajador.php">SAM</a>
    <button style="background-color: white;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a style="color:white" class="nav-link" href="Vistas/Ver_inventario.php">Inventario</a>
        </li>
        <li class="nav-item">
          <!-- Agregar en about infomacion sobre la empresa -->
          <a style="color:white" class="nav-link" href="Vistas/Ver_Clientes.php">Clientes</a>
        </li>

        <li  class="nav-item">
          <!-- Muestra la usuario de la session activa -->
          <a style="color:white" class="nav-link" href="Vistas/Ver_Perfil.php"><?php echo $_SESSION['usuario'];?></a>
        </li>

        <li class="nav-item">
          <!-- Saca al usuario de la session y muestra la pagina de login -->
          <a style="color:red" class="nav-link" href="servidor/login/logout.php">Log out</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>


<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 text-center">
        <h1 class="fw-light">Vertically Centered Masthead Content</h1>
        <p class="lead">A great starter layout for a landing page</p>
      </div>
    </div>
  </div>
</header>

<!-- Page Content -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-light">Page Content</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ab nulla dolorum autem nisi officiis
      blanditiis voluptatem hic, assumenda aspernatur facere ipsam nemo ratione cumque magnam enim fugiat
      reprehenderit expedita.</p>
  </div>
</section>
   
   

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