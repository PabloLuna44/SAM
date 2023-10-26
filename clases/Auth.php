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

    #------------------------------------Clientes-------------------------------------------------------------------
    public function registrar_cliente($nombre, $clave, $domicilio, $telefono)
    {
        $conexion = parent::conectar();
        $sql = "INSERT INTO clientes  (NombreCliente, ClaveCliente, DomicilioCliente, TelefonoCliente)  VALUES (?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('ssss', $nombre, $clave, $domicilio, $telefono);
        return $query->execute();
    }



    #------------------------------Zapatos------------------------------------------------------------------------

    public function registrarArticulo($NumeroControl, $Marca, $Modelo, $Material, $Color, $Numero, $TipoCalzado, $Img)
    {
        if (is_array($Img) && isset($Img['Img']['name'])) {
            $ruta = '../ImagenesArt/' . $Img['Img']['name'];
            move_uploaded_file($Img['Img']['tmp_name'], $ruta);
            echo $ruta;
            $conexion = parent::conectar();
            $sql = "INSERT INTO  zapatos (NumeroControl,Marca,Modelo,Material,Color,Numero,TipoCalzado,Img)  VALUES (?,?,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssss', $NumeroControl, $Marca, $Modelo, $Material, $Color, $Numero, $TipoCalzado, $ruta);
            return $query->execute();


            
        } else {
            echo "La variable \$Img no es un array o no contiene la clave 'Img'.";


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
            <tr>
                <td>
                    <?php print($img['NumeroControl']); ?>
                </td>
                <td>
                    <center><img src="<?php print($img['Img']); ?>" width="200"></center>
                    <!-- <?php print($img['Img']); ?> -->
                </td>

            </tr>


            <?php

        }

    }

}



?>