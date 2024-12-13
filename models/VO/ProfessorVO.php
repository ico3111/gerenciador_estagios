<?php

namespace Model\VO;

final class ProfessorVO extends VO {
    
    private $nome;
    private $siap;
    private $cpf;
    private $email;
    
    public function __construct($id = 0, $nome = "", $siap = "", $cpf = "", $email = ""){
        parent::__construct($id);
        $this->nome = $nome;
        $this->siap = $siap;
        $this->cpf = $cpf;
        $this->email = $email;
    }

    public function getNome(){ return $this->nome; }
    public function setNome($nome){ $this->nome = $nome; }

    public function getSiap(){ return $this->siap; }
    public function setSiap($siap){ $this->siap = $siap; }

    public function getCpf(){ return $this->cpf; }
    public function setCpf($cpf){ $this->cpf = $cpf; }

    public function getEmail(){ return $this->email; }
    public function setEmail($email){ $this->email = $email; }
    
}