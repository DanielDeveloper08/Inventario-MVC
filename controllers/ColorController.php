<?php

require_once 'models/ColorModel.php';

class ColorController
{

    private $model;

    public function __construct()
    {
        $this->model = new ColorModel();
    }

    // funcion del controlador
    public function index()
    {
        //llamar al modelo, obtener los  datos que me da el modelo
        $resultados = $this->model->listar();
        // llamar a la vista (incluir la vista)
        require_once 'views/opcions/colorView.php';
    }


    public function mensajeria()
    {
        $resultados = $this->model->listar();
        // llamar a la vista (incluir la vista)
        $opcion=$_GET['op'];
        require_once 'views/opcions/colorView.php';

        if($opcion=="insertar"){
            echo "<script> mensajeRegistrado();</script>";
        }else if($opcion=="editar"){
            echo "<script> mensajeActualizado();</script>";
        } 
    }

    public function agregar()
    {
        $codigo = htmlentities($_POST['txtCodigo']);
        $color = htmlentities($_POST['txtColor']);

        //llamar al modelo
        $exito = $this->model->insertar($codigo, $color);

        header('Location:index.php?c=Color&a=mensajeria&op=insertar');
    }

    public function eliminar()
    {
        // leer parametros
        $id = htmlentities($_GET['id']);

        //llamar al modelo
        $exito = $this->model->eliminar($id);

        header('Location:index.php?c=Color&a=index');
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

                $arrInfo = $this->model->filtrarColor($strBuscar);

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
        $txtColor=htmlentities(ucfirst($_POST["txtColor"]));
        $txtIdModificar=($_POST["id"]);
        //llamar al modelo
        $exito = $this->model->actualizar($txtColor,$txtIdModificar);
    
        //llamar a la vista
        header('Location:index.php?c=Color&a=mensajeria&op=editar');  
    }

   
}
