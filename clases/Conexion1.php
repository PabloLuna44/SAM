<?php
class Conexion1{

      public $servidor='localhost';
      public $usuario='root';
      public $password='';
      public $database='zapateria';
      public $port='3306';



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