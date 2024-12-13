<?php

namespace Model;

use Model\VO\ProfessorVO;
use Model\Database;

final class ProfessorModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM professores";
        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new ProfessorVO(
                $row['id'],
                $row['nome'],
                $row['siap'],
                $row['cpf'],
                $row['email']
            );
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM professores WHERE id = :id";
        $binds = [':id' => $vo->getId()];

        $data = $db->select($query, $binds);

        return new ProfessorVO(
            $data[0]['id'],
            $data[0]['nome'],
            $data[0]['siap'],
            $data[0]['cpf'],
            $data[0]['email']
        );
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO professores (nome, siap, cpf, email) VALUES (:nome, :siap, :cpf, :email)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":siap" => $vo->getSiap(),
            ":cpf" => $vo->getCpf(),
            ":email" => $vo->getEmail()
        ];
        
        $db->execute($query, $binds);
        return $db->getLastInsertedId();
    }

    public function update($vo) {
        $db = new Database();
        $query = "UPDATE professores SET nome = :nome, siap = :siap, cpf = :cpf, email = :email WHERE id = :id";
        
        $binds = [
            ":id" => $vo->getId(),
            ":nome" => $vo->getNome(),
            ":siap" => $vo->getSiap(),
            ":cpf" => $vo->getCpf(),
            ":email" => $vo->getEmail()
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM professores WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }

    public function buscar($busca = '', $campo = '', $ordem = '') {
        $db = new Database();

        $query = "SELECT * FROM professores WHERE $campo LIKE :$campo ORDER BY $campo $ordem";
        $binds = [":$campo" => '%' . $busca . '%'];
        $data = $db->select($query, $binds);
        
        $arrayList = [];
        foreach ($data as $row) {
            $vo = new ProfessorVO(
                $row['id'],
                $row['nome'],
                $row['siap'],
                $row['cpf'],
                $row['email']
            );
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

}
