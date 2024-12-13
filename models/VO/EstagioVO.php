<?php

namespace Model\VO;

final class EstagioVO extends VO {

    private $id_estudante;
    private $id_empresa;
    private $id_professor_orientador;
    private $id_professor_coorientador;
    private $nome_supervisor;
    private $cargo_supervisor;
    private $telefone_supervisor;
    private $email_supervisor;
    private $declara_banca;
    private $tipo_processo;
    private $area_estagio;
    private $carga_horaria;
    private $encaminhamentos;
    private $termo_compromisso;
    private $plano_estagio;
    private $auto_avaliacao;
    private $empresa_avaliacao;
    private $relatorio_final;
    private $inicio_estagio;
    private $fim_estagio;
    private $media_final;
    private $status;
    private $estudante;
    private $empresa;
    private $professor_orientador;
    private $professor_coorientador;
    private $cidade_empresa;
    private $curso_estudante;
    private $ano_letivo_estudante;

    public function __construct(
        $id = 0, 
        $id_estudante = 0, 
        $id_empresa = 0, 
        $id_professor_orientador = 0, 
        $id_professor_coorientador = 0, 
        $nome_supervisor = "", 
        $cargo_supervisor = "", 
        $telefone_supervisor = "", 
        $email_supervisor = "", 
        $declara_banca = false, 
        $tipo_processo = 'digital', 
        $area_estagio = "", 
        $carga_horaria = 0, 
        $encaminhamentos = "", 
        $termo_compromisso = "", 
        $plano_estagio = "", 
        $auto_avaliacao = "",
        $empresa_avaliacao = "",
        $relatorio_final = "",
        $inicio_estagio = null, 
        $fim_estagio = null, 
        $media_final = 0,
        $status = "",
        $estudante = null, 
        $empresa = null, 
        $professor_orientador = null, 
        $professor_coorientador = null,
        $cidade_empresa = "",
        $curso_estudante = "",
        $ano_letivo_estudante = ""
    ) {
        parent::__construct($id);
        $this->id_estudante = $id_estudante;
        $this->id_empresa = $id_empresa;
        $this->id_professor_orientador = $id_professor_orientador;
        $this->id_professor_coorientador = $id_professor_coorientador;
        $this->nome_supervisor = $nome_supervisor;
        $this->cargo_supervisor = $cargo_supervisor;
        $this->telefone_supervisor = $telefone_supervisor;
        $this->email_supervisor = $email_supervisor;
        $this->declara_banca = $declara_banca;
        $this->tipo_processo = $tipo_processo;
        $this->area_estagio = $area_estagio;
        $this->carga_horaria = $carga_horaria;
        $this->encaminhamentos = $encaminhamentos;
        $this->termo_compromisso = $termo_compromisso;
        $this->plano_estagio = $plano_estagio;
        $this->auto_avaliacao = $auto_avaliacao;
        $this->empresa_avaliacao = $empresa_avaliacao;
        $this->relatorio_final = $relatorio_final;
        $this->media_final = $media_final;
        $this->status = $status;
        $this->inicio_estagio = $inicio_estagio;
        $this->fim_estagio = $fim_estagio;
        $this->estudante = $estudante;
        $this->empresa = $empresa;
        $this->professor_orientador = $professor_orientador;
        $this->professor_coorientador = $professor_coorientador;
        $this->cidade_empresa = $cidade_empresa;
        $this->curso_estudante = $curso_estudante;
        $this->ano_letivo_estudante = $ano_letivo_estudante;
    }

    public function getIdEstudante() { return $this->id_estudante; }
    public function setIdEstudante($id_estudante) { $this->id_estudante = $id_estudante; }

    public function getIdEmpresa() { return $this->id_empresa; }
    public function setIdEmpresa($id_empresa) { $this->id_empresa = $id_empresa; }

    public function getIdProfessorOrientador() { return $this->id_professor_orientador; }
    public function setIdProfessorOrientador($id_professor_orientador) { $this->id_professor_orientador = $id_professor_orientador; }

    public function getIdProfessorCoorientador() { return $this->id_professor_coorientador; }
    public function setIdProfessorCoorientador($id_professor_coorientador) { $this->id_professor_coorientador = $id_professor_coorientador; }

