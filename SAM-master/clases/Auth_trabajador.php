<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    include "Conexion1.php";
    class Auth_trabajador extends Conexion1 {



        public function registrar($usuario, $password) {
            $conexion = parent::conectar();
            $sql = "INSERT INTO trabajador (IdVendedor, password) 
                    VALUES (?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('ss', $usuario, $password);
            return $query->execute();
        }
        public function logear($usuario, $password) {
            $conexion = parent::conectar();
            $passwordExistente = "";
            $sql = "SELECT * FROM trabajador 
                    WHERE IdVendedor = '$usuario'";
                     
            $respuesta = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($respuesta) > 0) {
                $passwordExistente = mysqli_fetch_array($respuesta);
                $passwordExistente = $passwordExistente['password'];
                

                if (password_verify($password,$passwordExistente)) {
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['password']= $password;
                    $user=$this->User($passwordExistente);
                    $_SESSION['direccion']=$user['Direccion'];
                    $_SESSION['sexo']=$user['Sexo'];
                    $_SESSION['horario']=$user['Horario'];
                    $_SESSION['telefono']=$user['Telefono'];
                    $_SESSION['NombreVendedor']=$user['NombreVendedor'];
                    $_SESSION['privilegio']=0;
               
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }  


        public function editar($NombreVendedor,$usuario,$password,$direccion,$sexo,$horario, $telefono,$passwordSH) {
            $CurrentUser = $_SESSION['usuario'];
            $conexion = parent::conectar();
            $sql = "UPDATE trabajador SET `NombreVendedor`=?,`IdVendedor`=?, `password`=?, `direccion`=?,`sexo`=?, `horario`=?, `telefono`=? WHERE IdVendedor=?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssss', $NombreVendedor,$usuario, $password, $direccion, $sexo, $horario, $telefono, $CurrentUser);
            $_SESSION['NombreVendedor']=$NombreVendedor;
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
            $sql = "SELECT * FROM trabajador WHERE IdVendedor = ? and `password`=?";
            
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


    }

?>