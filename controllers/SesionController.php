<?php
require_once "controllers/User.php";
require_once "controllers/UserSesion.php";
class SesionController
{
    private $user;
    private $UserSesion;

    public function __construct()
    {
        $this->userSesion = new UserSesion();
        $this->user = new User();
    }



    public function autenticar()
    {
        if (isset($_SESSION['user'])) {
            $this->user->setUser($this->userSesion->getCurrentUser());
            $nombre = $this->user->getNombre();
            $_SESSION['nombre'] = $nombre;
            header('Location:index.php?c=Home&a=index');
        } else if (isset($_POST['user']) && isset($_POST['pass'])) {
            

            $userForm = htmlentities($_POST['user']);
            $passForm = htmlentities($_POST['pass']);



            if ($this->user->userExists($userForm, $passForm)) {
               
                $this->userSesion->setCurrentUser($userForm);
                $this->user->setUser($userForm);
                $nombre = $this->user->getNombre();
                $_SESSION['nombre'] = $nombre;
                header('Location:index.php?c=Home&a=index');
            } else {
               // echo "<script>alert('Segundo-Segundo');</script>";
                $errorLogin = "Nombre de usuario y/o password es incorrecto!";
                require_once 'views/home/loginView.php';
            }
        } else {
            //echo "<script>alert('Tercer');</script>";
            echo "login";
            header('Location:index.php?c=index&a=index');
        }
    }


    public function cerrarSesion()
    {
        $this->userSesion->closeSession(); 
        header('Location:index.php?c=index&a=index');
    }

    /* $email = htmlentities($_POST['user']);
        $cont = htmlentities($_POST['pass']);

        try {
            $usuario = $this->model->Consultar($email);
            session_start();
            if ($usuario != null) {
                if ($usuario->password == $cont) {

                    $_SESSION["nombre"] = $usuario->nombres_ususario;
                    header('Location:index.php?c=Home&a=index');
                } else {
                    $_SESSION["error"] = "Contraseña incorrecta.";
                    echo "error";
                }
            } else {
                $_SESSION["error"] = "No existe un usuraio registrado con ese nombre.";
                echo "error";
            }
        } catch (Exception $e) {
            echo $e;
        }*/
}
