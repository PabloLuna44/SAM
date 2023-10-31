<?php


class Conexion{

      public $servidor='localhost';
      public $usuario='root';
      public $password='';
      public $database='zapateria';
      public $port='33065';



    public function conectar(){
        return mysqli_connect(
             $this->servidor,
             $this->usuario,
             $this->password,
             $this->database,
             $this->port,

        );
    }

    
    public function PDU(){
         
        try{
            $handler= new PDO('mysql:host=127.0.0.1:33065;dbname=zapateria','root','');
            $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

        include_once 'Auth.php';
        $DBImage= new DBImage($handler);

        return $DBImage;
    }


    
}


?>