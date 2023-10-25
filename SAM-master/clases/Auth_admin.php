<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    include "Conexion.php";

    class Auth extends Conexion {
        public function registrar($usuario, $password) {
            $conexion = parent::conectar();
            $sql = "INSERT INTO administradores (idAdmin, password) 
                    VALUES (?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('ss', $usuario, $password);
            return $query->execute();
        }

        public function editar($usuario, $password,$nombreAdmin,$passwordSH) {
            $CurrentUser = $_SESSION['usuario'];
            $conexion = parent::conectar();
            $sql = "UPDATE administradores SET `idAdmin`=?, `password`=?, `nombreAdmin`=? WHERE `idAdmin`=?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssss', $usuario, $password,$nombreAdmin,$CurrentUser);
            $_SESSION['usuario']=$usuario;
            $_SESSION['password']=$passwordSH;
            $_SESSION['nombreAdmin']=$nombreAdmin;

            return $query->execute();
        }
        public function registrar_cliente($nombre, $clave, $domicilio, $telefono)
        {
            $conexion = parent::conectar();
            $sql = "INSERT INTO clientes  (NombreCliente, ClaveCliente, DomicilioCliente, TelefonoCliente)  VALUES (?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssss', $nombre, $clave, $domicilio, $telefono);
            return $query->execute();
        }
        public function User($password) {
            $conexion = parent::conectar();
            $CurrentUser = $_SESSION['usuario'];
            $sql = "SELECT * FROM administradores WHERE idAdmin = ? and password=?";
            
            $query = $conexion->prepare($sql);
            $query->bind_param('ss', $CurrentUser,$password);
            $query->execute();
            
            $resultado = $query->get_result();
            
            if ($resultado->num_rows > 0) {
                return $resultado->fetch_assoc();
            } else {
                return null; // Usuario no encontrado
            }
        }

        public function logear($usuario, $password) {
            $conexion = parent::conectar();
            $passwordExistente = "";
            $sql = "SELECT * FROM administradores 
                    WHERE idAdmin = '$usuario'";
                     
            $respuesta = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($respuesta) > 0) {
                $passwordExistente = mysqli_fetch_array($respuesta);
                $passwordExistente = $passwordExistente['password'];
                echo $passwordExistente;
                if (password_verify($password,$passwordExistente)) {
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['password']= $password;
                    $_SESSION['privilegio']=1;
                    $user=$this->User($passwordExistente);
                    $_SESSION['nombreAdmin']=$user['nombreAdmin'];
                    
                    
                    
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }   
    }

?>