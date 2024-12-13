<?php

namespace Controller;

use Model\UsuarioModel;
use Model\VO\UsuarioVO;

final class UsuarioController extends Controller {

    public function list() {
        $model = new UsuarioModel();
        $data = $model->selectAll(new UsuarioVO());

        $this->loadView("listaUsuarios", [
            "usuarios" => $data
        ]);
    }

    public function form() {
        $id = $_GET['id'] ?? 0;

        if (empty($id)) {
            $vo = new UsuarioVO();
        } else {
            $model = new UsuarioModel();
            $vo = $model->selectOne(new UsuarioVO($id));
        }

        $this->loadView("formUsuario", [
            "usuario" => $vo
        ]);
    }

    public function save() {
        $id = $_POST['id'] ?? 0;
        $model = new UsuarioModel();

        $vo = new UsuarioVO(
            $id,
            $_POST['login'],
            $_POST['senha'],
            $_POST['nivel'],
            $_POST['tipo_entidade'],
            $_POST['id_entidade'],
            $_POST['nome_entidade'],
            $_POST['email_entidade']
        );

        if (empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("home.php");
    }

    public function remove() {
        $id = $_GET['id'] ?? 0;

        if (!empty($id)) {
            $model = new UsuarioModel();
            $model->delete(new UsuarioVO($id));
        }

        $this->redirect("usuarios.php");
    }
}
