<?php

namespace Model\VO;

final class EmpresaVO extends VO {
    
    private $num_convenio;
    private $nome_empresa;
    private $cidade_empresa;
    private $endereco_empresa;
    private $telefone_empresa;
    private $email_empresa;
    private $cnpj_empresa;
    private $nome_representante;
    private $funcao_representante;
    private $cpf_representante;
    private $rg_representante;

    public function __construct($id = 0, $num_convenio = "", $nome_empresa = "", $cidade_empresa = "", $endereco_empresa = "", $telefone_empresa = "", $email_empresa = "", $cnpj_empresa = "", $nome_representante = "", $funcao_representante = "", $cpf_representante = "", $rg_representante = ""){
        parent::__construct($id);
        $this->num_convenio = $num_convenio;
        $this->nome_empresa = $nome_empresa;
        $this->cidade_empresa = $cidade_empresa;
        $this->endereco_empresa = $endereco_empresa;
        $this->telefone_empresa = $telefone_empresa;
        $this->email_empresa = $email_empresa;
        $this->cnpj_empresa = $cnpj_empresa;
        $this->nome_representante = $nome_representante;
        $this->funcao_representante = $funcao_representante;
        $this->cpf_representante = $cpf_representante;
        $this->rg_representante = $rg_representante;
    }

    public function getNumConvenio(){
        return $this->num_convenio;
    }

    public function setNumConvenio($num_convenio){
        $this->num_convenio = $num_convenio;
    }

    public function getNomeEmpresa(){
        return $this->nome_empresa;
    }

    public function setNomeEmpresa($nome_empresa){
        $this->nome_empresa = $nome_empresa;
    }

    public function getCidadeEmpresa(){
        return $this->cidade_empresa;
    }

    public function setCidadeEmpresa($cidade_empresa){
        $this->cidade_empresa = $cidade_empresa;
    }

    public function getEnderecoEmpresa(){
        return $this->endereco_empresa;
    }

    public function setEnderecoEmpresa($endereco_empresa){
        $this->endereco_empresa = $endereco_empresa;
    }

    public function getTelefoneEmpresa(){
        return $this->telefone_empresa;
    }

    public function setTelefoneEmpresa($telefone_empresa){
        $this->telefone_empresa = $telefone_empresa;
    }

    public function getEmailEmpresa(){
        return $this->email_empresa;
    }

    public function setEmailEmpresa($email_empresa){
        $this->email_empresa = $email_empresa;
    }

    public function getCnpjEmpresa(){
        return $this->cnpj_empresa;
    }

    public function setCnpjEmpresa($cnpj_empresa){
        $this->cnpj_empresa = $cnpj_empresa;
    }

    public function getNomeRepresentante(){
        return $this->nome_representante;
    }

    public function setNomeRepresentante($nome_representante){
        $this->nome_representante = $nome_representante;
    }

    public function getFuncaoRepresentante(){
        return $this->funcao_representante;
    }

    public function setFuncaoRepresentante($funcao_representante){
        $this->funcao_representante = $funcao_representante;
    }

    public function getCpfRepresentante(){
        return $this->cpf_representante;
    }

    public function setCpfRepresentante($cpf_representante){
        $this->cpf_representante = $cpf_representante;
    }

    public function getRgRepresentante(){
        return $this->rg_representante;
    }

    public function setRgRepresentante($rg_representante){
        $this->rg_representante = $rg_representante;
    }
    
}