    public function getNomeSupervisor() { return $this->nome_supervisor; }
    public function setNomeSupervisor($nome_supervisor) { $this->nome_supervisor = $nome_supervisor; }

    public function getCargoSupervisor() { return $this->cargo_supervisor; }
    public function setCargoSupervisor($cargo_supervisor) { $this->cargo_supervisor = $cargo_supervisor; }

    public function getTelefoneSupervisor() { return $this->telefone_supervisor; }
    public function setTelefoneSupervisor($telefone_supervisor) { $this->telefone_supervisor = $telefone_supervisor; }

    public function getEmailSupervisor() { return $this->email_supervisor; }
    public function setEmailSupervisor($email_supervisor) { $this->email_supervisor = $email_supervisor; }

    public function getDeclaraBanca() { return $this->declara_banca; }
    public function setDeclaraBanca($declara_banca) { $this->declara_banca = $declara_banca; }

    public function getTipoProcesso() { return $this->tipo_processo; }
    public function setTipoProcesso($tipo_processo) { $this->tipo_processo = $tipo_processo; }

    public function getAreaEstagio() { return $this->area_estagio; }
    public function setAreaEstagio($area_estagio) { $this->area_estagio = $area_estagio; }

    public function getCargaHoraria() { return $this->carga_horaria; }
    public function setCargaHoraria($carga_horaria) { $this->carga_horaria = $carga_horaria; }

    public function getEncaminhamentos() { return $this->encaminhamentos; }
    public function setEncaminhamentos($encaminhamentos) { $this->encaminhamentos = $encaminhamentos; }

    public function getInicioEstagio() { return $this->inicio_estagio; }
    public function setInicioEstagio($inicio_estagio) { $this->inicio_estagio = $inicio_estagio; }

    public function getFimEstagio() { return $this->fim_estagio; }
    public function setFimEstagio($fim_estagio) { $this->fim_estagio = $fim_estagio; }

    public function getTermoCompromisso() { return $this->termo_compromisso; }
    public function setTermoCompromisso($termo_compromisso) { $this->termo_compromisso = $termo_compromisso; }
    
    public function getPlanoEstagio() { return $this->plano_estagio; }
    public function setPlanoEstagio($plano_estagio) { $this->plano_estagio = $plano_estagio; }

    public function getAutoAvaliacao() { return $this->auto_avaliacao; }
    public function setAutoAvaliacao($auto_avaliacao) { $this->auto_avaliacao = $auto_avaliacao; }

    public function getEmpresaAvaliacao() { return $this->empresa_avaliacao; }
    public function setEmpresaAvaliacao($empresa_avaliacao) { $this->empresa_avaliacao = $empresa_avaliacao; }
    
    public function getRelatorioFinal() { return $this->relatorio_final; }
    public function setRelatorioFinal($relatorio_final) { $this->relatorio_final = $relatorio_final; }
    
    public function getMediaFinal() { return $this->media_final; }
    public function setMediaFinal($media_final) { $this->media_final = $media_final; }

    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }
    
    public function getEstudante() { return $this->estudante; }
    public function setEstudante($estudante) { $this->estudante = $estudante; }

    public function getEmpresa() { return $this->empresa; }
    public function setEmpresa($empresa) { $this->empresa = $empresa; }

    public function getProfessorOrientador() { return $this->professor_orientador; }
    public function setProfessorOrientador($professor_orientador) { $this->professor_orientador = $professor_orientador; }

    public function getProfessorCoorientador() { return $this->professor_coorientador; }
    public function setProfessorCoorientador($professor_coorientador) { $this->professor_coorientador = $professor_coorientador; }

    public function getCidadeEmpresa() { return $this->cidade_empresa; }
    public function setCidadeEmpresa($cidade_empresa) { $this->cidade_empresa = $cidade_empresa; }

    public function getCursoEstudante() { return $this->curso_estudante; }
    public function setCursoEstudante($curso_estudante) { $this->curso_estudante = $curso_estudante; }

    public function getAnoLetivoEstudante() { return $this->ano_letivo_estudante; }
    public function setAnoLetivoEstudante($ano_letivo_estudante) { $this->ano_letivo_estudante = $ano_letivo_estudante; }
}
