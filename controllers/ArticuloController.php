<?php

require_once 'models/ArticuloModel.php';
require_once 'models/AreaModel.php';
require_once 'models/CategoriaModel.php';
require_once 'models/FabricanteModel.php';
require_once 'models/ColorModel.php';
require_once 'models/AnioModel.php';

class ArticuloController
{

    private $modelArticulo;
    private $modelArea;
    private $modelCategoria;
    private $modelFabricante;
    private $modelColor;
    private $modelAnio;

    public function __construct()
    {
        $this->modelArticulo = new ArticuloModel();
        $this->modelArea = new AreaModel();
        $this->modelCategoria = new CategoriaModel();
        $this->modelFabricante = new FabricanteModel();
        $this->modelColor = new ColorModel();
        $this->modelAnio = new AnioModel();
    }

    // funcion del controlador
    public function index()
    {
        $resultadosArticulo = $this->modelArticulo->listar();
        $resultadosArea = $this->modelArea->listar();
        $resultadosCategoria = $this->modelCategoria->listar();
        $resultadosFabricante = $this->modelFabricante->listar();
        $resultadosColor = $this->modelColor->listar();
        $resultadosAnio = $this->modelAnio->listar();
        require_once 'views/opcions/articuloView.php';
    }


    public function mensajeria()
    {
        $resultadosArticulo = $this->modelArticulo->listar();
        // llamar a la vista (incluir la vista)
        $opcion = $_GET['op'];
        require_once 'views/opcions/articuloView.php';
        if ($opcion == "insertar") {
            echo "<script> mensajeRegistrado();</script>";
        } else if ($opcion == "editar") {
            echo "<script> mensajeActualizado();</script>";
        }
    }

    public function inicializar()
    {
        if ($_GET) {
            if (empty($_GET["id"])) {
               
            } else {
                
                $buscarId = trim($_GET['id']);
                $arrResponse = array('status' => false, 'found' => 0, 'data' => '');

                $arrInfo = $this->modelArticulo->filtrarId($buscarId);

                if (!empty($arrInfo)) {
                    $arrResponse = array('status' => true, 'found' => count($arrInfo), 'data' => $arrInfo);
                }
            }
            echo json_encode($arrResponse);
        }
        die();
    }


    public function agregar()
    {
        $txtCodigo = htmlentities($_POST['txtCodigo']);
        $selectArea = htmlentities(ucfirst($_POST['selectArea']));
        $selectCategoria = htmlentities(ucfirst($_POST['selectCategoria']));
        $selectFabricante = htmlentities(ucfirst($_POST['selectFabricante']));
        $selectColor = htmlentities(ucfirst($_POST['selectColor']));
        $selectAnio = htmlentities($_POST['selectAnio']);
        $txtModelo = htmlentities(ucfirst($_POST['txtModelo']));
        $txtSerie = htmlentities(ucfirst($_POST['txtSerie']));
        $selectCondicion = htmlentities(ucfirst($_POST['selectCondicion']));
        $txtMarca = htmlentities(ucfirst($_POST['txtMarca']));
        $txtDescripcion = htmlentities(ucfirst($_POST['txtDescripcion']));
        $selectEstado = htmlentities(ucfirst($_POST['selectEstado']));
        $txtObservacion = htmlentities(ucfirst($_POST['txtObservacion']));

        $exito = $this->modelArticulo->insertar($txtCodigo, $selectArea, $selectCategoria, $selectFabricante, $selectColor, $selectAnio, $txtModelo, $txtSerie, $selectCondicion, $txtMarca, $txtDescripcion, $selectEstado, $txtObservacion);

        header('Location:index.php?c=Articulo&a=mensajeria&op=insertar');
    }

    public function eliminar()
    {
        $id = htmlentities($_GET['id']);
        $exito = $this->modelArticulo->eliminar($id);
        header('Location:index.php?c=Articulo&a=index');
    }

    public function cargarDatos()
    {
        if ($_POST) {
            if (($_POST["selectBuscarAnio"]) == "Seleccionar año") {
                $arrInfo = $this->modelArticulo->listar();
                $arrResponse = array('status' => true, 'found' => count($arrInfo), 'data' => $arrInfo);
            } else {
                $strBuscar = trim($_POST['selectBuscarAnio']);

                $arrResponse = array('status' => false, 'found' => 0, 'data' => '');

                $arrInfo = $this->modelArticulo->filtrarAnio($strBuscar);

                if (!empty($arrInfo)) {
                    $arrResponse = array('status' => true, 'found' => count($arrInfo), 'data' => $arrInfo);
                }
            }
            echo json_encode($arrResponse);
        }
        die();
    }


    public function editar()
    {
        $txtIdModificar = ($_POST["id"]);
        $selectArea = htmlentities(ucfirst($_POST["selectArea"]));
        $selectCategoria = htmlentities(ucfirst($_POST["selectCategoria"]));
        $selectFabricante = htmlentities(ucfirst($_POST["selectFabricante"]));
        $selectColor = htmlentities(ucfirst($_POST["selectColor"]));
        $selectAnio = htmlentities($_POST["selectAnio"]);
        $txtModelo = htmlentities(ucfirst($_POST["txtModelo"]));
        $txtSerie = htmlentities(ucfirst($_POST["txtSerie"]));
        $selectCondicion = htmlentities(ucfirst($_POST["selectCondicion"]));
        $txtMarca = htmlentities(ucfirst($_POST["txtMarca"]));
        $txtDescripcion = htmlentities(ucfirst($_POST["txtDescripcion"]));
        $selectEstado = htmlentities(ucfirst($_POST["selectEstado"]));
        $txtObservacion = htmlentities(ucfirst($_POST["txtObservacion"]));

        $exito = $this->modelArticulo->actualizar($txtIdModificar,$selectArea, $selectCategoria, $selectFabricante, $selectColor, $selectAnio, $txtModelo, $txtSerie, $selectCondicion, $txtMarca, $txtDescripcion, $selectEstado, $txtObservacion);

        header('Location:index.php?c=Articulo&a=mensajeria&op=editar');
    }
}
