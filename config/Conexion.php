<?php 
class Conexion{
    public static function getConexion(){
        $database_username = 'root';
        $database_password = '';
        $dbname="proyectoinventario";
        $dsn = 'mysql:host=localhost:3308;dbname=' . $dbname;
        $conexion = null; 
        try{
            $conexion = new PDO($dsn, $database_username, $database_password ); 
        }catch(Exception $e){
                echo $e;
                die("error " . $e->getMessage());
        }
        return $conexion;
    }
}

