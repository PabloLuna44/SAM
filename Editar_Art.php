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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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



                                <form enctype="multipart/form-data" action="servidor/registro/Actualizacion_Art.php"
                                    method="post">

                                    <?php
                                    //esto normalmente esta en una clase que maneja consultas Genericas a la base de datos:
                                    include("clases/Auth.php");
                                    $Auth = new Auth();
                                    $NumeroControl = $_GET['Editar'];
                                    $registro = $Auth->SearchArt($NumeroControl);
                                    ?>


                                    <div class="form-floating mb-3">
                                        <input value="<?php echo $registro['NumeroControl'];?>" type="number" class="form-control" name="NumeroControl" required
                                            autofocus id="NumeroControl" placeholder="Nombre">
                                        <label for="NumeroControl">Numero De Control</label>
                                    </div>


                                    <div class="form-floating mb-3">
                                        <input value="<?php echo $registro['Marca'];?>" type="text" class="form-control" name="Marca" id="Marca"
                                            placeholder="Marca" required>
                                        <label for="Marca">Marca</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input value="<?php echo $registro['Modelo'];?>" type="text" class="form-control" name="Modelo" id="Modelo" required
                                            placeholder="">
                                        <label for="Modelo">Modelo</label>
                                    </div>

                                    <div  class="form-floating mb-3">
                                        <input value="<?php echo $registro['Material'];?>" type="text" class="form-control" name="Material" id="Material" required
                                            placeholder="Material">
                                        <label for="Material">Material</label>
                                    </div>

                                    <div  class="form-floating mb-3">
                                        <input value="<?php echo $registro['Color'];?>"  type="text" class="form-control" name="Color" id="Color" required
                                            placeholder="Telfono">
                                        <label for="Color">Color</label>
                                    </div>

                                    <div  class="form-floating mb-3">
                                        <input value="<?php echo $registro['Numero'];?>" type="number" class="form-control" name="Numero" id="Numero" required
                                            placeholder="Numero">
                                        <label for="Numero">Numero</label>
                                    </div>

                                    <div  class="form-floating mb-3">
                                        <input value="<?php echo $registro['TipoCalzado'];?>" type="text" class="form-control" name="TipoCalzado" id="TipoCalzado"
                                            required placeholder="TipoCalzado">
                                        <label for="TipoCalzado">TipoCalzado</label>
                                    </div>

                                    <input type="number" name="Current" style="display: none;" value="<?php echo $NumeroControl;?>">
                                    <input type="text" name="CurrentImg" style="display;"  value="<?php echo $registro['Img'];?>">
                                   

                                    <div  class="form-floating mb-3">
                                        <input  type="file" class="form-control" name="Img" id="Img" 
                                            placeholder="Img">
                                        <label for="Img">Imagen</label>
                                    </div>

                                    

                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" "
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