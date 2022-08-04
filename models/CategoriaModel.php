
<?php

require_once 'config/Conexion.php';

class CategoriaModel
{

    private $con;

    // constructor
    public function __construct()
    {
        $this->con = Conexion::getConexion(); // :: para acceder a funciones  static
    }

    public function listar()
    { // listar todos los productos
        $sql = "select * from categoria";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        // ejecutar la sentencia
        $stmt->execute();
        // recuperar los datos (en caso de select)
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retornar resultados
        return $resultados;
    }

    public function insertar($codigo, $categoria)
    {

        $sql = "INSERT INTO categoria (id,codigo, categoria) VALUES 
            (NULL, :cod, :cat)";

        $sentencia = $this->con->prepare($sql);
        $data = [
            'cod' => $codigo,
            'cat' => $categoria,
        ];
        $sentencia->execute($data);

        if ($sentencia->rowCount() <= 0) {
            return false;
        }
        return true;
    }


    public function filtrarCategoria($categoria)
    {

        $arrRegistros = array();
        $sql = "select * from categoria where categoria like concat(:cat,'%')";

        $stmt = $this->con->prepare($sql);

        $data = [
            'cat' => $categoria,
        ];
        $stmt->execute($data);
 
        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }

    public function filtrarId($id){
        $sql = "select * from categoria where id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $categoria = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retornar resultados
        return $categoria;
    }

    public function actualizar($categoria, $id)
    {
        //prepare
        $sql = "update categoria set categoria=:cat where id=:id";
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'id' => $id,
            'cat' => $categoria,
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

    public function eliminar($id)
    {
        //prepare
        $sql = "delete from categoria where id=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'id' => $id,
        ];

        $sentencia->execute($data);

        if ($sentencia->rowCount() <= 0) { // verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }
}
