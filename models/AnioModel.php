
<?php

require_once 'config/Conexion.php';

class AnioModel
{

    private $con;

    // constructor
    public function __construct()
    {
        $this->con = Conexion::getConexion(); // :: para acceder a funciones  static
    }

    public function listar()
    { // listar todos los productos
        $sql = "select * from anio";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        // ejecutar la sentencia
        $stmt->execute();
        // recuperar los datos (en caso de select)
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retornar resultados
        return $resultados;
    }

    public function insertar($codigo, $anio)
    {

        $sql = "INSERT INTO anio (id,codigo, anio) VALUES 
            (NULL, :cod, :an)";

        $sentencia = $this->con->prepare($sql);
        $data = [
            'cod' => $codigo,
            'an' => $anio,
        ];
        $sentencia->execute($data);

        if ($sentencia->rowCount() <= 0) {
            return false;
        }
        return true;
    }


    public function filtrarAnio($anio)
    {
        $arrRegistros = array();
        $sql = "select * from anio where anio like concat(:an,'%')";

        $stmt = $this->con->prepare($sql);

        $data = [
            'an' => $anio,
        ];
        $stmt->execute($data);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function filtrarId($id)
    {
        $sql = "select * from anio where id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $anio = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retornar resultados
        return $anio;
    }

    public function actualizar($anio, $id)
    {
        //prepare
        $sql = "update anio set anio=:ani where id=:id";
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'id' => $id,
            'ani' => $anio,
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
        $sql = "delete from anio where id=:id";
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
