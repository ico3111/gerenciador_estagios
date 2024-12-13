<?php
namespace Controller;

use Model\ProfessorModel;
use Model\VO\ProfessorVO;
use Model\UsuarioModel;
use Model\VO\UsuarioVO;

final class ProfessorController extends Controller {

    public function list() {
        $model = new ProfessorModel();
        
        $busca = $_GET['busca'] ?? ''; 
        $buscaId = $_GET['buscaId'] ?? ''; 

        if (!empty($busca)) {
            $professores = $model->buscar($busca, $_GET['campo'], $_GET['ordem']);
        } elseif (!empty($buscaId)) {
            $professores = [$model->selectOne(new ProfessorVO($buscaId))];
        } else {
            $professores = $model->selectAll(new ProfessorVO());
        }
    
        $this->loadView("listaProfessores", [
            "professores" => $professores
        ]);
    }
    

    public function form() {
        $id = $_GET['id'] ?? 0;

        if (empty($id)) {
            $vo = new ProfessorVO();
        } else {
            $model = new ProfessorModel();
            $vo = $model->selectOne(new ProfessorVO($id));
        }
        
        $this->loadView("formProfessor", [
            "professor" => $vo
        ]);
    }

    public function save($isCoorientador = false) {
        $id = $_POST['id'];
        if (isset($_POST['id_professor_orientador']) || isset($_POST['id_professor_coorientador'])) {$id = 0;}

        $model = new ProfessorModel();

        $vo = new ProfessorVO(
            $id, 
            $_POST['nome_professor'], 
            $_POST['siap_professor'], 
            $_POST['cpf_professor'], 
            $_POST['email_professor']
        );

        if ($isCoorientador) {
            $vo = new ProfessorVO (
                $id, 
                $_POST['nome_professor_coorientador'], 
                $_POST['siap_professor_coorientador'], 
                $_POST['cpf_professor_coorientador'], 
                $_POST['email_professor_coorientador']
            );
        }

        if (empty($id)) {
            $lastId = $model->insert($vo);
            $UsuarioModel = new UsuarioModel();
            if (!$isCoorientador) { $UsuarioModel->insert(new UsuarioVO('', $_POST['siap_professor'], substr($_POST['cpf_professor'], 0, 6), '1', 'professor', $lastId, $_POST['nome_professor'], $_POST['email_professor'])); }
            else { $UsuarioModel->insert(new UsuarioVO('', $_POST['siap_professor_coorientador'], substr($_POST['cpf_professor_coorientador'], 0, 6), '1', 'professor', $lastId, $_POST['nome_professor_coorientador'], $_POST['email_professor_coorientador'])); }
           
        } else {
            $result = $model->update($vo);
        }

        if (isset($_POST['id_professor_orientador']) || isset($_POST['id_professor_coorientador'])) {return $lastId;}
        $this->redirect("professores.php");
    }

    public function remove() {
        $model = new ProfessorModel();
        $model->delete(new ProfessorVO($_GET['id']));
        $this->redirect("professores.php");
    }
}
