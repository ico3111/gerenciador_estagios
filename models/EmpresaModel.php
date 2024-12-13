<?php

namespace Model;

use Model\VO\EmpresaVO;
use Model\Database;

final class EmpresaModel extends Model {

    public function selectAll($vo){
        $db = new Database();
        $query = "SELECT * FROM empresas";
        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new EmpresaVO($row['id'], $row['num_convenio'], $row['nome_empresa'], $row['cidade_empresa'], $row['endereco_empresa'], $row['telefone_empresa'], $row['email_empresa'], $row['cnpj_empresa'], $row['nome_representante'], $row['funcao_representante'], $row['cpf_representante'], $row['rg_representante']);
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne($vo){
        $db = new Database();
        $query = "SELECT * FROM empresas WHERE id = :id";
        $binds = [':id' => $vo->getId()];

        $data = $db->select($query, $binds);

        return new EmpresaVO($data[0]['id'], $data[0]['num_convenio'], $data[0]['nome_empresa'], $data[0]['cidade_empresa'], $data[0]['endereco_empresa'], $data[0]['telefone_empresa'], $data[0]['email_empresa'], $data[0]['cnpj_empresa'], $data[0]['nome_representante'], $data[0]['funcao_representante'], $data[0]['cpf_representante'], $data[0]['rg_representante']);
    }

    public function insert($vo){
        $db = new Database();
        $query = "INSERT INTO empresas (num_convenio, nome_empresa, cidade_empresa, endereco_empresa, telefone_empresa, email_empresa, cnpj_empresa, nome_representante, funcao_representante, cpf_representante, rg_representante) VALUES (:num_convenio, :nome_empresa, :cidade_empresa, :endereco_empresa, :telefone_empresa, :email_empresa, :cnpj_empresa, :nome_representante, :funcao_representante, :cpf_representante, :rg_representante)";
        $binds = [
            ":num_convenio" => $vo->getNumConvenio(),
            ":nome_empresa" => $vo->getNomeEmpresa(),
            ":cidade_empresa" => $vo->getCidadeEmpresa(),
            ":endereco_empresa" => $vo->getEnderecoEmpresa(),
            ":telefone_empresa" => $vo->getTelefoneEmpresa(),
            ":email_empresa" => $vo->getEmailEmpresa(),
            ":cnpj_empresa" => $vo->getCnpjEmpresa(),
            ":nome_representante" => $vo->getNomeRepresentante(),
            ":funcao_representante" => $vo->getFuncaoRepresentante(),
            ":cpf_representante" => $vo->getCpfRepresentante(),
            ":rg_representante" => $vo->getRgRepresentante()
        ];

        $db->execute($query, $binds);
        return $db->getLastInsertedId();
    }

    public function update($vo){
        $db = new Database();
    
        $query = "UPDATE empresas SET num_convenio = :num_convenio, nome_empresa = :nome_empresa, cidade_empresa = :cidade_empresa, endereco_empresa = :endereco_empresa, telefone_empresa = :telefone_empresa, email_empresa = :email_empresa, cnpj_empresa = :cnpj_empresa, nome_representante = :nome_representante, funcao_representante = :funcao_representante, cpf_representante = :cpf_representante, rg_representante = :rg_representante WHERE id = :id";

        $binds = [
            ":id" => $vo->getId(),
            ":num_convenio" => $vo->getNumConvenio(),
            ":nome_empresa" => $vo->getNomeEmpresa(),
            ":cidade_empresa" => $vo->getCidadeEmpresa(),
            ":endereco_empresa" => $vo->getEnderecoEmpresa(),
            ":telefone_empresa" => $vo->getTelefoneEmpresa(),
            ":email_empresa" => $vo->getEmailEmpresa(),
            ":cnpj_empresa" => $vo->getCnpjEmpresa(),
            ":nome_representante" => $vo->getNomeRepresentante(),
            ":funcao_representante" => $vo->getFuncaoRepresentante(),
            ":cpf_representante" => $vo->getCpfRepresentante(),
            ":rg_representante" => $vo->getRgRepresentante()
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo){
        $db = new Database();
        $query = "DELETE FROM empresas WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }

    public function buscar($busca = '', $campo = '', $ordem = '') {
        $db = new Database();
      
        $allowedFields = ['num_convenio', 'nome_empresa', 'cidade_empresa', 'cnpj_empresa'];
        $allowedOrders = ['ASC', 'DESC'];

        $campo = in_array($campo, $allowedFields) ? $campo : 'nome_empresa';
        $ordem = in_array(strtoupper($ordem), $allowedOrders) ? strtoupper($ordem) : 'ASC';
      
        $query = "SELECT * FROM empresas WHERE $campo LIKE :busca ORDER BY $campo $ordem";
    
        $binds = [':busca' => '%' . $busca . '%'];

        $data = $db->select($query, $binds);
    
        $arrayList = [];
        foreach ($data as $row) {
            $vo = new EmpresaVO(
                $row['id'],
                $row['num_convenio'],
                $row['nome_empresa'],
                $row['cidade_empresa'],
                $row['endereco_empresa'],
                $row['telefone_empresa'],
                $row['email_empresa'],
                $row['cnpj_empresa'],
                $row['nome_representante'],
                $row['funcao_representante'],
                $row['cpf_representante'],
                $row['rg_representante']
            );
            $arrayList[] = $vo;
        }
    
        return $arrayList;
    }
    
}
