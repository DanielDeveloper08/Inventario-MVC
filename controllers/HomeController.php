<?php

require_once 'models/ArticuloModel.php';
require_once 'models/AreaModel.php';
require_once 'models/CategoriaModel.php';
require_once 'models/FabricanteModel.php';

class HomeController
{

    private $modelHome;
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
    }

    // funcion del controlador
    public function index()
    {
        $resultadosArticulo = $this->modelArticulo->listar();
        $resultadosArea = $this->modelArea->listar();
        $resultadosCategoria = $this->modelCategoria->listar();
        $resultadosFabricante = $this->modelFabricante->listar();
        require_once 'views/home/homeView.php';
    }

 
    public function agregar(){
        $codigo = htmlentities($_POST['txtCodigo']);
        $categoria = htmlentities($_POST['txtCategoria']);
        
        //llamar al modelo
        $exito = $this->model->insertar($codigo, $categoria);
        $msj = 'Categoria guardada exitosamente';
        if (!$exito) {
            $msj = "No se pudo realizar el guardado";
        }
    }

    public function eliminar()
    {
        // leer parametros
        $id = htmlentities($_GET['id']);
    
        //llamar al modelo
        $exito = $this->model->eliminar($id);
        
        header('Location:index.php?c=Categoria&a=index');
        

        //llamar a la vista
      //  header('Location:index.php?c=Productos&a=index'); // redireccionamiento, causa un cambio en la url

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
        // leer parametros
        $id =   htmlentities($_POST['id']);
        $cod = htmlentities($_POST['codigo']);
        $nom = htmlentities($_POST['nombre']);
        $desc = htmlentities($_POST['descripcion']);
        $precio = htmlentities($_POST['precio']);
        $idCat = htmlentities($_POST['categoria']);
        $estado = (isset($_POST['estado'])) ? 1 : 0;
        $usu = 'usuario'; //$_SESSION['usuario'];
        //if(!isset($_POST['codigo'])){ header('');}

        //llamar al modelo
        $exito = $this->model->actualizar($cod, $nom, $desc, $estado, $precio, $idCat, $usu, $id);
        $msj = 'Producto actualizado exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo realizar la actualizacion";
            $color = "danger";
        }
        session_start();
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;

        //llamar a la vista
        header('Location:index.php?c=Productos&a=index');
    }
}
