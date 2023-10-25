<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    include "Conexion.php";

    class Auth extends Conexion {
        public function registrar($usuario, $password) {
            $conexion = parent::conectar();
            $sql = "INSERT INTO t_usuarios (usuario, password) 
                    VALUES (?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('ss', $usuario, $password);
            return $query->execute();
        }

        public function editar($usuario, $password, $sexo, $horario, $direccion, $telefono,$passwordSH) {
            $CurrentUser = $_SESSION['usuario'];
            $conexion = parent::conectar();
            $sql = "UPDATE t_usuarios SET `usuario`=?, `password`=?, `sexo`=?, `horario`=?, `direccion`=?, `telefono`=? WHERE usuario=?";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssssss', $usuario, $password, $sexo, $horario, $direccion, $telefono, $CurrentUser);
            $_SESSION['usuario']=$usuario;
            $_SESSION['sexo']=$sexo;
            $_SESSION['horario']=$horario;
            $_SESSION['direccion']=$direccion;
            $_SESSION['telefono']=$telefono;
            $_SESSION['password']=$passwordSH;
          
            


            return $query->execute();
        }
        
        public function User($password) {
            $conexion = parent::conectar();
            $CurrentUser = $_SESSION['usuario'];
            $sql = "SELECT * FROM t_usuarios WHERE usuario = ? and password=?";
            
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
            $sql = "SELECT * FROM t_usuarios 
                    WHERE usuario = '$usuario'";
                     
            $respuesta = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($respuesta) > 0) {
                $passwordExistente = mysqli_fetch_array($respuesta);
                $passwordExistente = $passwordExistente['password'];
                
                if (password_verify($password,$passwordExistente)) {
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['password']= $password;

                    $usuario=$this->User($passwordExistente);
                    $_SESSION['id_usuario']=$usuario['usuario_id'];
                    $_SESSION['sexo'] = $usuario['sexo'];
                    $_SESSION['horario'] = $usuario['horario'];
                    $_SESSION['direccion'] = $usuario['direccion'];
                    $_SESSION['telefono'] = $usuario['telefono'];
                    
                    
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