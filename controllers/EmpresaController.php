<?php
namespace Controller;

use Model\EmpresaModel;
use Model\VO\EmpresaVO;
use Model\UsuarioModel;
use Model\VO\UsuarioVO;

final class EmpresaController extends Controller {

    public function list() {
        $model = new EmpresaModel();
        
        $busca = $_GET['busca'] ?? ''; 
        $buscaId = $_GET['buscaId'] ?? ''; 
        if (!empty($busca)) {
            $empresas = $model->buscar($busca, $_GET['campo'], $_GET['ordem']);
        } elseif (!empty($buscaId)) {
            $empresas = [$model->selectOne(new EmpresaVO($buscaId))];
        } else {
            $empresas = $model->selectAll(new EmpresaVO());
        }
    
        $this->loadView("listaEmpresas", [
            "empresas" => $empresas
        ]);
    }
    

    public function form() {
        $id = $_GET['id'] ?? 0;

        if (empty($id)) {
            $vo = new EmpresaVO();
        } else {
            $model = new EmpresaModel();
            $vo = $model->selectOne(new EmpresaVO($id));
        }
        
        $this->loadView("formEmpresa", [
            "empresa" => $vo
        ]);
    }

    public function save() {
        $id = $_POST['id'];
        if (isset($_POST['id_empresa'])) {$id = 0;}

        $model = new EmpresaModel();

        $vo = new EmpresaVO(
            $id,
            $_POST['num_convenio'],
            $_POST['nome_empresa'],
            $_POST['cidade_empresa'],
            $_POST['endereco_empresa'],
            $_POST['telefone_empresa'],
            $_POST['email_empresa'],
            $_POST['cnpj_empresa'],
            $_POST['nome_representante'],
            $_POST['funcao_representante'],
            $_POST['cpf_representante'],
            $_POST['rg_representante']
        );

        if (empty($id)) {
            $lastId = $model->insert($vo);
            $UsuarioModel = new UsuarioModel();

            $UsuarioModel->insert(new UsuarioVO('', $_POST['num_convenio'], substr($_POST['cnpj_empresa'], 0, 5), 1, 'Empresa', $lastId, $_POST['nome_empresa'], $_POST['email_empresa']));
        } else {
            $result = $model->update($vo);
        }

        if (isset($_POST['id_empresa'])) {return $lastId;}
        $this->redirect("empresas.php");
    }

    public function remove() {
        $model = new EmpresaModel();
        $model->delete(new EmpresaVO($_GET['id']));
        $this->redirect("empresas.php");
    }
}
