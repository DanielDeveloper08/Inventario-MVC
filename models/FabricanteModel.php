
<?php

require_once 'config/Conexion.php';

class FabricanteModel {

    private $con;

    // constructor
    public function __construct() {
        $this->con = Conexion::getConexion(); // :: para acceder a funciones  static
    }

    public function listar() { // listar todos los productos
        $sql = "select * from fabricante";
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
    public function insertar($codigo, $fabricante) {
      
        $sql = "INSERT INTO fabricante (id,codigo, fabricante) VALUES 
            (NULL, :cod, :fab)";
       
        $sentencia = $this->con->prepare($sql);
       $data = [
            'cod' => $codigo,
            'fab' => $fabricante,
        ];
        $sentencia->execute($data);

        if ($sentencia->rowCount() <= 0) {
            return false;
        }
        return true;
    }

    public function filtrarFabricante($fabricante)
    {

        $arrRegistros = array();
        $sql = "select * from fabricante where fabricante like concat(:fab,'%')";

        $stmt = $this->con->prepare($sql);

        $data = [
            'fab' => $fabricante,
        ];
        $stmt->execute($data);
 
        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }

    public function filtrarId($id){
        $sql = "select * from fabricante where id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $fabricante = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retornar resultados
        return $fabricante;
    }

    public function actualizar($fabricante, $id)
    {
        //prepare
        $sql = "update fabricante set fabricante=:fab where id=:id";
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'id' => $id,
            'fab' => $fabricante,
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
        $sql = "delete from fabricante where id=:id";
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
