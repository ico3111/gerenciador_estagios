<?php

namespace Model;

use Model\VO\EstudanteVO;
use Model\Database;

final class EstudanteModel extends Model {

    public function selectAll($vo){
        $db = new Database();
        $query = "SELECT * FROM estudantes";
        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new EstudanteVO(
                $row['id'],
                $row['nome'],
                $row['matricula'],
                $row['cpf'],
                $row['rg'],
                $row['email'],
                $row['dataNasc'],
                $row['endereco'],
                $row['cidade'],
                $row['telefone'],
                $row['curso'],
                $row['ano_letivo']
            );
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne($vo){
        $db = new Database();
        $query = "SELECT * FROM estudantes WHERE id = :id";
        $binds = [':id' => $vo->getId()];

        $data = $db->select($query, $binds);

        return new EstudanteVO(
            $data[0]['id'],
            $data[0]['nome'],
            $data[0]['matricula'],
            $data[0]['cpf'],
            $data[0]['rg'],
            $data[0]['email'],
            $data[0]['dataNasc'],
            $data[0]['endereco'],
            $data[0]['cidade'],
            $data[0]['telefone'],
            $data[0]['curso'],
            $data[0]['ano_letivo']
        );
    }

    public function insert($vo){
        $db = new Database();
        $query = "INSERT INTO estudantes (nome, matricula, cpf, rg, email, dataNasc, endereco, cidade, telefone, curso, ano_letivo) 
                  VALUES (:nome, :matricula, :cpf, :rg, :email, :dataNasc, :endereco, :cidade, :telefone, :curso, :ano_letivo)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":matricula" => $vo->getMatricula(),
            ":cpf" => $vo->getCpf(),
            ":rg" => $vo->getRg(),
            ":email" => $vo->getEmail(),
            ":dataNasc" => $vo->getDataNasc(),
            ":endereco" => $vo->getEndereco(),
            ":cidade" => $vo->getCidade(),
            ":telefone" => $vo->getTelefone(),
            ":curso" => $vo->getCurso(),
            ":ano_letivo" => $vo->getAnoLetivo(),
        ];

        $db->execute($query, $binds);
        return $db->getLastInsertedId();
    }

    public function update($vo){
        $db = new Database();
        $query = "UPDATE estudantes SET 
                    nome = :nome, 
                    matricula = :matricula, 
                    cpf = :cpf, 
                    rg = :rg, 
                    email = :email, 
                    dataNasc = :dataNasc,
                    endereco = :endereco, 
                    cidade = :cidade, 
                    telefone = :telefone, 
                    curso = :curso,
                    ano_letivo = :ano_letivo
                WHERE id = :id";

        $binds = [
            ":id" => $vo->getId(),
            ":nome" => $vo->getNome(),
            ":matricula" => $vo->getMatricula(),
            ":cpf" => $vo->getCpf(),
            ":rg" => $vo->getRg(),
            ":email" => $vo->getEmail(),
            ":dataNasc" => $vo->getDataNasc(),
            ":endereco" => $vo->getEndereco(),
            ":cidade" => $vo->getCidade(),
            ":telefone" => $vo->getTelefone(),
            ":curso" => $vo->getCurso(),
            ":ano_letivo" => $vo->getAnoLetivo(),
        ];
      
        return $db->execute($query, $binds);
    }

    public function delete($vo){
        $db = new Database();
        $query = "DELETE FROM estudantes WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }

    public function buscar($busca = '', $campo = '', $ordem = '') {
        $db = new Database();

        $query = "SELECT * FROM estudantes WHERE $campo LIKE :$campo ORDER BY $campo $ordem";
        $binds = [":$campo" => '%' . $busca . '%'];
        $data = $db->select($query, $binds);
        
        $arrayList = [];
        foreach ($data as $row) {
            $vo = new EstudanteVO(
                $row['id'],
                $row['nome'],
                $row['matricula'],
                $row['cpf'],
                $row['rg'],
                $row['email'],
                $row['dataNasc'],
                $row['endereco'],
                $row['cidade'],
                $row['telefone'],
                $row['curso'],
                $row['ano_letivo']
            );
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }
}
