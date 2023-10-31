<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "Conexion.php";

class Auth extends Conexion
{



    #-------------------------------------Admin------------------------------------------------------
    public function registrarAdmin($usuario, $password)
    {
        $conexion = parent::conectar();
        $sql = "INSERT INTO administradores (idAdmin, password) 
                    VALUES (?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('ss', $usuario, $password);
        return $query->execute();
    }

    public function editarAdmin($usuario, $password, $nombreAdmin, $passwordSH)
    {
        $CurrentUser = $_SESSION['usuario'];
        $conexion = parent::conectar();
        $sql = "UPDATE administradores SET `idAdmin`=?, `password`=?, `nombreAdmin`=? WHERE `idAdmin`=?";
        $query = $conexion->prepare($sql);
        $query->bind_param('ssss', $usuario, $password, $nombreAdmin, $CurrentUser);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['password'] = $passwordSH;
        $_SESSION['nombreAdmin'] = $nombreAdmin;

        return $query->execute();
    }

    public function UserAdmin($password)
    {
        $conexion = parent::conectar();
        $CurrentUser = $_SESSION['usuario'];
        $sql = "SELECT * FROM administradores WHERE idAdmin = ? and password=?";

        $query = $conexion->prepare($sql);
        $query->bind_param('ss', $CurrentUser, $password);
        $query->execute();

        $resultado = $query->get_result();

        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null; // Usuario no encontrado
        }
    }

    public function logearAdmin($usuario, $password)
    {
        $conexion = parent::conectar();
        $passwordExistente = "";
        $sql = "SELECT * FROM administradores 
                    WHERE idAdmin = '$usuario'";

        $respuesta = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($respuesta) > 0) {
            $passwordExistente = mysqli_fetch_array($respuesta);
            $passwordExistente = $passwordExistente['password'];
            echo $passwordExistente;
            if (password_verify($password, $passwordExistente)) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['password'] = $password;
                $_SESSION['privilegio'] = 1;
                $user = $this->UserAdmin($passwordExistente);
                $_SESSION['nombreAdmin'] = $user['nombreAdmin'];



                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function MostarAdmins(){//IMplemetacion de funcion para mostrar a todos los administradores

    }

    #------------------------------------Trabajador-------------------------------------------------------
    public function registrarTrabajador($usuario, $password)
    {
        $conexion = parent::conectar();
        $sql = "INSERT INTO trabajador (IdVendedor, password) 
            VALUES (?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('ss', $usuario, $password);
        return $query->execute();
    }
    public function logearTrabajador($usuario, $password)
    {
        $conexion = parent::conectar();
        $passwordExistente = "";
        $sql = "SELECT * FROM trabajador 
            WHERE IdVendedor = '$usuario'";

        $respuesta = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($respuesta) > 0) {
            $passwordExistente = mysqli_fetch_array($respuesta);
            $passwordExistente = $passwordExistente['password'];


            if (password_verify($password, $passwordExistente)) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['password'] = $password;
                $user = $this->UserTrabajador($passwordExistente);
                $_SESSION['direccion'] = $user['Direccion'];
                $_SESSION['sexo'] = $user['Sexo'];
                $_SESSION['horario'] = $user['Horario'];
                $_SESSION['telefono'] = $user['Telefono'];
                $_SESSION['NombreVendedor'] = $user['NombreVendedor'];
                $_SESSION['privilegio'] = 0;

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function editarTrabajador($NombreVendedor, $usuario, $password, $direccion, $sexo, $horario, $telefono, $passwordSH)
    {
        $CurrentUser = $_SESSION['usuario'];
        $conexion = parent::conectar();
        $sql = "UPDATE trabajador SET `NombreVendedor`=?,`IdVendedor`=?, `password`=?, `direccion`=?,`sexo`=?, `horario`=?, `telefono`=? WHERE IdVendedor=?";
        $query = $conexion->prepare($sql);
        $query->bind_param('ssssssss', $NombreVendedor, $usuario, $password, $direccion, $sexo, $horario, $telefono, $CurrentUser);
        $_SESSION['NombreVendedor'] = $NombreVendedor;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['sexo'] = $sexo;
        $_SESSION['horario'] = $horario;
        $_SESSION['direccion'] = $direccion;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['password'] = $passwordSH;




        return $query->execute();
    }

    public function UserTrabajador($password)
    {
        $conexion = parent::conectar();
        $CurrentUser = $_SESSION['usuario'];
        $sql = "SELECT * FROM trabajador WHERE IdVendedor = ? and `password`=?";

        $query = $conexion->prepare($sql);
        $query->bind_param('ss', $CurrentUser, $password);
        $query->execute();

        $resultado = $query->get_result();

        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null; // Usuario no encontrado
        }
    }

    
    public function MostarTrabajadores(){//IMplemetacion de funcion para mostrar a todos los trabajadores

    }

    #------------------------------------Clientes-------------------------------------------------------------------
    public function registrar_cliente($nombre, $clave, $domicilio, $telefono)
    {
        $conexion = parent::conectar();
        $sql = "INSERT INTO clientes  (NombreCliente, ClaveCliente, DomicilioCliente, TelefonoCliente)  VALUES (?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('ssss', $nombre, $clave, $domicilio, $telefono);
        return $query->execute();
    }

    public function consultar_clientes()
    {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM clientes ;";
        return (mysqli_query($conexion, $sql));
    }

    public function actualizar_clientes($nombre, $clave, $domicilio, $telefono)
    {
        $conexion = parent::conectar();
        $sql = "UPDATE clientes SET NombreCliente = ?, DomicilioCliente = ?, TelefonoCliente = ? WHERE ClaveCliente = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('sssi', $nombre, $domicilio, $telefono, $clave);

        return $query->execute();
    }
    public function buscar_clientes()
    {
        $conexion = parent::conectar();
        $clave = $_GET['ClaveCliente'];
        $sql = "SELECT * FROM clientes WHERE ClaveCliente = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('s', $clave);
        $query->execute();

        $resultado = $query->get_result();

        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null; // Cliente no encontrado
        }
    }


    public function eliminar_clientes()
    {
        $conexion = parent::conectar();
        $clave = $_GET['ClaveCliente'];
        $sql = "DELETE FROM clientes WHERE ClaveCliente = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('s', $clave);

        if ($query->execute()) {
            echo "Eliminación exitosa.";
            return true;
        } else {
            echo "Error al eliminar: " . $query->error;
            return false;
        }


    }
    #------------------------------Zapatos------------------------------------------------------------------------

    public function registrarArticulo($NumeroControl, $Marca, $Modelo, $Material, $Color, $Numero, $TipoCalzado, $Img)
    {
        if (is_array($Img) && isset($Img['Img']['name'])) {
            $ruta1 = 'C:/Users/Hp Laptop/Desktop/SAM-ControlDeProyectos/SAM-Version6/ImagenesArt/' . $Img['Img']['name'];
            $ruta2='../ImagenesArt/' . $Img['Img']['name'];
            move_uploaded_file($Img['Img']['tmp_name'], $ruta1);
            $conexion = parent::conectar();
            $sql = "INSERT INTO  zapatos (NumeroControl,Marca,Modelo,Material,Color,Numero,TipoCalzado,Img)  VALUES (?,?,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssss', $NumeroControl, $Marca, $Modelo, $Material, $Color, $Numero, $TipoCalzado, $ruta2);
            return $query->execute();



        } else {
            echo "La variable \$Img no es un array o no contiene la clave 'Img'.";


        }

    }


    public function SearchArt($NumeroControl)
    {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM zapatos WHERE NumeroControl=? ";
        $query = $conexion->prepare($sql);
        $query->bind_param('s', $NumeroControl);
        $query->execute();

        $resultado=$query->get_result();

        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null; // Cliente no encontrado
        }

    }
    

