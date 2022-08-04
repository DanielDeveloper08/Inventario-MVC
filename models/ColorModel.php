
<?php

require_once 'config/Conexion.php';

class ColorModel {

    private $con;

    // constructor
    public function __construct() {
        $this->con = Conexion::getConexion(); // :: para acceder a funciones  static
    }

    public function listar() { // listar todos los productos
        $sql = "select * from color";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        // ejecutar la sentencia
        $stmt->execute();
        // recuperar los datos (en caso de select)
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retornar resultados
        return $resultados;
    }
 
    public function insertar($codigo, $color) {
      
        $sql = "INSERT INTO color (id,codigo, color) VALUES 
            (NULL, :cod, :col)";
       
        $sentencia = $this->con->prepare($sql);
       $data = [
            'cod' => $codigo,
            'col' => $color,
        ];
        $sentencia->execute($data);

        if ($sentencia->rowCount() <= 0) {
            return false;
        }
        return true;
    }

    
    public function filtrarColor($color)
    {

        $arrRegistros = array();
        $sql = "select * from color where color like concat(:col,'%')";

        $stmt = $this->con->prepare($sql);

        $data = [
            'col' => $color,
        ];
        $stmt->execute($data);
 
        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }

    public function filtrarId($id){
        $sql = "select * from color where id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $color = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retornar resultados
        return $color;
    }

    public function actualizar($color, $id)
    {
        //prepare
        $sql = "update color set color=:col where id=:id";
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'id' => $id,
            'col' => $color,
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
        $sql = "delete from color where id=:id";
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
