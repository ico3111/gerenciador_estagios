<?php

namespace Controller;

use Model\UsuarioModel;
use Model\VO\UsuarioVO;

final class LoginController extends Controller {

    public function __construct() {
        parent::__construct(false);
    }

    public function login() {
        $this->loadView("login");
    }

    public function fazerLogin(){
        $vo = isset($_SESSION['usuario']) ? new UsuarioVO(0, $_SESSION['usuario']->getLogin(), $_SESSION['usuario']->getSenha()) : new UsuarioVO(0, $_POST['login'], $_POST['senha']);

        $model = new UsuarioModel();
        $result = $model->doLogin($vo);

        if(empty($result)){
            $this->redirect("index.php?error");
        }else {
            $this->redirect("home.php");
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect("index.php");
    }
}