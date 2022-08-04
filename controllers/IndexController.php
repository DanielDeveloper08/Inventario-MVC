<?php

class IndexController {
    
    public function index(){
        require_once 'views/home/loginView.php'; //mostrando la vista de home de la aplicacion
    }

    public function home(){
        require_once 'views/home/homeView.php';
    }
    
    public function estaticas(){
        $page =  $_GET['p'];
        require_once 'views/estaticas/'.$page.'.php';
        
    }
    
}
