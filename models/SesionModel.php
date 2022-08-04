<?php
require_once 'config/Conexion.php';

class SesionModel
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function insertar($nom, $ape, $ced, $email, $cont, $telf, $dom, $fecha)
    {
        //prepare
        $sql = "INSERT INTO usuarios(nombre_usuario, apellido_usuario, cedula_usuario, correo_usuario, password_usuario, telefono_usuario, domicilio_usuario, fechanac_usuario) VALUES 
            (:nom, :ape, :ced, :email, :cont, :telf, :dom, :fecha)";
        //now());
        //bind parameters

        $sentencia = $this->con->prepare($sql);

        $data = [
            'nom' => $nom,
            'ape' => $ape,
            'ced' => $ced,
            'email' => $email,
            'cont' => $cont,
            'telf' => $telf,
            'dom' => $dom,
            'fecha' => $fecha,
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

    public function actualizar($nom, $ape, $ced, $email, $cont, $telf, $dom, $fecha, $id)
    {
        //prepare
        $sql = "UPDATE `usuarios` SET `id_usuario`=null,`nombre_usuario`=:nom,`apellido_usuario`=:ape,`cedula_usuario`=:ced," .
            "`correo_usuario`=:email,`password_usuario`=:cont,`telefono_usuario`=:telf,`domicilio_usuario`=:dom," .
            "`fachanac_usuario`=:fecha WHERE id_usuario=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $fechaActual = new DateTime('NOW');
        $strfecha = $fechaActual->format('Y-m-d H:i:s');
        $data = [
            'nom' => $nom,
            'ape' => $ape,
            'ced' => $ced,
            'email' => $email,
            'cont' => $cont,
            'telf' => $telf,
            'dom' => $dom,
            'fecha' => $fecha,
            'id' => $id,
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

    public function Consultar($email)
    {
        //prepare
        $sql = "select * from usuario where username= :email";
        $sentencia = $this->con->prepare($sql);
        //binding parameters
        //execute

        $data = [
            'email' => $email,
        ];
        $sentencia->execute($data);
        //retornar resultados
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

        return $resultado;
    }
    public function consultarUserPass($user, $pass)
    {
       
        $sql = "select * from usuario where username=:user and password=:pass";
        $sentencia = $this->con->prepare($sql);

        $data = [
            'user' => $user,
            'pass' => $pass,
        ];

        $sentencia->execute($data);
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

        return $resultado;
    }
}
