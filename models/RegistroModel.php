
<?php

require_once 'config/Conexion.php';

class RegistroModel {

    private $con;

  
    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function insertar($nombres, $username, $password) {
      
        $sql = "INSERT INTO usuario (id_usuario,nombres_usuario,username,password) VALUES 
            (NULL, :nomb, :user,:pass)";
       
        $sentencia = $this->con->prepare($sql);
       $data = [
            'nomb' => $nombres,
            'user' => $username,
            'pass' => $password,
        ];
        $sentencia->execute($data);

        if ($sentencia->rowCount() <= 0) {
            return false;
        }
        return true;
    }

}
