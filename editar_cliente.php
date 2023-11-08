<?php session_start();

if (!isset($_SESSION['usuario'])) {
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="public/css/editar.css">
  <title>Editar</title>
</head>

<body>

  <div class="container-fluid ps-md-0">
    <div class="row g-0">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">Editar Cliente</h3>


                <!-- Sign In Form -->
                <form action="servidor/registro/Actualizar_cliente.php" method="post">

                <?php
      //esto normalmente esta en una clase que maneja consultas Genericas a la base de datos:
      include("clases/Auth.php");
      $con = new Auth();
      $registro = $con->buscar_clientes();

  
      //esto esta en una capa/clase que se encarga de tomar datos y acomodarlos
    
        $nombre = $registro["NombreCliente"]; 
        $clave = $registro["ClaveCliente"];
         $domicilio =  $registro["DomicilioCliente"];
         $telefono=  $registro["TelefonoCliente"];

    
     
                  ?>

                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="Nombre" required autofocus id="Nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
                    <label for="Nombre">Nombre</label> 
                  </div>

                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="Clave" required autofocus id="Clave" placeholder="Clave"value="<?php echo $clave; ?>">
                    <label for="Clave">Clave</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="Domicilio" class="form-control" name="Domicilio" id="Domicilio" placeholder="Domicilio" required value="<?php echo $domicilio; ?>">
                    <label for="Domicilio">Domicilio</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="Telefono" class="form-control" name="Telefono" id="Telefono" required placeholder="Telfono" value="<?php echo $telefono; ?>">
                    <label for="Telefono">Telefono</label>
                  </div>







                  <div class="d-grid">
                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Guardar</button>
                  </div>
                  <div class="d-grid">
                    <a href="Vistas/Ver_Clientes.php" class="btn btn-lg btn-danger btn-login text-uppercase fw-bold mb-2">Cancelar</a>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>