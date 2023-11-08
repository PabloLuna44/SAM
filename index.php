<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/login.css" as="style">

    <title>Inicio</title>
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
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Policies</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead">
      <div class="wrapper fadeInDown">
        <div id="formContent" class="form-container">
          <!-- Tabs Titles -->
          <h2 class="active"> Sign In </h2>
         
      
          <!-- Icon -->
          <div class="fadeIn first">
            SAM
          </div>
      
          <!-- Login Form -->
          <form action="servidor/login/logear.php" method="post">
           <div class="form-floating mb-3">
                  <input type="number" class="fadeIn second" name="usuario" id="usuario" placeholder="Usuario">
                 
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="fadeIn third" name="password" id="password" placeholder="Password">
      
                </div>
                <div class="d-grid">
                  <button class="fadeIn fourth" type="submit" name="privilegio" value="1">Administrador</button>
                  <button class="fadeIn fourth" type="submit" name="privilegio" value="0">Trabajador</button>
                  <div class="text-center">
                    
                  </div>
                </div>
          </form>
      
          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
          </div>
        </div>
      </div>
    </header>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
