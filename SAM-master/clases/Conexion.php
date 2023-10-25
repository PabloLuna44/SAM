<?php
class Conexion{

      public $servidor='localhost';
      public $usuario='root';
      public $password='';
      public $database='zapateria';
      public $port='3307';



    public function conectar(){
        return mysqli_connect(
             $this->servidor,
             $this->usuario,
             $this->password,
             $this->database,
             $this->port,

        );
    }
}


?>