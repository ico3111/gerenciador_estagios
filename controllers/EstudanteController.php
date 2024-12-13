<?php
namespace Controller;

use Model\EstudanteModel;
use Model\VO\EstudanteVO;
use Model\UsuarioModel;
use Model\VO\UsuarioVO;

final class EstudanteController extends Controller {

    public function list() {
        $model = new EstudanteModel();
        
        $busca = $_GET['busca'] ?? ''; 
        $buscaId = $_GET['buscaId'] ?? ''; 

        if (!empty($busca)) {
            $estudantes = $model->buscar($busca, $_GET['campo'], $_GET['ordem']);
        } elseif (!empty($buscaId)) {
            $estudantes = [$model->selectOne(new EstudanteVO($buscaId))];
        } else {
            $estudantes = $model->selectAll(new EstudanteVO());
        }

        $this->loadView("listaEstudantes", [
            "estudantes" => $estudantes
        ]);
    }
    

    public function form() {
        $id = $_GET['id'] ?? 0;

        if (empty($id)) {
            $vo = new EstudanteVO();
        } else {
            $model = new EstudanteModel();
            $vo = $model->selectOne(new EstudanteVO($id));
        }
        
        $this->loadView("formEstudante", [
            "estudante" => $vo
        ]);
    }

    public function save() {
        $id = $_POST['id'];
        if (isset($_POST['id_estudante'])) {$id = 0;}
        $model = new EstudanteModel();

        $vo = new EstudanteVO(
            $id,
            $_POST['nome_estudante'],
            $_POST['matricula_estudante'],
            $_POST['cpf_estudante'],
            $_POST['rg_estudante'],
            $_POST['email_estudante'],
            $_POST['dataNasc_estudante'],
            $_POST['endereco_estudante'],
            $_POST['cidade_estudante'],
            $_POST['telefone_estudante'],
            $_POST['curso_estudante'],
            $_POST['ano_letivo_estudante']
        );
      
        if (empty($id)) {
            $lastId = $model->insert($vo);
            $UsuarioModel = new UsuarioModel();
            $UsuarioModel->insert(new UsuarioVO('', $_POST['matricula_estudante'], substr($_POST['cpf_estudante'], 0, 6), '1', 'estudante', $lastId, $_POST['nome_estudante'], $_POST['email_estudante']));
        } else {
            $result = $model->update($vo);
        }

        if (isset($_POST['id_estudante'])) {return $lastId;}
        $this->redirect("estudantes.php");
    }

    public function remove() {
        $model = new EstudanteModel();
        $model->delete(new EstudanteVO($_GET['id']));

        $this->redirect("estudantes.php");
    }
}
