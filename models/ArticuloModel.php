
<?php

require_once 'config/Conexion.php';

class ArticuloModel
{

    private $con;

    // constructor
    public function __construct()
    {
        $this->con = Conexion::getConexion(); // :: para acceder a funciones  static
    }

    public function listar()
    { // listar todos los productos
        $sql = "select * from articulo";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        // ejecutar la sentencia
        $stmt->execute();
        // recuperar los datos (en caso de select)
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retornar resultados
        return $resultados;
    }

    public function filtrarAnio($anio)
    {

        $arrRegistros = array();
        $sql = "select * from articulo where anio=:an";

        $stmt = $this->con->prepare($sql);

        $data = [
            'an' => $anio,
        ];
        $stmt->execute($data);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function filtrarId($id)
    {
        $sql = "select * from articulo where id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $articulo = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retornar resultados
        return $articulo;
    }

    public function actualizar($id,$selectArea, $selectCategoria, $selectFabricante, $selectColor, $selectAnio, $txtModelo, $txtSerie, $selectCondicion, $txtMarca, $txtDescripcion, $selectEstado, $txtObservacion)
    {
        //prepare
        $sql = "update articulo set  area=:are, categoria=:cat,fabricante=:fab,color=:col,anio=:ani,modelo=:mod,serie=:ser,condicion=:con,marca=:mar,descripcion=:descr,estado=:est,observacion=:obs where id=:id";
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'id' => $id,
            'are' => $selectArea,
            'cat' => $selectCategoria,
            'fab' => $selectFabricante,
            'col' => $selectColor,
            'ani' => $selectAnio,
            'mod' => $txtModelo,
            'ser' => $txtSerie,
            'con' => $selectCondicion,
            'mar' => $txtMarca,
            'descr' => $txtDescripcion,
            'est' => $selectEstado,
            'obs' => $txtObservacion,
        ];

        $sentencia->execute($data);

        if ($sentencia->rowCount() <= 0) { // verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }


    public function insertar($txtCodigo, $selectArea, $selectCategoria, $selectFabricante, $selectColor, $selectAnio, $txtModelo, $txtSerie, $selectCondicion, $txtMarca, $txtDescripcion, $selectEstado, $txtObservacion)
    {

        $sql = "INSERT INTO articulo (id,codigo, area, categoria, fabricante, color, anio, modelo, serie, condicion, marca, descripcion, estado, observacion) VALUES 
            (NULL, :cod, :are, :cat,:fab,:col,:ani,:mod,:ser,:con,:mar,:descr,:est,:obs)";

        $sentencia = $this->con->prepare($sql);
        $data = [
            'cod' => $txtCodigo,
            'are' => $selectArea,
            'cat' => $selectCategoria,
            'fab' => $selectFabricante,
            'col' => $selectColor,
            'ani' => $selectAnio,
            'mod' => $txtModelo,
            'ser' => $txtSerie,
            'con' => $selectCondicion,
            'mar' => $txtMarca,
            'descr' => $txtDescripcion,
            'est' => $selectEstado,
            'obs' => $txtObservacion,
        ];
        $sentencia->execute($data);

        if ($sentencia->rowCount() <= 0) {
            return false;
        }
        return true;
    }


    public function eliminar($id)
    {
        $sql = "delete from articulo where id=:id";
        $sentencia = $this->con->prepare($sql);
        $data = [
            'id' => $id,
        ];

        $sentencia->execute($data);

        if ($sentencia->rowCount() <= 0) {
            return false;
        }
        return true;
    }
}
