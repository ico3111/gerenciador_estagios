<?php

namespace Controller;

abstract class Controller {

    public function __construct($obrigaLogin = true){
        session_start();
        if($obrigaLogin) {
            if(!isset($_SESSION["usuario"])) {
                $this->redirect("index.php");
                exit;
            }

            $this->verificaLocal();
        }        
    }

    public function verificaLocal() {
        if ($_SESSION['usuario']->getNivel() === '2') {return;}

        $idUsuario = $_SESSION['usuario']->getId();
        $id = $_GET['id'] ?? '';

        $arquivoAtual = basename($_SERVER['PHP_SELF']);
        //isso serve para uma pessoa n mudar o id na url e dps alterar a conta de outra pessoa:
        $arquivoAtual .= empty($id) ? '' : "?id=$id";

        $locaisPermitidos = ['index.php', 'fazerLogin.php', 'home.php', 'estagios.php', "usuario.php?id=$idUsuario", 'usuarioSalvar.php', 'error.php', 'logout.php'];
        
        if (!in_array($arquivoAtual, $locaisPermitidos)) {
            $this->redirect("error.php?error=Você não tem autorização para acessar esta parte do sistema!");
        }
    }

    public function redirect($url) {
        header("Location: " . $url);
    }

    public function loadView($view, $data = []) {
        extract($data);
        include("views/" . $view . ".php");
    }

    public function uploadFiles($file) {
        if (empty($file["name"])) {
            return "";
        }
        
        $extensao = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . "." . $extensao;
        move_uploaded_file($file['tmp_name'], "uploads/" . $nomeArquivo);

        return $nomeArquivo;
    }

}