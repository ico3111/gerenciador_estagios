<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <title>Empresas</title>
</head>
<body>
    <?php $isNivel2 = $_SESSION['usuario']->getNivel() === '2'; ?>
    <?php include('./views/includes/menu.php'); ?>
    <div class="container">
        <?php include('./views/includes/sidebar.php'); ?>
        <div class="content">
            <header>
                <div>
                    <div class="caminho"><a href="home.php">Home</a> > <a href="empresas.php">Empresas</a></div>
                    <h2>Empresas</h2>
                    <form action="empresas.php" method="get">
                        <input type="text" name="busca">
                        <select name="campo" class="btn">
                            <option value="nome_empresa">Nome da Empresa</option>
                            <option value="cnpj_empresa">CNPJ</option>
                            <option value="cidade_empresa">Cidade</option>
                            <option value="telefone_empresa">Telefone</option>
                        </select>
                        <select name="ordem" class="btn">
                            <option value="ASC">Crescente</option>
                            <option value="DESC">Decrescente</option>
                        </select>
                        <button type="submit" class="btn">Buscar</button>
                    </form>
                </div>
                <?php if ($isNivel2): ?>
                    <a href="empresa.php" class="btn">Adicionar Empresa</a>
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
                            <th>Número Convênio</th>
                            <th>Nome da Empresa</th>
                            <th>Cidade</th>
                            <th>Endereço</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>CNPJ</th>
                            <th>Nome Representante</th>
                            <th>CPF Representante</th>
                            <th>Função Representante</th>
                            <th>RG Representante</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($empresas as $empresa): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($empresa->getNumConvenio()) ?></td>
                            <td><?php echo htmlspecialchars($empresa->getNomeEmpresa()) ?></td>
                            <td><?php echo htmlspecialchars($empresa->getCidadeEmpresa()) ?></td>
                            <td><?php echo htmlspecialchars($empresa->getEnderecoEmpresa()) ?></td>
                            <td><?php echo htmlspecialchars($empresa->getTelefoneEmpresa()) ?></td>
                            <td><?php echo htmlspecialchars($empresa->getEmailEmpresa()) ?></td>
                            <td><?php echo htmlspecialchars($empresa->getCnpjEmpresa()) ?></td>
                            <td><?php echo htmlspecialchars($empresa->getNomeRepresentante()) ?></td>
                            <td><?php echo htmlspecialchars($empresa->getCpfRepresentante()) ?></td>
                            <td><?php echo htmlspecialchars($empresa->getFuncaoRepresentante()) ?></td>
                            <td><?php echo htmlspecialchars($empresa->getRgRepresentante()) ?></td>
                            <td>
                                <a href="empresa.php?id=<?php echo $empresa->getId(); ?>"><i class="fa-solid fa-pencil" style="color: #FFD43B;"></i></a>
                                |
                                <a href="empresaDeletar.php?id=<?php echo $empresa->getId(); ?>"><i class="fa-solid fa-trash" style="color: #f00;"></i></a>
                            </td>
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
