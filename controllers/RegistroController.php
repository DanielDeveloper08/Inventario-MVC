<?php

require_once 'models/RegistroModel.php';

class RegistroController
{

    private $model;

    public function __construct()
    {
       $this->model = new RegistroModel();
    }

  
    public function index()
    {
        require_once 'views/opcions/registroView.php';
    }

    public function mensajeria()
    {
        require_once 'views/opcions/RegistroView.php';
        echo "<script> mensajeRegistrado();</script>";  
    }
   

    public function agregar()
    {
        $nombres = htmlentities($_POST['txtNombres']);
        $username = htmlentities($_POST['txtUsuario']);
        $password = htmlentities($_POST['txtPassword']);
     
        $exito = $this->model->insertar($nombres, $username,md5($password));

        header('Location:index.php?c=Registro&a=mensajeria');
    }

 
}