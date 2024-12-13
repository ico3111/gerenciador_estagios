<?php

namespace Model\VO;

final class UsuarioVO extends VO {
    
    private $login;
    private $senha;
    private $nivel;
    private $tipo_entidade;
    private $id_entidade;
    private $nome_entidade;
    private $email_entidade;
    
    public function __construct($id = 0, $login = "", $senha = "", $nivel = "", $tipo_entidade = "", $id_entidade = 0, $nome_entidade = "", $email_entidade = "") {
        parent::__construct($id);
        $this->login = $login;
        $this->senha = $senha;
        $this->nivel = $nivel;
        $this->tipo_entidade = $tipo_entidade;
        $this->id_entidade = $id_entidade;
        $this->nome_entidade = $nome_entidade;
        $this->email_entidade = $email_entidade;
    }

    public function getLogin() {
        return $this->login;
    }
    
    public function setLogin($login) {
        $this->login = $login;
    }
    
    public function getSenha() {
        return $this->senha;
    }
    
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    
    public function getNivel() {
        return $this->nivel;
    }
    
    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function getTipoEntidade() {
        return $this->tipo_entidade;
    }
    
    public function setTipoEntidade($tipo_entidade) {
        $this->tipo_entidade = $tipo_entidade;
    }
    
    public function getIdEntidade() {
        return $this->id_entidade;
    }
    
    public function setIdEntidade($id_entidade) {
        $this->id_entidade = $id_entidade;
    }

    public function getNomeEntidade() {
        return $this->nome_entidade;
    }
    
    public function setNomeEntidade($nome_entidade) {
        $this->nome_entidade = $nome_entidade;
    }

    public function getEmailEntidade() {
        return $this->email_entidade;
    }
    
    public function setEmailEntidade($email_entidade) {
        $this->email_entidade = $email_entidade;
    }
}
