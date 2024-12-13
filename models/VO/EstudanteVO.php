<?php

namespace Model\VO;

final class EstudanteVO extends VO {
    
    private $nome;
    private $matricula;
    private $cpf;
    private $rg;
    private $email;
    private $dataNasc;
    private $endereco;
    private $cidade;
    private $telefone;
    private $curso;
    private $anoLetivo;
    
    public function __construct($id = 0, $nome = "", $matricula = "", $cpf = "", $rg = "", $email = "", $dataNasc = "", $endereco = "", $cidade = "", $telefone = "", $curso = "", $anoLetivo = "1"){
        parent::__construct($id);
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->email = $email;
        $this->dataNasc = $dataNasc;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->telefone = $telefone;
        $this->curso = $curso;
        $this->anoLetivo = $anoLetivo;
    }

    public function getNome(){ return $this->nome; }
    public function setNome($nome){ $this->nome = $nome; }

    public function getMatricula(){ return $this->matricula; }
    public function setMatricula($matricula){ $this->matricula = $matricula; }

    public function getCpf(){ return $this->cpf; }
    public function setCpf($cpf){ $this->cpf = $cpf; }

    public function getRg(){ return $this->rg; }
    public function setRg($rg){ $this->rg = $rg; }

    public function getEmail(){ return $this->email; }
    public function setEmail($email){ $this->email = $email; }

    public function getDataNasc(){ return $this->dataNasc; }
    public function setDataNasc($dataNasc){ $this->dataNasc = $dataNasc; }

    public function getEndereco(){ return $this->endereco; }
    public function setEndereco($endereco){ $this->endereco = $endereco; }

    public function getCidade(){ return $this->cidade; }
    public function setCidade($cidade){ $this->cidade = $cidade; }

    public function getTelefone(){ return $this->telefone; }
    public function setTelefone($telefone){ $this->telefone = $telefone; }

    public function getCurso(){ return $this->curso; }
    public function setCurso($curso){ $this->curso = $curso; }

    public function getAnoLetivo(){ return $this->anoLetivo; }
    public function setAnoLetivo($anoLetivo){ $this->anoLetivo = $anoLetivo; }
}