<?php

namespace Model;

use Model\VO\UsuarioVO;
use Model\Database;

final class UsuarioModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM usuarios";
        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new UsuarioVO(
                $row['id'], 
                $row['login'], 
                $row['senha'], 
                $row['nivel'], 
                $row['tipo_entidade'], 
                $row['id_entidade'], 
                $row['nome_entidade'], 
                $row['email_entidade']
            );
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM usuarios WHERE id = :id";
        $binds = [':id' => $vo->getId()];

        $data = $db->select($query, $binds);

        return new UsuarioVO(
            $data[0]['id'], 
            $data[0]['login'], 
            $data[0]['senha'], 
            $data[0]['nivel'], 
            $data[0]['tipo_entidade'], 
            $data[0]['id_entidade'], 
            $data[0]['nome_entidade'], 
            $data[0]['email_entidade']
        );
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO usuarios (login, senha, nivel, tipo_entidade, id_entidade, nome_entidade, email_entidade) 
                  VALUES (:login, :senha, :nivel, :tipo_entidade, :id_entidade, :nome_entidade, :email_entidade)";
        $binds = [
            ":login" => $vo->getLogin(),
            ":senha" => md5($vo->getSenha()),
            ":nivel" => $vo->getNivel(),
            ":tipo_entidade" => $vo->getTipoEntidade(),
            ":id_entidade" => $vo->getIdEntidade(),
            ":nome_entidade" => $vo->getNomeEntidade(),
            ":email_entidade" => $vo->getEmailEntidade()
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();
        if (empty($vo->getSenha())) {
            $query = "UPDATE usuarios SET 
                        login = :login, 
                        nivel = :nivel, 
                        tipo_entidade = :tipo_entidade, 
                        id_entidade = :id_entidade, 
                        nome_entidade = :nome_entidade, 
                        email_entidade = :email_entidade 
                      WHERE id = :id";
            $binds = [
                ":login" => $vo->getLogin(),
                ":nivel" => $vo->getNivel(),
                ":tipo_entidade" => $vo->getTipoEntidade(),
                ":id_entidade" => $vo->getIdEntidade(),
                ":nome_entidade" => $vo->getNomeEntidade(),
                ":email_entidade" => $vo->getEmailEntidade(),
                ":id" => $vo->getId()
            ];
        } else {
            $query = "UPDATE usuarios SET 
                      login = :login, 
                      senha = :senha, 
                      nivel = :nivel, 
                      tipo_entidade = :tipo_entidade, 
                      id_entidade = :id_entidade, 
                      nome_entidade = :nome_entidade, 
                      email_entidade = :email_entidade 
                      WHERE id = :id";

            $binds = [
                ":login" => $vo->getLogin(),
                ":senha" => md5($vo->getSenha()),
                ":nivel" => $vo->getNivel(),
                ":tipo_entidade" => $vo->getTipoEntidade(),
                ":id_entidade" => $vo->getIdEntidade(),
                ":nome_entidade" => $vo->getNomeEntidade(),
                ":email_entidade" => $vo->getEmailEntidade(),
                ":id" => $vo->getId()
            ];
        }

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM usuarios WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }

    public function doLogin($vo) {
        $db = new Database();
        $query = "SELECT * FROM usuarios WHERE login = :login AND senha = :senha";
        $binds = [":login" => $vo->getLogin()];
        $binds[":senha"] = isset($_SESSION['usuario']) ? $vo->getSenha() : md5($vo->getSenha());

        $data = $db->select($query, $binds);

        if (count($data) == 0) {
            return null;
        }

        $_SESSION['usuario'] = new UsuarioVO(
            $data[0]['id'],
            $data[0]['login'],
            $data[0]['senha'],
            $data[0]['nivel'],
            $data[0]['tipo_entidade'],
            $data[0]['id_entidade'],
            $data[0]['nome_entidade'],
            $data[0]['email_entidade']
        );

        return $_SESSION['usuario'];
    }

}
