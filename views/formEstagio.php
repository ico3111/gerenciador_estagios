<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <title><?php echo $estagio->getIdEstudante() ? 'Alterar' : 'Cadastrar'; ?> Estagio</title>
</head>
<body>
    <?php include("includes/menu.php"); ?>
    <div class="container">
        <?php include("includes/sidebar.php"); ?>
        <div class="content">
            <header>
                <div>
                    <div class="caminho"><a href="home.php">Home</a> > <a href="empresas.php">Estagios</a> > <a href="#"><?php echo $estagio->getIdEstudante() ? 'Alterar' : 'Cadastrar'; ?> Estagio</a></div>
                    <h2><?php echo $estagio->getIdEstudante() ? 'Alterar' : 'Cadastrar'; ?> Estagio</h2>
                    <a href="empresas.php" class="btn">Voltar para Estagios</a>
                </div>
            </header>
            <hr>
            <main>
                <form action="estagioSalvar.php" enctype="multipart/form-data" method="POST" id="form-estagio"> 

                    <!--ESTUDANTES-->
                    <section>
                        <div type="button" class="div-select">
                            <label for="id_estudante">Estudante:</label> 
                            <select name="id_estudante" class="select-acordeao">
                                <option value="0">Adicionar Novo</option>
                                <?php foreach ($estudantes as $estudante): ?>
                                    <option value="<?php echo $estudante->getId(); ?>" <?php echo $estagio->getIdEstudante() === $estudante->getId() ? 'selected' : ''; ?>><?php echo $estudante->getNome(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="acordeao-conteudo-form">
                            <div class="form">        
                                <label for="nome_estudante">Nome:</label>
                                <input type="text" name="nome_estudante">
                                    
                                <label for="matricula_estudante">Matrícula:</label>
                                <input type="text" name="matricula_estudante">             
                            
                                <label for="cpf_estudante">CPF:</label>
                                <input type="text" name="cpf_estudante">
                            
                                <label for="rg_estudante">RG:</label>
                                <input type="text" name="rg_estudante">
                            
                                <label for="email_estudante">E-mail:</label>
                                <input type="email" name="email_estudante">
                                            
                                <label for="dataNasc_estudante">Data de Nascimento:</label>
                                <input type="date" name="dataNasc_estudante" value="<?php echo $estudante->getDataNasc(); ?>">
                                            
                                <label for="endereco_estudante">Endereço:</label>
                                <input type="text" name="endereco_estudante">
                                                
                                <label for="cidade_estudante">Cidade:</label>
                                <input type="text" list="lista-municipios" name="cidade_estudante">
                                <datalist id="lista-municipios"></datalist>
                            
                                <label for="telefone_estudante">Telefone:</label>
                                <input type="text" name="telefone_estudante">
                        
                                <label for="curso_estudante">Curso:</label>
                                <select name="curso_estudante">
                                    <option value="Administração">Administração</option>
                                    <option value="Agropecuária">Agropecuária</option>
                                    <option value="Informatica">Informática</option>
                                    <option value="Meio Ambiente">Meio Ambiente</option>
                                    <option value="Viticultura e Enologia">Viticultura e Enologia</option>
                                </select>

                                <label for="ano_letivo_estudante">Ano Letivo:</label>
                                <select name="ano_letivo_estudante">
                                    <option value="1" <?php echo $estudante->getAnoLetivo() === "1" ? 'selected' : ''; ?>>Primeiro</option>
                                    <option value="2" <?php echo $estudante->getAnoLetivo() === "2" ? 'selected' : ''; ?>>Segundo</option>
                                    <option value="3" <?php echo $estudante->getAnoLetivo() === "3" ? 'selected' : ''; ?>>Terceiro</option>
                                </select>
                            </div>
                        </div>
                    </section>

                    <!--EMPRESAS-->
                    <section>
                        <div class="div-select">
                            <label for="id_empresa">Empresa: </label>
                            <select name="id_empresa" class="select-acordeao">
                                <option value="0">Adicionar Novo</option>
                                <?php foreach ($empresas as $empresa): ?>
                                    <option value="<?php echo $empresa->getId(); ?>" <?php echo $estagio->getIdEmpresa() === $empresa->getId() ? 'selected' : ''; ?>><?php echo $empresa->getNomeEmpresa(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="acordeao-conteudo-form">
                            <div class="form">
                                <label for="nome_empresa">Nome da Empresa:</label>
                                <input type="text" name="nome_empresa">
                            
                                <label for="num_convenio">Número Convênio:</label>
                                <input type="text" name="num_convenio">
                        
                                <label for="cidade_empresa">Cidade:</label>
                                <input type="text" list="lista-municipios" name="cidade_empresa">
                                <datalist id="lista-municipios"></datalist>
                            
                                <label for="endereco_empresa">Endereço:</label>
                                <input type="text" name="endereco_empresa">
                            
                                <label for="telefone_empresa">Telefone:</label>
                                <input type="text" name="telefone_empresa">
                            
                                <label for="email_empresa">E-mail:</label>
                                <input type="email" name="email_empresa">
                                    
                                <label for="cnpj_empresa">CNPJ:</label>
                                <input type="text" name="cnpj_empresa">
                            
                                <label for="nome_representante">Nome do Representante:</label>
                                <input type="text" name="nome_representante">
                                        
                                <label for="funcao_representante">Função do Representante:</label>
                                <input type="text" name="funcao_representante">
                                        
                                <label for="cpf_representante">CPF do Representante:</label>
                                <input type="text" name="cpf_representante">
                                        
                                <label for="rg_representante">RG do Representante:</label>
                                <input type="text" name="rg_representante">
                            </div>
                        </div>
                    </section>

                    <!--PROF ORIENTADOR-->
                    <section>
                        <div class="div-select">
                            <label for="id_professor_orientador">Professor Orientador: </label>
                            <select name="id_professor_orientador"  class="select-acordeao">
                                <option value="0">Adicionar Novo</option>
                                <?php foreach ($professores as $professor): ?>
                                    <option value="<?php echo $professor->getId(); ?>" <?php echo $estagio->getIdProfessorOrientador() === $professor->getId() ? 'selected' : ''; ?>><?php echo $professor->getNome(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="acordeao-conteudo-form">
                            <div class="form">
                                <label for="nome_professor">Nome:</label>
                                <input type="text" name="nome_professor">
                        
                                <label for="siap_professor">SIAP:</label>
                                <input type="text" name="siap_professor">
                            
                                <label for="cpf_professor">CPF:</label>
                                <input type="text" name="cpf_professor">
                        
                                <label for="email_professor">E-mail:</label>
                                <input type="email" name="email_professor">
                            </div>
                        </div>
                    </section>
                        
                    <!--PROF COORIENTADOR - OPCIONAL-->
                    <section>
                        <div class="div-select">
                            <label for="id_professor_coorientador">Professor Coorientador: </label>
                            <select name="id_professor_coorientador" class="select-acordeao">
                                <option value="">Sem Professor Coorientador</option>
                                <option value="0">Adicionar Novo</option>
                                <?php foreach ($professores as $professor): ?>
                                    <option value="<?php echo $professor->getId(); ?>" <?php echo $estagio->getIdProfessorCoorientador() === $professor->getId() ? 'selected' : ''; ?>><?php echo $professor->getNome(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="acordeao-conteudo-form invisivel">
                            <div class="form">
                                <label for="nome_professor_coorientador">Nome:</label>
                                <input type="text" name="nome_professor_coorientador">
                        
                                <label for="siap_professor_coorientador">SIAP:</label>
                                <input type="text" name="siap_professor_coorientador">
                            
                                <label for="cpf_professor_coorientador">CPF:</label>
                                <input type="text" name="cpf_professor_coorientador">
                            
                                <label for="email_professor_coorientador">E-mail:</label>
                                <input type="email" name="email_professor_coorientador">
                            </div>
                        </div>      
                    </section>

                    <!--OUTROS-->
                    <section>
                        <div class="div-select">
                            <label for="">Outras Informações</label>
                        </div>  
                        <div class="acordeao-conteudo-form">
                            <div class="form">
                                <input type="hidden" name="id" value="<?php echo $estagio->getId(); ?>">
                        
                                <label for="nome_supervisor">Nome do Supervisor:</label>
                                <input type="text" name="nome_supervisor" value="<?php echo $estagio->getNomeSupervisor(); ?>" required>
                                    
                                <label for="cargo_supervisor">Cargo do Supervisor:</label>
                                <input type="text" name="cargo_supervisor" value="<?php echo $estagio->getCargoSupervisor(); ?>" required>
                                        
                                <label for="telefone_supervisor">Telefone do Supervisor:</label>
                                <input type="text" name="telefone_supervisor" value="<?php echo $estagio->getTelefoneSupervisor(); ?>" required>
                                        
                                <label for="email_supervisor">Email do Supervisor:</label>
                                <input type="email" name="email_supervisor" value="<?php echo $estagio->getEmailSupervisor(); ?>" required>
                                            
                                <label for="declara_banca">Declara Banca:</label>
                                <select name="declara_banca">
                                    <option value="Não" <?php echo htmlspecialchars($estagio->getDeclaraBanca()) === 'não' ? 'selected' : ''; ?>>Não</option>
                                    <option value="Sim" <?php echo htmlspecialchars($estagio->getDeclaraBanca()) === 'sim' ? 'selected' : ''; ?>>Sim</option>
                                </select>
                                        
                                <label for="tipo_processo">Tipo de Processo:</label>
                                <select name="tipo_processo">
                                    <option value="Digital" <?php echo htmlspecialchars($estagio->getTipoProcesso()) === 'Digital' ? 'selected' : ''; ?>>Digital</option>
                                    <option value="Físico" <?php echo htmlspecialchars($estagio->getDeclaraBanca()) === 'Físico' ? 'selected' : ''; ?>>Físico</option>
                                </select>
                                        
                                <label for="area_estagio">Área do Estágio:</label>
                                <input type="text" name="area_estagio" value="<?php echo $estagio->getAreaEstagio(); ?>" required>          
                            
                                <label for="encaminhamentos">Encaminhamentos:</label>
                                <textarea name="encaminhamentos" cols="30" rows="10"><?php echo $estagio->getEncaminhamentos(); ?></textarea>  

                                <label for="carga_horaria">Carga Horária:</label>
                                <input type="number" id="carga_horaria" name="carga_horaria" value="<?php echo $estagio->getCargaHoraria(); ?>" required>  
                            
                                <label for="inicio_estagio">Início do Estágio:</label>
                                <input type="date" id="inicio_estagio" name="inicio_estagio" value="<?php echo $estagio->getInicioEstagio(); ?>" required>
                                        
                                <label for="dias_semana">Dias por Semana: </label>
                                <input type="number" id="dias_semana" name="dias_por_semana">

                                <label for="ch_semanal">Carga Horária Semanal: </label>
                                <input type="number" id="ch_semanal" name="ch_semanal">

                                <label>Cálculo Fim Estágio</label>
                                <button type="button" class="btn" onClick="calculaFimEstagio();">Calcular</button>

                                <label for="fim_estagio">Fim do Estágio:</label>
                                <input type="date" id="fim_estagio" name="fim_estagio" value="<?php echo $estagio->getFimEstagio(); ?>" required>               
                            
                                <label for="termo_compromisso">Termo de Compromisso:</label>
                                <input type="file" name="termo_compromisso">
                                    
                                <label for="plano_estagio">Plano de Estágio:</label>
                                <input type="file" name="plano_estagio">

                                <label for="auto_avaliacao">Auto Avaliação:</label>
                                <input type="file" name="auto_avaliacao">

                                <label for="empresa_avaliacao">Empresa Avaliação: </label>
                                <input type="file" name="empresa_avaliacao">

                                <label for="relatorio_final">Relatório Final:</label>
                                <input type="file" name="relatorio_final">
                            
                                <label for="media_final">Média Final:</label>
                                <input type="text" name="media_final" value="<?php echo $estagio->getMediaFinal(); ?>">
                            
                                <label for="status">Status:</label>
                                <select name="status">
                                    <option value="Não iniciado">Não iniciado</option>
                                    <option value="Em andamento">Em andamento</option>
                                    <option value="Finalizado">Finalizado</option>
                                </select>
                            </div>
                        </div>
                    </section>
                    <button type="submit" class="btn"><?php echo $estagio->getIdEstudante() ? 'Alterar' : 'Cadastrar'; ?></button>
                </form>
            </main>
            <?php include('views/includes/footer.php'); ?>
        </div>
    </div>
    
    <script>
        function calculaFimEstagio() {
            const cargaHoraria = parseFloat(document.getElementById('carga_horaria').value);
            const inicioEstagio = new Date(document.getElementById('inicio_estagio').value);
            const diasPorSemana = parseFloat(document.getElementById('dias_semana').value);
            const chSemanal = parseFloat(document.getElementById('ch_semanal').value);
            const fimEstagio = document.getElementById('fim_estagio');

            if (isNaN(cargaHoraria) || isNaN(diasPorSemana) || isNaN(chSemanal) || inicioEstagio.toString() === 'Invalid Date' || fimEstagio.value != '') {
                return;
            }

            const chDiaria = chSemanal / diasPorSemana;
            const diasEstagio = Math.ceil(cargaHoraria / chDiaria);
            const dataFimEstagio = new Date(inicioEstagio);
            dataFimEstagio.setDate(dataFimEstagio.getDate() + diasEstagio);
            const dataFormatada = dataFimEstagio.toISOString().split('T')[0];

            fimEstagio.value = dataFormatada;
        }
    </script>
    <script>
        const selects = document.querySelectorAll('.select-acordeao');
        const conteudosForm = document.querySelectorAll('.acordeao-conteudo-form');

        selects.forEach((select, index) => {
            if (select.value === '0') {conteudosForm[index].classList.remove('invisivel');} 
            else {conteudosForm[index].classList.add('invisivel');} 
            select.addEventListener('change', () => {
                if (select.value === '0') {conteudosForm[index].classList.remove('invisivel');} 
                else {conteudosForm[index].classList.add('invisivel');} 
            });
        });
    </script>
    <script src="sidebar.js"></script>
    <script src="./carregaMunicipios.js"></script>
</body>
</html>