<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <title>Estágios</title>
</head>
<body>
    <?php $isNivel2 = $_SESSION['usuario']->getNivel() === '2'; ?>
    <?php include('./views/includes/menu.php'); ?>
    <div class="container">
        <?php include('./views/includes/sidebar.php'); ?>
        <div class="content">
            <header>
                <div>
                    <div class="caminho"><a href="home.php">Home</a> > <a href="estagios.php">Estagios</a></div>
                    <h2>Estágios</h2>
                    <form action="estagios.php" method="get">
                        <input type="text" name="busca">
                        <select name="campo" class="btn">
                            <option value="estudante">Nome Estudante</option>
                            <option value="empresa">Nome Empresa</option>
                            <option value="professor_orientador">Nome Professor Orientador</option>
                            <option value="cidade_empresa">Cidade</option>
                            <option value="ano_letivo">Ano Letivo</option>
                        </select>
                        <select name="ordem" class="btn">
                            <option value="ASC">Crescente</option>
                            <option value="DESC">Decrescente</option>
                        </select>
                        <button type="submit" class="btn">Buscar</button>
                    </form>
                </div>
                <?php if ($isNivel2): ?>
                    <a href="estagio.php" class="btn">Adicionar Estágio</a>
                <?php endif; ?>
            </header>
            <hr>
            <main>
                <div class="zoom-btns">
                    <button type="button" id="zoomzar" class="btn">Zoom +</button>
                    <button type="button" id="deszoomzar" class="btn">Zoom -</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Estudante</th>
                            <th>Curso</th>
                            <th>Ano Letivo</th>
                            <th>Empresa</th>
                            <th>Cidade da Empresa</th>
                            <th>Professor Orientador</th>
                            <th>Professor Coorientador</th>
                            <th>Nome do Supervisor</th>
                            <th>Encaminhamentos</th>
                            <th>Período de Estágio</th> 
                            <th>Termo de Compromisso</th>
                            <th>Plano de Estágio</th>
                            <th>Auto Avaliação</th>
                            <th>Empresa Avaliação</th>
                            <th>Relatorio Final</th>
                            <th>Cargo do Supervisor</th>
                            <th>Telefone do Supervisor</th> 
                            <th>Email do Supervisor</th>
                            <th>Declaração de Banca</th>
                            <th>Tipo de Processo</th>
                            <th>Área de Estágio</th>
                            <th>Carga Horária</th>
                            <th>Média Final</th>
                            <th>Status</th>
                            <?php if ($isNivel2): ?>
                                <th>Ações</th> 
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($estagios as $estagio): ?>
                        <tr>
                            <td>
                                <?php if ($isNivel2): ?> <a href="estudantes.php?buscaId=<?php echo $estagio->getIdEstudante(); ?>"> <?php endif; ?>
                                    <?php echo htmlspecialchars($estagio->getEstudante()); ?>
                                <?php if ($isNivel2): ?> </a> <?php endif; ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($estagio->getCursoEstudante()); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($estagio->getAnoLetivoEstudante()); ?>
                            </td>
                            <td>
                                <?php if ($isNivel2): ?> <a href="empresas.php?buscaId=<?php echo $estagio->getIdEmpresa(); ?>"> <?php endif; ?>
                                    <?php echo htmlspecialchars($estagio->getEmpresa()); ?>
                                <?php if ($isNivel2): ?> </a> <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($estagio->getCidadeEmpresa()); ?></td>
                            <td>
                                <?php if ($isNivel2): ?> <a href="professores.php?buscaId=<?php echo $estagio->getIdProfessorOrientador(); ?>"> <?php endif; ?>
                                    <?php echo htmlspecialchars($estagio->getProfessorOrientador()); ?>
                                <?php if ($isNivel2): ?> </a> <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($isNivel2): ?> <a href="professores.php?buscaId=<?php echo $estagio->getIdProfessorCoorientador(); ?>"> <?php endif; ?>
                                    <?php echo htmlspecialchars($estagio->getProfessorCoorientador()); ?>
                                <?php if ($isNivel2): ?> </a> <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($estagio->getNomeSupervisor()); ?></td>
                            <td>
                                <textarea cols="20" rows="5" readonly><?php echo htmlspecialchars($estagio->getEncaminhamentos()); ?></textarea>
                            </td>
                            <td><?php echo htmlspecialchars($estagio->getInicioEstagio()). ' à '. htmlspecialchars($estagio->getFimEstagio()); ?></td>
                            <td>
                                <a href="uploads/<?php echo htmlspecialchars($estagio->getTermoCompromisso()); ?>" download="<?php echo htmlspecialchars($estagio->getEstudante()) . '-TC.pdf'; ?>" target="_blank">Termo de Compromisso</a>
                            </td>
                            <td>
                                <a href="uploads/<?php echo htmlspecialchars($estagio->getPlanoEstagio()); ?>" download="<?php echo htmlspecialchars($estagio->getEstudante()) . '-PE.pdf'; ?>" target="_blank">Plano de Estágio</a>
                            </td>
                            <td>
                                <a href="uploads/<?php echo htmlspecialchars($estagio->getAutoAvaliacao()); ?>" download="<?php echo htmlspecialchars($estagio->getEstudante()) . '-AA.pdf'; ?>" target="_blank">Auto Avaliação</a>
                            </td>
                            <td>
                                <a href="uploads/<?php echo htmlspecialchars($estagio->getEmpresaAvaliacao()); ?>" download="<?php echo htmlspecialchars($estagio->getEstudante()) . '-EA.pdf'; ?>" target="_blank">Empresa Avaliação</a>
                            </td>
                            <td>
                                <a href="uploads/<?php echo htmlspecialchars($estagio->getRelatorioFinal()); ?>" download="<?php echo htmlspecialchars($estagio->getEstudante()) . '-RF.pdf'; ?>" target="_blank">Relatorio Final</a>
                            </td>
                            <td><?php echo htmlspecialchars($estagio->getCargoSupervisor()); ?></td>
                            <td><?php echo htmlspecialchars($estagio->getTelefoneSupervisor()); ?></td>
                            <td><?php echo htmlspecialchars($estagio->getEmailSupervisor()); ?></td>
                            <td><?php echo htmlspecialchars($estagio->getDeclaraBanca()); ?></td>
                            <td><?php echo htmlspecialchars($estagio->getTipoProcesso()); ?></td>
                            <td><?php echo htmlspecialchars($estagio->getAreaEstagio()); ?></td>
                            <td><?php echo htmlspecialchars($estagio->getCargaHoraria()); ?> horas</td>
                            <td><?php echo htmlspecialchars($estagio->getMediaFinal()); ?></td>
                            <td><?php echo htmlspecialchars($estagio->getStatus()); ?></td>
                            <?php if ($isNivel2): ?>  
                                <td>
                                    <a href="estagio.php?id=<?php echo $estagio->getId(); ?>"><i class="fa-solid fa-pencil" style="color: #FFD43B;"></i></a>
                                    |
                                    <a href="estagioDeletar.php?id=<?php echo $estagio->getId(); ?>"><i class="fa-solid fa-trash" style="color: #f00;"></i></a>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </main>
            <?php include('views/includes/footer.php'); ?>
        </div>
    </div>

    <script src="./zoom.js"></script>
    <script src="./sidebar.js"></script>
</body>
</html>
