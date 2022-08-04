
<?php

require_once 'config/Conexion.php';

class AreaModel {

    private $con;

    // constructor
    public function __construct() {
        $this->con = Conexion::getConexion(); // :: para acceder a funciones  static
    }

    public function listar() { // listar todos los productos
        $sql = "select * from area";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        // ejecutar la sentencia
        $stmt->execute();
        // recuperar los datos (en caso de select)
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retornar resultados
        return $resultados;
    }

      public function buscarxId($id) { // listar todos los productos
        $sql = "select * from productos, categoria where prod_idCategoria = cat_id and prod_estado=1 and prod_id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
         // ejecutar la sentencia
       $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        // retornar resultados
        return $producto;
    }
    
    public function buscarxCategoria($categoria) { // listar todos los productos
        $sql = "select * from productos, categoria where prod_idCategoria = cat_id and prod_estado=1 and prod_idCategoria= :categoria";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['categoria' => $categoria];
         // ejecutar la sentencia
       $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $producto = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retornar resultados
        return $producto;
    }


    public function insertar($codigo, $area) {
      
        $sql = "INSERT INTO area (id,area, siglo) VALUES 
            (NULL, :are, :sig)";
       
        $sentencia = $this->con->prepare($sql);
       $data = [
            'are' => $codigo,
            'sig' => $area,
        ];
        $sentencia->execute($data);

        if ($sentencia->rowCount() <= 0) {
            return false;
        }
        return true;
    }
    public function filtrarArea($area)
    {

        $arrRegistros = array();
        $sql = "select * from area where area like concat(:ar,'%')";

        $stmt = $this->con->prepare($sql);

        $data = [
            'ar' => $area,
        ];
        $stmt->execute($data);
 
        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }

    public function filtrarId($id){
        $sql = "select * from area where id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $area = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retornar resultados
        return $area;
    }

    

    public function actualizar($area, $siglo, $id)
    {
        //prepare
        $sql = "update area set area=:ar , siglo=:sig where id=:id";
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'id' => $id,
            'ar' => $area,
            'sig' => $siglo,
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) { // verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }

    public function eliminar($id) {
        //prepare
        $sql = "delete from area where id=:id";
         //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
           'id' => $id,       
        ];
        
        $sentencia->execute($data);
      
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
        
    }



}