    public function DeleteArt($NumeroControl)
    {
        $conexion = parent::conectar();
        $sql = "DELETE FROM zapatos WHERE NumeroControl=? ";
        $query = $conexion->prepare($sql);
        $query->bind_param('s', $NumeroControl);
        return $query->execute();
    }


    public function ModifyArt($NumeroControl, $Marca, $Modelo, $Material, $Color, $Numero, $TipoCalzado, $Img,$Current)
    {
        if (is_array($Img) && isset($Img['Img']['name'])) {
            $ruta1 = 'C:/Users/Hp Laptop/Desktop/SAM-ControlDeProyectos/SAM-Version6/ImagenesArt/' . $Img['Img']['name'];//URL de la carpeta een la raiz
            $ruta2='../ImagenesArt/' . $Img['Img']['name'];
            move_uploaded_file($Img['Img']['tmp_name'], $ruta1);
            $conexion = parent::conectar();
            $sql = "UPDATE zapatos SET NumeroControl=?, Marca=?, Modelo=?, Material=? ,Color=?,Numero=?, TipoCalzado=? ,Img=? WHERE NumeroControl=?";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssssssss', $NumeroControl, $Marca, $Modelo, $Material, $Color, $Numero, $TipoCalzado, $ruta2, $Current);
    
            return $query->execute();
        } else {
        
        $conexion = parent::conectar();
        $sql = "UPDATE zapatos SET NumeroControl=?, Marca=?, Modelo=?, Material=? ,Color=?,Numero=?, TipoCalzado=? ,Img=? WHERE NumeroControl=?";
        $query = $conexion->prepare($sql);
        $query->bind_param('sssssssss', $NumeroControl, $Marca, $Modelo, $Material, $Color, $Numero, $TipoCalzado, $Img, $Current);

        return $query->execute();
    }

}
}



class DBImage
{

    private $DBconexion;

    function __construct($Conecion)
    {
        $this->DBconexion = $Conecion;
    }

    public function viewImage()
    {
        $sql = $this->DBconexion->prepare("SELECT * FROM zapatos");
        $sql->execute();


        while ($img = $sql->fetch(PDO::FETCH_ASSOC)) {
            ?>

           
            <tr >
                <td >
                    <?php print($img['NumeroControl']); ?>
                </td>
                <td>
                    <center><img src="<?php print($img['Img']); ?>" width="400"></center>
                    <!-- <?php print($img['Img']); ?> -->
                </td>

                <td>
                <?php print $img['Marca']."<br>".
                            $img['Modelo']."<br>".
                            $img['Material']."<br>".
                            $img['Color']."<br>".
                            $img['Numero']."<br>".
                            $img['TipoCalzado'];
 ?>
                </td>

            
              <form action="../Editar_Art.php">
                <td>
                <button  style="background-color:green;  border-color:green;"  class="btn btn-lg btn-primary btn-login  fw-bold mb-2" type="submit" value="<?php print($img['NumeroControl'])?>" name="Editar" >Editar</button>

                </td>

                </form>
              <form action="../servidor/registro/Eliminacion_Art.php">
                <td>
                <button style="background-color:red;  border-color:red;"  class="btn btn-lg btn-primary btn-login  fw-bold mb-2" type="submit" value="<?php print($img['NumeroControl'])?>" name="Eliminar" >Eliminar</button>
                </td>
                </form>
              
            </tr>

            <br>


            <?php

        }

    }

}



?>