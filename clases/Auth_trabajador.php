<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    include "Conexion1.php";

    class Auth_trabajador extends Conexion1 {
        public function logear($usuario, $password) {
            $conexion = parent::conectar();
            $passwordExistente = "";
            $sql = "SELECT * FROM trabajador 
                    WHERE idVendedor = '$usuario'";
                     
            $respuesta = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($respuesta) > 0) {
                $passwordExistente = mysqli_fetch_array($respuesta);
                $passwordExistente = $passwordExistente['password'];
                

                if (password_verify($password,$passwordExistente)) {
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['password']= $password;
                    
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