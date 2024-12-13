<?php

namespace Model;

use Model\VO\EstagioVO;
use Model\Database;

final class EstagioModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM estagios";
        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new EstagioVO(
                $row['id'], 
                $row['id_estudante'], 
                $row['id_empresa'], 
                $row['id_professor_orientador'], 
                $row['id_professor_coorientador'], 
                $row['nome_supervisor'], 
                $row['cargo_supervisor'], 
                $row['telefone_supervisor'], 
                $row['email_supervisor'], 
                $row['declara_banca'], 
                $row['tipo_processo'], 
                $row['area_estagio'], 
                $row['carga_horaria'], 
                $row['encaminhamentos'], 
                $row['termo_compromisso'], 
                $row['plano_estagio'], 
                $row['auto_avaliacao'],
                $row['empresa_avaliacao'],
                $row['relatorio_final'],
                $row['inicio_estagio'], 
                $row['fim_estagio'], 
                $row['media_final'], 
                $row['status'], 
            );
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM estagios WHERE id = :id";
        $binds = [':id' => $vo->getId()];

        $data = $db->select($query, $binds);

        $row = $data[0];
        return new EstagioVO(
            $row['id'], 
            $row['id_estudante'], 
            $row['id_empresa'], 
            $row['id_professor_orientador'], 
            $row['id_professor_coorientador'], 
            $row['nome_supervisor'], 
            $row['cargo_supervisor'], 
            $row['telefone_supervisor'], 
            $row['email_supervisor'], 
            $row['declara_banca'], 
            $row['tipo_processo'], 
            $row['area_estagio'], 
            $row['carga_horaria'], 
            $row['encaminhamentos'], 
            $row['termo_compromisso'], 
            $row['plano_estagio'], 
            $row['auto_avaliacao'],
            $row['empresa_avaliacao'],
            $row['relatorio_final'],
            $row['inicio_estagio'], 
            $row['fim_estagio'], 
            $row['media_final'], 
            $row['status'], 
        );
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO estagios (id_estudante, id_empresa, id_professor_orientador, id_professor_coorientador, nome_supervisor, cargo_supervisor, telefone_supervisor, email_supervisor, declara_banca, tipo_processo, area_estagio, carga_horaria, encaminhamentos, termo_compromisso, plano_estagio, auto_avaliacao, empresa_avaliacao, relatorio_final, inicio_estagio, fim_estagio, media_final, status) 
                  VALUES (:id_estudante, :id_empresa, :id_professor_orientador, :id_professor_coorientador, :nome_supervisor, :cargo_supervisor, :telefone_supervisor, :email_supervisor, :declara_banca, :tipo_processo, :area_estagio, :carga_horaria, :encaminhamentos, :termo_compromisso, :plano_estagio, :auto_avaliacao, :empresa_avaliacao, :relatorio_final, :inicio_estagio, :fim_estagio, :media_final, :status)";
        
        $binds = [
            ":id_estudante" => $vo->getIdEstudante(),
            ":id_empresa" => $vo->getIdEmpresa(),
            ":id_professor_orientador" => $vo->getIdProfessorOrientador(),
            ":id_professor_coorientador" => $vo->getIdProfessorCoorientador(),
            ":nome_supervisor" => $vo->getNomeSupervisor(),
            ":cargo_supervisor" => $vo->getCargoSupervisor(),
            ":telefone_supervisor" => $vo->getTelefoneSupervisor(),
            ":email_supervisor" => $vo->getEmailSupervisor(),
            ":declara_banca" => $vo->getDeclaraBanca(),
            ":tipo_processo" => $vo->getTipoProcesso(),
            ":area_estagio" => $vo->getAreaEstagio(),
            ":carga_horaria" => $vo->getCargaHoraria(),
            ":encaminhamentos" => $vo->getEncaminhamentos(),
            ":termo_compromisso" => $vo->getTermoCompromisso(),
            ":plano_estagio" => $vo->getPlanoEstagio(),
            ":auto_avaliacao" => $vo->getAutoAvaliacao(),
            ":empresa_avaliacao" => $vo->getEmpresaAvaliacao(),
            ":relatorio_final" => $vo->getRelatorioFinal(),
            ":inicio_estagio" => $vo->getInicioEstagio(),
            ":fim_estagio" => $vo->getFimEstagio(),
            ":media_final" => $vo->getMediaFinal(),
            ":status" => $vo->getStatus()
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();
        $query = "UPDATE estagios 
                  SET id_estudante = :id_estudante, 
                  id_empresa = :id_empresa, 
                  id_professor_orientador = :id_professor_orientador, 
                  id_professor_coorientador = :id_professor_coorientador, 
                  nome_supervisor = :nome_supervisor, 
                  cargo_supervisor = :cargo_supervisor, 
                  telefone_supervisor = :telefone_supervisor, 
                  email_supervisor = :email_supervisor, 
                  declara_banca = :declara_banca, 
                  tipo_processo = :tipo_processo, 
                  area_estagio = :area_estagio, 
                  carga_horaria = :carga_horaria, 
                  encaminhamentos = :encaminhamentos,  
                  termo_compromisso = :termo_compromisso, 
                  plano_estagio = :plano_estagio, 
                  auto_avaliacao = :auto_avaliacao, 
                  empresa_avaliacao = :empresa_avaliacao, 
                  relatorio_final = :relatorio_final,
                  inicio_estagio = :inicio_estagio, 
                  fim_estagio = :fim_estagio, 
                  media_final = :media_final, 
                  status = :status 
                  WHERE id = :id";
                  
        $binds = [
            ":id" => $vo->getId(),
            ":id_estudante" => $vo->getIdEstudante(),
            ":id_empresa" => $vo->getIdEmpresa(),
            ":id_professor_orientador" => $vo->getIdProfessorOrientador(),
            ":id_professor_coorientador" => $vo->getIdProfessorCoorientador(),
            ":nome_supervisor" => $vo->getNomeSupervisor(),
            ":cargo_supervisor" => $vo->getCargoSupervisor(),
            ":telefone_supervisor" => $vo->getTelefoneSupervisor(),
            ":email_supervisor" => $vo->getEmailSupervisor(),
            ":declara_banca" => $vo->getDeclaraBanca(),
            ":tipo_processo" => $vo->getTipoProcesso(),
            ":area_estagio" => $vo->getAreaEstagio(),
            ":carga_horaria" => $vo->getCargaHoraria(),
            ":encaminhamentos" => $vo->getEncaminhamentos(),
            ":termo_compromisso" => $vo->getTermoCompromisso(),
            ":plano_estagio" => $vo->getPlanoEstagio(),
            ":auto_avaliacao" => $vo->getAutoAvaliacao(),
            ":empresa_avaliacao" => $vo->getEmpresaAvaliacao(),
            ":relatorio_final" => $vo->getRelatorioFinal(),
            ":inicio_estagio" => $vo->getInicioEstagio(),
            ":fim_estagio" => $vo->getFimEstagio(),
            ":media_final" => $vo->getMediaFinal(),
            ":status" => $vo->getStatus()
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM estagios WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }

    public function buscar($busca, $campo, $ordem) {
        $db = new Database();

        $tipoEntidade = $_SESSION['usuario']->getTipoEntidade(); 
     
        $filtroEnvolvimento = '';
        switch ($tipoEntidade) {
            case "Professor":
                $filtroEnvolvimento = '(id_professor_orientador = :idUsuario OR id_professor_coorientador = :idUsuario)';
                break;
            case "Empresa":
                $filtroEnvolvimento = 'id_empresa = :idUsuario';
                break;
            case "Estudante":
                $filtroEnvolvimento = 'id_estudante = :idUsuario';
                break;
            case "Administrador":
                $filtroEnvolvimento = '';
                break;
            default:
                return 0;
        }
    
        $binds = [];
        if (!empty($filtroEnvolvimento)) {
            $binds[':idUsuario'] = $_SESSION['usuario']->getIdEntidade();
        }
    
        $camposValidos = ['cidade_empresa', 'estudante', 'empresa', 'professor_orientador', 'ano_letivo'];
        $ordensValidas = ['ASC', 'DESC'];
    
        $campo = in_array($campo, $camposValidos) ? $campo : 'nome_supervisor';
        $ordem = in_array($ordem, $ordensValidas) ? $ordem : 'ASC';
    
        $query = "SELECT estagios.*";

        if ($campo === 'estudante') {
            $query .= ", estudantes.nome AS estudante_nome";
        } elseif ($campo === 'empresa') {
            $query .= ", empresas.nome_empresa AS empresa_nome";
        } elseif ($campo === 'professor_orientador') {
            $query .= ", professores.nome AS professor_orientador_nome";
        } elseif ($campo === 'cidade_empresa') {
            $query .= ", empresas.cidade_empresa AS cidade_empresa";
        } elseif ($campo === 'ano_letivo') {
            $query .= ", estudantes.ano_letivo AS ano_letivo_estudante";
        }

        $query .= " FROM estagios";

        if ($campo === 'estudante' || $campo === 'ano_letivo') {
            $query .= " JOIN estudantes ON estagios.id_estudante = estudantes.id";
        } elseif ($campo === 'empresa' || $campo === 'cidade_empresa') {
            $query .= " JOIN empresas ON estagios.id_empresa = empresas.id";
        } elseif ($campo === 'professor_orientador') {
            $query .= " JOIN professores ON estagios.id_professor_orientador = professores.id";
        }

        $conditions = [];
        if (!empty($filtroEnvolvimento)) {
            $conditions[] = $filtroEnvolvimento;
        }

        if (!empty($busca)) {
            if ($campo === 'estudante') {
                $conditions[] = "estudantes.nome LIKE :busca";
            } elseif ($campo === 'empresa') {
                $conditions[] = "empresas.nome_empresa LIKE :busca";
            } elseif ($campo === 'cidade_empresa') {
                $conditions[] = "empresas.cidade_empresa LIKE :busca";
            } elseif ($campo === 'professor_orientador') {
                $conditions[] = "professores.nome LIKE :busca";
            } elseif ($campo === 'ano_letivo') {
                $conditions[] = "estudantes.ano_letivo LIKE :busca";
            } else {
                $conditions[] = "$campo LIKE :busca";
            }
            $binds[':busca'] = '%' . $busca . '%';
        }

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        if ($campo === 'estudante') {
            $query .= " ORDER BY estudante_nome $ordem";
        } elseif ($campo === 'empresa') {
            $query .= " ORDER BY empresa_nome $ordem";
        } elseif ($campo === 'professor_orientador') {
            $query .= " ORDER BY professor_orientador_nome $ordem";
        } elseif ($campo === 'cidade_empresa') {
            $query .= " ORDER BY cidade_empresa $ordem";
        } elseif ($campo === 'ano_letivo') {
            $query .= " ORDER BY ano_letivo_estudante $ordem";
        }

        $data = $db->select($query, $binds);

    
        $arrayList = [];
        foreach ($data as $row) {
            $vo = new EstagioVO(
                $row['id'], 
                $row['id_estudante'], 
                $row['id_empresa'], 
                $row['id_professor_orientador'], 
                $row['id_professor_coorientador'], 
                $row['nome_supervisor'], 
                $row['cargo_supervisor'], 
                $row['telefone_supervisor'], 
                $row['email_supervisor'], 
                $row['declara_banca'], 
                $row['tipo_processo'], 
                $row['area_estagio'], 
                $row['carga_horaria'], 
                $row['encaminhamentos'], 
                $row['termo_compromisso'], 
                $row['plano_estagio'], 
                $row['auto_avaliacao'],
                $row['empresa_avaliacao'],
                $row['relatorio_final'],
                $row['inicio_estagio'], 
                $row['fim_estagio'], 
                $row['media_final'], 
                $row['status']
            );
            $arrayList[] = $vo;
        }
    
        return $arrayList;
    }
    
    
}
