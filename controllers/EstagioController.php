<?php
namespace Controller;

use Model\EstudanteModel;
use Controller\EstudanteController;
use Model\VO\EstudanteVO;
use Model\EmpresaModel;
use Controller\EmpresaController;
use Model\VO\EmpresaVO;
use Model\ProfessorModel;
use Controller\ProfessorController;
use Model\VO\ProfessorVO;
use Model\EstagioModel;
use Model\VO\EstagioVO;

final class EstagioController extends Controller {

    public function list() {
        $model = new EstagioModel();
        $estudanteModel = new EstudanteModel();
        $empresaModel = new EmpresaModel();
        $professorModel = new ProfessorModel();

        $busca = $_GET['busca'] ?? ''; 
        $campo = $_GET['campo'] ?? ''; 
        $ordem = $_GET['ordem'] ?? ''; 
        
        $estagios = $model->buscar($busca, $campo, $ordem);
        if ($estagios === 0) {$this->redirect('error.php?error=Erro na filtragem');}
    
        foreach ($estagios as $estagio) {
            $estagio->setEstudante($estudanteModel->selectOne(new EstudanteVO($estagio->getIdEstudante()))->getNome());
            $estagio->setEmpresa($empresaModel->selectOne(new EmpresaVO($estagio->getIdEmpresa()))->getNomeEmpresa());
            $estagio->setProfessorOrientador($professorModel->selectOne(new ProfessorVO($estagio->getIdProfessorOrientador()))->getNome());
            if (!empty($estagio->getIdProfessorCoorientador())) {$estagio->setProfessorCoorientador($professorModel->selectOne(new ProfessorVO($estagio->getIdProfessorCoorientador()))->getNome());}
            $estagio->setCidadeEmpresa($empresaModel->selectOne(new EmpresaVO($estagio->getIdEmpresa()))->getCidadeEmpresa());
            $estagio->setCursoEstudante($estudanteModel->selectOne(new EstudanteVO($estagio->getIdEstudante()))->getCurso());
            $estagio->setAnoLetivoEstudante($estudanteModel->selectOne(new EstudanteVO($estagio->getIdEstudante()))->getAnoLetivo());
        }

        $this->loadView("listaEstagios", [
            "estagios" => $estagios
        ]);
    }
    

    public function form() {
        $id = $_GET['id'] ?? 0;

        if (empty($id)) {
            $vo = new EstagioVO();
        } else {
            $model = new EstagioModel();
            $vo = $model->selectOne(new EstagioVO($id));
        }
        
        $estudanteModel = new EstudanteModel();
        $estudantes = $estudanteModel->selectAll(new EstudanteVO());

        $empresaModel = new EmpresaModel();
        $empresas = $empresaModel->selectAll(new EmpresaVO());

        $professorModel = new ProfessorModel();
        $professores = $professorModel->selectAll(new ProfessorVO());

        $this->loadView("formEstagio", [
            "estagio" => $vo,
            "estudantes" => $estudantes,
            "empresas" => $empresas,
            "professores" => $professores
        ]);

    }

    public function save() {
        $id = $_POST['id'];
        
        $model = new EstagioModel();
        $estudanteController = new EstudanteController();
        $empresaController = new EmpresaController();
        $professorController = new ProfessorController();

        $idEstudante = $_POST['id_estudante'];
        if ($idEstudante === '0') {
            $idEstudante = $estudanteController->save();
        }

        $idEmpresa = $_POST['id_empresa'];
        if ($idEmpresa === '0') {
            $idEmpresa = $empresaController->save();
        }

        $idProfessorOrientador = $_POST['id_professor_orientador'];
        if ($idProfessorOrientador === '0') {
            $idProfessorOrientador = $professorController->save();
        }

        $idProfessorCoorientador = $_POST['id_professor_coorientador'];
        if ($idProfessorCoorientador === '0') {
            $idProfessorCoorientador = $professorController->save(true);//$isCoorientador = true
        }
        else if (empty($idProfessorCoorientador)) {$idProfessorCoorientador = null;}

        $tc = $this->uploadFiles($_FILES['termo_compromisso']);
        $pe = $this->uploadFiles($_FILES['plano_estagio']);
        $aa = $this->uploadFiles($_FILES['auto_avaliacao']);
        $ea = $this->uploadFiles($_FILES['empresa_avaliacao']);
        $rf = $this->uploadFiles($_FILES['relatorio_final']);

        $vo = new EstagioVO(
            $id,
            $idEstudante,
            $idEmpresa,
            $idProfessorOrientador,
            $idProfessorCoorientador,
            $_POST['nome_supervisor'],
            $_POST['cargo_supervisor'],
            $_POST['telefone_supervisor'],
            $_POST['email_supervisor'],
            $_POST['declara_banca'],
            $_POST['tipo_processo'],
            $_POST['area_estagio'],
            $_POST['carga_horaria'],
            $_POST['encaminhamentos'],
            $tc,
            $pe,
            $aa,
            $ea,
            $rf,
            $_POST['inicio_estagio'],
            $_POST['fim_estagio'],
            $_POST['media_final'],
            $_POST['status'],
        );
    
        if (empty($id)) {
            $model->insert($vo);
        } else {
            $estagioVO = $model->selectOne(new EstagioVO($id));
            $tcAntigo = $estagioVO->getTermoCompromisso();
            $peAntigo = $estagioVO->getPlanoEstagio();
            $aaAntigo = $estagioVO->getAutoAvaliacao();
            $eaAntigo = $estagioVO->getEmpresaAvaliacao();
            $rfAntigo = $estagioVO->getRelatorioFinal();
            
            $tc ? unlink('uploads/'. $tcAntigo) : $vo->setTermoCompromisso($tcAntigo);
            $pe ? unlink('uploads/'. $peAntigo) : $vo->setPlanoEstagio($peAntigo);
            $pe ? unlink('uploads/'. $aaAntigo) : $vo->setAutoAvaliacao($aaAntigo);
            $pe ? unlink('uploads/'. $eaAntigo) : $vo->setEmpresaAvaliacao($eaAntigo);
            $pe ? unlink('uploads/'. $rfAntigo) : $vo->setRelatorioFinal($rfAntigo);

            $model->update($vo);
        }

        $this->redirect("estagios.php");
    }

    public function remove() {
        $model = new EstagioModel();
        $model->delete(new EstagioVO($_GET['id']));

        $this->redirect("estagios.php");
    }
    
}
