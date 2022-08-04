<?php
    require_once "models/SesionModel.php";
    class User{
        private $nombre;
        private $username;
        private $model;


         public function __construct()
        {
            $this->model = new SesionModel();
        }

        public function userExists($user,$pass){
            $md5pass=md5($pass);

            $resp=$this->model->consultarUserPass($user,$md5pass);
            if($resp){
                return true;
            }else{
                return false;
            }
        }


        public function setUser($user){
                 $resp=$this->model->Consultar($user);
                 
                 $this->nombre=$resp->nombres_usuario;
                 $this->username=$resp->username;
            
        }


        public function getNombre(){
            return $this->nombre;
        }
    }

?>