<?php

require_once 'models/AnioModel.php';

class AnioController
{

    private $model;

    public function __construct()
    {
        $this->model = new AnioModel();
    }

    // funcion del controlador
    public function index()
    {
        //llamar al modelo, obtener los  datos que me da el modelo
        $resultados = $this->model->listar();
        // llamar a la vista (incluir la vista)
        require_once 'views/opcions/anioView.php';
    }

    public function mensajeria()
    {
        $resultados = $this->model->listar();
        // llamar a la vista (incluir la vista)
        $opcion=$_GET['op'];
        require_once 'views/opcions/anioView.php';
       
        if($opcion=="insertar"){
            echo "<script> mensajeRegistrado();</script>";
        }else if($opcion=="editar"){
            echo "<script> mensajeActualizado();</script>";
        } 
    }

    public function agregar()
    {
        $codigo = htmlentities($_POST['txtCodigo']);
        $anio = htmlentities($_POST['txtAnio']);

        //llamar al modelo
        $exito = $this->model->insertar($codigo, $anio);

        header('Location:index.php?c=Anio&a=mensajeria&op=insertar');
    }

    public function eliminar()
    {
        // leer parametros
        $id = htmlentities($_GET['id']);

        //llamar al modelo
        $exito = $this->model->eliminar($id);

        header('Location:index.php?c=Anio&a=index');

    }


    public function cargarDatos()
    {
        if ($_POST) {
            if (empty($_POST["txtBuscar"])) {
                $arrInfo = $this->model->listar();
                $arrResponse = array('status' => true, 'found' => count($arrInfo), 'data' => $arrInfo);
            } else {
                $strBuscar = trim($_POST['txtBuscar']);

                $arrResponse = array('status' => false, 'found' => 0, 'data' => '');

                $arrInfo = $this->model->filtrarAnio($strBuscar);

                if (!empty($arrInfo)) {
                    $arrResponse = array('status' => true, 'found' => count($arrInfo), 'data' => $arrInfo);
                }
            }
            echo json_encode($arrResponse);
        }
        die();
    }

    public function inicializar(){
        if($_GET){
            if(empty($_GET["id"])){
        
            }else{
                $buscarId=trim($_GET['id']);
                $arrResponse= array('status'=>false,'found'=>0,'data'=>'');

                $arrInfo= $this->model->filtrarId($buscarId);

                if(!empty($arrInfo)){
                    $arrResponse= array('status'=>true,'found'=>count($arrInfo),'data'=>$arrInfo);
                }
            }
            echo json_encode($arrResponse);
        }
        die();
    }

    public function editar()
    {
        $txtAnio=htmlentities(ucfirst($_POST["txtAnio"]));
        $txtIdModificar=($_POST["id"]);
        //llamar al modelo
        $exito = $this->model->actualizar($txtAnio,$txtIdModificar);
    
        //llamar a la vista
        header('Location:index.php?c=Anio&a=mensajeria&op=editar');  
    }
    
    
}
