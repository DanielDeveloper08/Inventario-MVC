<?php

require_once 'models/AreaModel.php';

class AreaController
{

    private $model;

    public function __construct()
    {
        $this->model = new AreaModel();
    }

    // funcion del controlador
    public function index()
    {
        //llamar al modelo, obtener los  datos que me da el modelo
        $resultados = $this->model->listar();
        // llamar a la vista (incluir la vista)
        require_once 'views/opcions/areaView.php';
    }


    public function mensajeria()
    {
        $resultados = $this->model->listar();
        // llamar a la vista (incluir la vista)
        $opcion=$_GET['op'];
        require_once 'views/opcions/areaView.php';
        if($opcion=="insertar"){
            echo "<script> mensajeRegistrado();</script>";
        }else if($opcion=="editar"){
            echo "<script> mensajeActualizado();</script>";
        }   
    }

    public function agregar()
    {
        $area = htmlentities($_POST['txtArea']);
        $siglo = htmlentities($_POST['txtSiglo']);

        //llamar al modelo
        $exito = $this->model->insertar($area, $siglo);

        header('Location:index.php?c=Area&a=mensajeria&op=insertar');
    }

    public function eliminar()
    {
        // leer parametros
        $id = htmlentities($_GET['id']);

        //llamar al modelo
        $exito = $this->model->eliminar($id);

        header('Location:index.php?c=Area&a=index');


        //llamar a la vista
        //  header('Location:index.php?c=Productos&a=index'); // redireccionamiento, causa un cambio en la url

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

                $arrInfo = $this->model->filtrarArea($strBuscar);

                if (!empty($arrInfo)) {
                    $arrResponse = array('status' => true, 'found' => count($arrInfo), 'data' => $arrInfo);
                }
            }
            echo json_encode($arrResponse);
        }
        die();
    }

    public function inicializar()
    {
        if ($_GET) {
            if (empty($_GET["id"])) {
            } else {
                $buscarId = trim($_GET['id']);
                $arrResponse = array('status' => false, 'found' => 0, 'data' => '');

                $arrInfo = $this->model->filtrarId($buscarId);

                if (!empty($arrInfo)) {
                    $arrResponse = array('status' => true, 'found' => count($arrInfo), 'data' => $arrInfo);
                }
            }
            echo json_encode($arrResponse);
        }
        die();
    }

    public function mostrar()
    { // MUESTRA EL FORMULARIO DE PRODUCTO EXISTENTE PARA SU EDICION
        // llamar al modelo
        require_once 'models/CategoriasModel.php';
        $modelCat = new CategoriaModel();
        //$categorias = $modelCat->consultar(); // obtener las categorias de productos

        $id = $_GET['id'];
        $prod =  $this->model->buscarxId($id);

        // llamar a la vista
        require_once 'views/productos/productoEditarView.php';
    }
    public function buscarProductos()
    {
        require_once 'models/ProductosModel.php';
        $modelCat = new CategoriaModel();
        $categoria = $_GET['p'];
        $productos =  $this->model->buscarxCategoria($categoria);
        echo json_encode($productos);
    }
    public function editar()
    {
        $txtArea = htmlentities(ucfirst($_POST["txtArea"]));
        $txtSiglo = htmlentities(ucfirst($_POST["txtSiglo"]));
        $txtIdModificar = ($_POST["id"]);
        //llamar al modelo
        $exito = $this->model->actualizar($txtArea, $txtSiglo,$txtIdModificar);

        //llamar a la vista
        header('Location:index.php?c=Area&a=mensajeria&op=editar');
    }
}
